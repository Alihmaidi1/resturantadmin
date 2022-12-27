<?php return array (
  'default' => 'local',
  'disks' => 
  array (
    'local' => 
    array (
      'driver' => 'local',
      'root' => '/app/storage/app',
      'throw' => false,
    ),
    'public' => 
    array (
      'driver' => 'local',
      'root' => '/app/storage/app/public',
      'url' => 'http://host.docker.internal:8082/storage',
      'visibility' => 'public',
      'throw' => false,
    ),
    's3' => 
    array (
      'driver' => 's3',
      'key' => 'AKIAR3KVHLBETJGYG2OH',
      'secret' => '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',
      'region' => 'us-east-1',
      'bucket' => 'resturant1',
      'url' => NULL,
      'endpoint' => NULL,
      'use_path_style_endpoint' => false,
      'throw' => false,
    ),
    'resturant:9814d76a-1965-4f23-a0af-c502b0766896' => 
    array (
      'driver' => 's3',
      'key' => 'AKIAR3KVHLBETDGAUSPD',
      'secret' => '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',
      'region' => 'us-east-2',
      'bucket' => 'resturant1396126',
      'url' => NULL,
      'endpoint' => NULL,
      'use_path_style_endpoint' => false,
      'throw' => false,
    ),
    'resturant:9814dc09-0516-4c38-aac2-b1c2ec3db93d' => 
    array (
      'driver' => 's3',
      'key' => 'AKIAR3KVHLBETDGAUSPD',
      'secret' => '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',
      'region' => 'us-east-2',
      'bucket' => 'resturant8752844',
      'url' => NULL,
      'endpoint' => NULL,
      'use_path_style_endpoint' => false,
      'throw' => false,
    ),
  ),
  'links' => 
  array (
    '/app/public/storage' => '/app/storage/app/public',
  ),
);