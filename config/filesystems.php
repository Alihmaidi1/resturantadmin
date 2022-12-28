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
    'resturant:9815165f-f324-4ad8-af96-7043d43c21c3' => 
    array (
      'driver' => 's3',
      'key' => 'AKIAR3KVHLBE4UIWFZ6C',
      'secret' => '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',
      'region' => 'us-east-2',
      'bucket' => 'resturant7021061',
      'url' => NULL,
      'endpoint' => NULL,
      'use_path_style_endpoint' => false,
      'throw' => false,
    ),
    'resturant:98163e84-66a2-43ec-8315-01ae78672e1d' => 
    array (
      'driver' => 's3',
      'key' => 'AKIAR3KVHLBEXLYHSPNV',
      'secret' => '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',
      'region' => 'us-east-2',
      'bucket' => 'resturant6971538',
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