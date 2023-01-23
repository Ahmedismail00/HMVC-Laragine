<?php


namespace Helper;

use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Mockery\Exception;

class Attachment
{
    private $imageExtensions = [
        'jpg',
        'jpeg',
        'gif',
        'png',
        'bmp',
        'svg',
        'svgz',
        'cgm',
        'djv',
        'djvu',
        'ico',
        'ief',
        'jpe',
        'pbm',
        'pgm',
        'pnm',
        'ppm',
        'ras',
        'rgb',
        'tif',
        'tiff',
        'wbmp',
        'xbm',
        'xpm',
        'xwd'
    ];

    /**
     * @param $key
     * @param $array
     * @param $value
     * @return mixed
     */
    public static function inArray($key, $array, $value)
    {
        $return = array_key_exists($key, $array) ? $array[$key] : $value;
        return $return;
    }

    /**
     * @param $file
     * @param $model
     * @param $folder_name
     * @param array $options
     */
    public static function addAttachment($file, $model, $folder_name, array $options = []): void
    {
        $image = $file;
        $destinationPath = public_path() . '/uploads/thumbnails/' . $folder_name . '/';
        $extension = $image->getClientOriginalExtension(); // getting image extension
        $name = 'original' . time() . '' . rand(11111, 99999) . '.' . $extension; // renaming image
        $usage = self::inArray('usage', $options, null);
        $type = self::inArray('type', $options, 'doc');
        $relation = self::inArray('relation', $options, 'attachmentRelation');

        $image->move($destinationPath, $name); // uploading file to given

        if ($extension == 'svg') {
            $name = $file->getClientOriginalName() . '-_-' . time() . '.' . $extension; // renaming image
            $file->move($destinationPath, $name); // uploading file to given
            $model->$relation()->create(
                [
                    'path' => 'uploads/thumbnails/' . $folder_name . '/' . $name,
                    'type' => $type,
                    'usage' => $usage
                ]
            );
            return;
        } else {

            $image_400 = '400-' . time() . '' . rand(11111, 99999) . '.' . $extension;
            $image_600 = '600-' . time() . '' . rand(11111, 99999) . '.' . $extension;
            $image_800 = '800-' . time() . '' . rand(11111, 99999) . '.' . $extension;

            $resize_image = Image::make($destinationPath . $name);

            $resize_image->resize(400, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . $image_400, 100);

            $resize_image->resize(600, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . $image_600, 100);

            $resize_image->resize(800, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . $image_800, 100);

            $model->$relation()->create(
                [
                    'extension' => $extension,
                    'original' => 'uploads/thumbnails/' . $folder_name . '/' . $name,
                    'photo_400' => 'uploads/thumbnails/' . $folder_name . '/' . $image_400,
                    'photo_600' => 'uploads/thumbnails/' . $folder_name . '/' . $image_600,
                    'photo_800' => 'uploads/thumbnails/' . $folder_name . '/' . $image_800,
                    'type'  => $type,
                    'usage' => $usage
                ]
            );
        }
    }

    /**
     * @param $file
     * @param $oldFiles
     * @param $model
     * @param $folder_name
     * @param array $options
     */
    public static function updateAttachment($file, $oldFiles, $model, $folder_name, array $options = []): void
    {
        // dd(\func_get_args());
        if ($oldFiles) {
            File::delete(public_path() . '/' . $oldFiles->original);
            File::delete(public_path() . '/' . $oldFiles->photo_400);
            File::delete(public_path() . '/' . $oldFiles->photo_600);
            File::delete(public_path() . '/' . $oldFiles->photo_800);
        }
        $image = $file;
        $destinationPath = public_path() . '/uploads/thumbnails/' . $folder_name . '/';
        $extension = $image->getClientOriginalExtension(); // getting image extension
        $name = 'original' . time() . '' . rand(11111, 99999) . '.' . $extension; // renaming image
        $usage = self::inArray('usage', $options, null);
        $type = self::inArray('type', $options, 'image');
        $relation = self::inArray('relation', $options, 'attachmentRelation');
        $image->move($destinationPath, $name); // uploading file to given


        $image_400 = '400-' . time() . '' . rand(11111, 99999) . '.' . $extension;
        $image_600 = '600-' . time() . '' . rand(11111, 99999) . '.' . $extension;
        $image_800 = '800-' . time() . '' . rand(11111, 99999) . '.' . $extension;

        $resize_image = Image::make($destinationPath . $name);

        $resize_image->resize(400, null, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath . $image_400, 100);

        $resize_image->resize(600, null, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath . $image_600, 100);

        $resize_image->resize(800, null, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath . $image_800, 100);

        $input =
            [
                'extension' => $extension,
                'type' => $type,
                'usage' => $usage,
                'original' => 'uploads/thumbnails/' . $folder_name . '/' . $name,
                'photo_400' => 'uploads/thumbnails/' . $folder_name . '/' . $image_400,
                'photo_600' => 'uploads/thumbnails/' . $folder_name . '/' . $image_600,
                'photo_800' => 'uploads/thumbnails/' . $folder_name . '/' . $image_800,
            ];

        if ($oldFiles) {
            $model->$relation()->update($input);
        } else {
            $model->$relation()->create($input);
        }
    }

    /**
     * @param $model
     * @param string $relation
     * @param bool $multiple
     * @param string $type
     * @return bool
     */
    public static function deleteAttachment($model, $relation = 'attachmentRelation', $multiple = false, $type = 'image')
    {

        $photos = $model->$relation;

        if ($multiple == true) {
            foreach ($photos as $photo) {
                File::delete(public_path() . '/' . $photo->original);
                File::delete(public_path() . '/' . $photo->photo_400);
                File::delete(public_path() . '/' . $photo->photo_600);
                File::delete(public_path() . '/' . $photo->photo_800);
                $photo->delete();
            }
            return true;
        } else {
            if ($photos) {
                File::delete(public_path() . '/' . $photos->original);
                File::delete(public_path() . '/' . $photos->photo_400);
                File::delete(public_path() . '/' . $photos->photo_600);
                File::delete(public_path() . '/' . $photos->photo_800);
                $photos->delete();
                return true;
            }
        }

        $model->$relation()->where('type', $type)->delete();
    }

    /**
     * @param $code
     * @param $model
     * @param array $options
     */
    /*     public static function setQrCode($code, $model, array $options = []):void
    {
        $relation = self::inArray('relation', $options, 'attachmentRelation');
        $usage = self::inArray('usage', $options, 'qr-code');
        $type = self::inArray('type', $options, 'image');
        $size = self::inArray('size', $options, 4); //pixel size in 1 to 10
        $margin = self::inArray('size', $options, 4); // in 1 to 10
        $extension = self::inArray('ext', $options, 'png'); // in 1 to 10

        $folder_name = 'qr-codes/' . Carbon::now()->toDateString();
        $name = $size . '-' . time() . '' . rand(11111, 99999) . '.' . $extension;

        $destinationPath = public_path() . '/uploads/thumbnails/' . $folder_name . '/';

        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0755);
        }

        \QRCode::text($code)->setSize($size)->setMargin($margin)->setOutfile($destinationPath . $name)->$extension();

        $model->$relation()->create(
            [
                'path' => 'uploads/thumbnails/' . $folder_name . '/' . $name,
                'type' => $type,
                'usage' => $usage
            ]
        );
    } */
}
