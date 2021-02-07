<?php

use DI\ContainerBuilder;

$builder = new ContainerBuilder();
$builder->addDefinitions(
    require __DIR__ . '/settings.php',
    require __DIR__ . '/doctrine.php',
    require __DIR__ . '/twig.php'
);
return $builder->build();