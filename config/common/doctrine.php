<?php

use Doctrine\ORM\Configuration;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Mapping\UnderscoreNamingStrategy;
use Psr\Container\ContainerInterface;

return [
    EntityManagerInterface::class => function (ContainerInterface $container): EntityManagerInterface {
        $settings = $container->get('config')['doctrine'];
        $configuration = $container->get(Configuration::class);
        $configuration->setNamingStrategy(new UnderscoreNamingStrategy());

        return EntityManager::create(
            $settings['connection'],
            $configuration
        );
    },
    'config' => [
        'doctrine' => [
            'dev_mode' => true,
            'cache_dir' => __DIR__ . '/../var/cache/doctrine/cache',
            'proxy_dir' => __DIR__ . '/../var/cache/doctrine/proxy',
            'metadata_dirs' => [__DIR__ . '/../src/User'],
            'connection' => [
                'driver' => 'pdo_mysql',
                'host' => 'mysql',
                'dbname' => getenv('DB_NAME'),
                'user' => getenv('DB_USER'),
                'password' => getenv('DB_PASSWORD')
            ]
        ],
    ]
];
