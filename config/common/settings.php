<?php

use Nyholm\Psr7\Factory\Psr17Factory;
use Psr\Http\Message\ServerRequestFactoryInterface;

return [
    'config' => [
        'settings' => [
            'display_error_details' => true,
            'log_errors' => false,
            'log_error_details' => false,
            'log_file' => __DIR__ . '/../../var/log/errors.log'
        ],
    ],

    ServerRequestFactoryInterface::class => Di\get(Psr17Factory::class)
];
