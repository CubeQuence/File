<?php

use CQ\File\File;
use CQ\File\Adapters\Providers\Local;

try {
    $rootPath = __DIR__;
    $filePath = 'test.txt';

    $localProvider = new Local(
        rootPath: $rootPath
    );

    $fileHandler = new File(
        adapterProvider: $localProvider
    );

    $fileHandler->write(
        path: $filePath,
        contents: 'Hello World!'
    );

    $read = $fileHandler->read(
        path: $filePath
    );

    $exists = $fileHandler->exists(
        path: $filePath
    );

    $meta = $fileHandler->meta(
        path: $filePath
    );

    $fileHandler->copy(
        sourcePath: $filePath,
        destinationPath: 'test2.txt'
    );

    $fileHandler->move(
        sourcePath: 'test2.txt',
        destinationPath: 'test3.txt'
    );

    $fileHandler->delete(
        path: 'test3.txt'
    );
} catch (\Throwable $th) {
    echo $th->getMessage();
    exit;
}

echo json_encode([
    'read' => $read,
    'exists' => $exists,
    'meta' => $meta,
]);
