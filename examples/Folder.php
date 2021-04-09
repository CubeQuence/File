<?php

use CQ\File\Folder;
use CQ\File\Adapters\Providers\Local;

try {
    $rootPath = __DIR__;
    $folderPath = 'test';

    $localProvider = new Local(
        rootPath: $rootPath
    );

    $folderHandler = new Folder(
        adapterProvider: $localProvider
    );

    $folderHandler->createDirectory(
        path: $folderPath
    );

    $folderContent = $folderHandler->listContents(
        path: $folderPath
    );

    $folderHandler->deleteDirectory(
        path: $folderPath
    );
} catch (\Throwable $th) {
    echo $th->getMessage();
    exit;
}

echo json_encode([
    'folderContent' => $folderContent,
]);
