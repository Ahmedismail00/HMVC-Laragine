<?php

use Carbon\Carbon;

class GoogleDrive
{

    protected function init()
    {
        $client = new \Google\Client();
        $client->setClientId(env('GOOGLE_DRIVE_CLIENT_ID'));
        $client->setClientSecret(env('GOOGLE_DRIVE_CLIENT_SECRET'));
        $client->refreshToken(env('GOOGLE_DRIVE_REFRESH_TOKEN'));
        $client->setApplicationName('hamada');

        $service = new \Google\Service\Drive($client);

        // variant 1
        $adapter = new \Masbug\Flysystem\GoogleDriveAdapter($service, 'My_App_Root');
    }

    protected function uploadFile()
    {
        // Upload a file
        $local_filepath = '/home/user/downloads/file_to_upload.ext';
        $remote_filepath = 'MyFolder/file.ext';

        $localAdapter = new \League\Flysystem\Local\LocalFilesystemAdapter('/');
        $localfs = new \League\Flysystem\Filesystem($localAdapter, [\League\Flysystem\Config::OPTION_VISIBILITY => \League\Flysystem\Visibility::PRIVATE]);

        try {
            $time = Carbon::now();
            $fs->writeStream($remote_filepath, $localfs->readStream($local_filepath), new \League\Flysystem\Config());

            $speed = !(float)$time->diffInSeconds() ? 0 : filesize($local_filepath) / (float)$time->diffInSeconds();
            echo 'Elapsed time: ' . $time->diffForHumans(null, true) . PHP_EOL;
            echo 'Speed: ' . number_format($speed / 1024, 2) . ' KB/s' . PHP_EOL;
        } catch (\League\Flysystem\UnableToWriteFile $e) {
            echo 'UnableToWriteFile!' . PHP_EOL . $e->getMessage();
        }

        // NOTE: Remote folders are automatically created.
    }
}
