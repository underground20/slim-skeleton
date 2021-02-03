<?php

require __DIR__ . '/../vendor/autoload.php';

$container = require __DIR__  . '/../config/container.php';
$app = (require __DIR__. '/../config/app.php')($container);

$app->run();