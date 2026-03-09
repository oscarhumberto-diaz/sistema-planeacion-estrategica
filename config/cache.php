<?php

return [
    'default' => env('CACHE_STORE', 'database'),
    'stores' => [
        'array' => ['driver' => 'array', 'serialize' => false],
        'database' => ['driver' => 'database', 'table' => env('CACHE_TABLE', 'cache'), 'connection' => env('CACHE_DB_CONNECTION')],
        'file' => ['driver' => 'file', 'path' => storage_path('framework/cache/data')],
        'redis' => ['driver' => 'redis', 'connection' => env('CACHE_REDIS_CONNECTION', 'cache')],
    ],
    'prefix' => env('CACHE_PREFIX', str(env('APP_NAME', 'laravel'))->slug()->append('_cache_')->value()),
];
