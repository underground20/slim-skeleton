<?php

use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Psr\Container\ContainerInterface;
use Psr\Log\LoggerInterface;
use Psr\Log\LogLevel;

return [
    'settings' => [
        'logger' => [
            'path' => __DIR__ . '/../../var/log',
            'level' => LogLevel::DEBUG,
        ],
    ],

    LoggerInterface::class => static function (ContainerInterface $container): LoggerInterface {
        $logger = new Logger('app');
        $settings = $container->get('settings')['logger'];
        $filename = sprintf('%s/error.log', $settings['path']);
        $handler = new StreamHandler($filename, $settings['level'], true, 0777);
        $logger->pushHandler($handler);

        return $logger;
    },
];
