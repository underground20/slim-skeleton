<?php

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Console\ConsoleRunner;

$config = (require_once __DIR__ . '/config/doctrine.php');
$container = (require_once __DIR__ . '/config/container.php');
$manager = array_shift($config)($container);

return ConsoleRunner::createHelperSet($manager);