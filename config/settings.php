<?php

return [
    'settings' => [
        'displayErrorDetails' => true,
        'logErrors' => false,
        'logErrorDetails' => false,
        'log_file' => __DIR__ . '/../var/log/app.log'
    ],
    'doctrine' => [
        'dev_mode' => true,
        'cache_dir' => __DIR__ . '/../var/cache/doctrine/cache',
        'proxy_dir' => __DIR__ . '/../var/cache/doctrine/proxy',
        'metadata_dirs' => [__DIR__ . '/../app/Entity'],
        'connection' => [
            'driver' => 'pdo_mysql',
            'host' => 'mysql',
            'dbname' => getenv('DB_NAME'),
            'user' => getenv('DB_USER'),
            'password' => getenv('DB_PASSWORD')
        ]
    ],
];