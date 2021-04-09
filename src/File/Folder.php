<?php

declare(strict_types=1);

namespace CQ\File;

use CQ\File\Adapters\AdapterProvider;
use League\Flysystem\Filesystem;
use League\Flysystem\FileAttributes;
use League\Flysystem\DirectoryAttributes;

class Folder
{
    private Filesystem $fileSystem;

    public function __construct(AdapterProvider $adapterProvider)
    {
        $this->fileSystem = $adapterProvider->getFilesystem();
    }

    public function createDirectory(string $path) : void
    {
        $this->fileSystem->createDirectory(
            location: $path
        );
    }

    public function listContents(string $path) : array
    {
        $listContents = $this->fileSystem->listContents(
            location: $path
        );

        $fileList = [];

        foreach ($listContents as $entry) {
            $path = $entry->path();

            if ($entry instanceof FileAttributes) {
                array_push($fileList, $path);

                continue;
            }

            if ($entry instanceof DirectoryAttributes) {
                // If this crashes your program, I'm sorry :D
                $fileList = array_merge(
                    $fileList,
                    $this->listContents(path: $path)
                );
            }
        }

        return $fileList;
    }

    public function deleteDirectory(string $path) : void
    {
        $this->fileSystem->deleteDirectory(
            location: $path
        );
    }
}
