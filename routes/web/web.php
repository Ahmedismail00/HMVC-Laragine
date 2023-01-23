<?php

use Carbon\Carbon;
use Cloudinary\Cloudinary;
use Core\Admin\Models\Admin;
use Core\Attachment\Models\Attachment;
use Helper\Attachment as HelperAttachment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Spatie\Activitylog\Models\Activity;
use Intervention\Image\Facades\Image;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/ss', function () {
    return view('welcome');
    // $client = new \Google\Client();
    // $client->setClientId(env('GOOGLE_DRIVE_CLIENT_ID'));
    // $client->setClientSecret(env('GOOGLE_DRIVE_CLIENT_SECRET'));
    // $client->refreshToken(env('GOOGLE_DRIVE_REFRESH_TOKEN'));
    // $client->setApplicationName('hamada');

    // $service = new \Google\Service\Drive($client);

    // // variant 1
    // $adapter = new \Masbug\Flysystem\GoogleDriveAdapter($service, 'My_App_Root');
    // $fs = new \League\Flysystem\Filesystem($adapter, new \League\Flysystem\Config([\League\Flysystem\Config::OPTION_VISIBILITY => \League\Flysystem\Visibility::PRIVATE]));
    // // Upload a file
    // $local_filepath = '/home/user/downloads/file_to_upload.ext';
    // $remote_filepath = 'MyFolder/file.ext';

    // $localAdapter = new \League\Flysystem\Local\LocalFilesystemAdapter('/');
    // $localfs = new \League\Flysystem\Filesystem($localAdapter, [\League\Flysystem\Config::OPTION_VISIBILITY => \League\Flysystem\Visibility::PRIVATE]);

    // try {
    //     $time = Carbon::now();
    //     $fs->writeStream($remote_filepath, $localfs->readStream($local_filepath), new \League\Flysystem\Config());

    //     $speed = !(float)$time->diffInSeconds() ? 0 : filesize($local_filepath) / (float)$time->diffInSeconds();
    //     echo 'Elapsed time: ' . $time->diffForHumans(null, true) . PHP_EOL;
    //     echo 'Speed: ' . number_format($speed / 1024, 2) . ' KB/s' . PHP_EOL;
    // } catch (\League\Flysystem\UnableToWriteFile $e) {
    //     echo 'UnableToWriteFile!' . PHP_EOL . $e->getMessage();
    // }
});


Route::post('/image',function(Request $request){

    $uploadedFileUrl = cloudinary()->upload($request->file('image_test')->getRealPath())->getSecurePath();

    // $admin = Admin::first();
    // $file = $request->image_test;
    // HelperAttachment::addAttachment($file,$admin,'product-'.'1');
    // HelperAttachment::updateAttachment($file , $admin->attachmentRelation , $admin , 'product-'.'1');
    // HelperAttachment::deleteAttachment($admin);

    // dd($request->all());

    dd(1);
})->name('image.test');



Route::get('/cloud',function(){
    $cloud = new Cloudinary();
    $ss = $cloud->adminApi();
    dd($ss);
});
