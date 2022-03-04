<?php

declare(strict_types=1);

use Doctrine\Common\Cache\Psr6\DoctrineProvider;
use Doctrine\ORM\Configuration;
use Doctrine\ORM\Mapping\Driver\AttributeDriver;
use Doctrine\ORM\Tools\Setup;
use Psr\Container\ContainerInterface;
use Symfony\Component\Cache\Adapter\ArrayAdapter;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;

return [
    Configuration::class => function (ContainerInterface $container): Configuration {
        $settings = $container->get('config')['doctrine'];
        $configuration = Setup::createConfiguration(
            $settings['dev_mode'],
            $settings['proxy_dir'],
            $settings['cache_dir'] ?
                DoctrineProvider::wrap(new FilesystemAdapter('', 0, $settings['cache_dir'])) :
                DoctrineProvider::wrap(new ArrayAdapter())
        );
        $configuration->setMetadataDriverImpl(new AttributeDriver($settings['metadata_dirs']));

        return $configuration;
    }
];
