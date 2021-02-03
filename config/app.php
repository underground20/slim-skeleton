<?php

use Psr\Container\ContainerInterface;
use Slim\Factory\AppFactory;

return static function (ContainerInterface $container) {
    $app = AppFactory::createFromContainer($container);
    (require __DIR__ . '/routes.php')($app);
    (require __DIR__ . '/middlewares.php')($app);
    return $app;
};