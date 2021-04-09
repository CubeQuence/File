<?php

namespace CQ\File\Adapters\Providers;

use CQ\File\Adapters\AdapterProvider;
use League\Flysystem\Local\LocalFilesystemAdapter;

final class Local extends AdapterProvider
{
    public function __construct(string $rootPath)
    {
        $adapter = new LocalFilesystemAdapter(
            location: $rootPath
        );

        parent::__construct(
            adapter: $adapter
        );
    }
}
