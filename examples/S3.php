<?php

use CQ\File\File;
use CQ\File\Adapters\Providers\S3;
use Aws\S3\S3Client;

try {
    $rootPath = __DIR__;
    $filePath = 'test.txt';

    $client = new S3Client([
        'version' => 'latest',
        'region' => 'us-west-2',
        'credentials' => [
            'key' => 'my-access-key-id',
            'secret' => 'my-secret-access-key',
        ],
    ]);

    $s3Provider = new S3(
        client: $client,
        bucketName: 'testBucket'
    );

    $fileHandler = new File(
        adapterProvider: $s3Provider
    );

    $fileHandler->write(
        path: $filePath,
        contents: 'Hello World!'
    );

    $read = $fileHandler->read(
        path: $filePath
    );

    // All other file functions are availible,
    // See examples/File.php for more details
} catch (\Throwable $th) {
    echo $th->getMessage();
    exit;
}

echo json_encode([
    'read' => $read,
]);
