<?php

use DI\ContainerBuilder;

$builder = new ContainerBuilder();
$builder->addDefinitions(require __DIR__ . '/settings.php');
return $builder->build();