<?php

namespace CQ\File\Adapters\Providers;

use CQ\File\Adapters\AdapterProvider;
use League\Flysystem\AwsS3V3\AwsS3V3Adapter;
use Aws\S3\S3Client;

final class S3 extends AdapterProvider
{
    public function __construct(S3Client $client, string $bucketName)
    {
        $adapter = new AwsS3V3Adapter(
            client: $client,
            bucket: $bucketName
        );

        parent::__construct(
            adapter: $adapter
        );
    }
}
