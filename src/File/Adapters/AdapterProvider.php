<?php

namespace CQ\File\Adapters;

use League\Flysystem\Filesystem;

abstract class AdapterProvider
{
    public function __construct(
        private $adapter
    ) {
    }

    public function getFilesystem(): Filesystem
    {
        return new Filesystem(
            adapter: $this->adapter
        );
    }
}
