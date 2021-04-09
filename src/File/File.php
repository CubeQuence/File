<?php

declare(strict_types=1);

namespace CQ\File;

use CQ\File\Adapters\AdapterProvider;
use League\Flysystem\Filesystem;

final class File
{
    private Filesystem $fileSystem;

    public function __construct(AdapterProvider $adapterProvider)
    {
        $this->fileSystem = $adapterProvider->getFilesystem();
    }

    public function write(string $path, string $contents) : void
    {
        $this->fileSystem->write(
            location: $path,
            contents: $contents
        );
    }

    public function read(string $path) : string
    {
        return $this->fileSystem->read(
            location: $path
        );
    }

    public function delete(string $path) : void
    {
        $this->fileSystem->delete(
            location: $path
        );
    }

    public function exists(string $path) : bool
    {
        return $this->fileSystem->fileExists(
            location: $path
        );
    }

    public function move(string $sourcePath, string $destinationPath) : void
    {
        $this->fileSystem->move(
            source: $sourcePath,
            destination: $destinationPath
        );
    }

    public function copy(string $sourcePath, string $destinationPath) : void
    {
        $this->fileSystem->copy(
            source: $sourcePath,
            destination: $destinationPath
        );
    }

    public function meta(string $path) : array
    {
        return [
            'lastModifed' => $this->fileSystem->lastModified(
                path: $path
            ),
            'mimeType' => $this->fileSystem->mimeType(
                path: $path
            ),
            'fileSize' => $this->fileSystem->fileSize(
                path: $path
            ),
        ];
    }
}
