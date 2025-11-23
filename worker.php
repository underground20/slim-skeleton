<?php

declare(strict_types=1);

use Spiral\RoadRunner;
use Nyholm\Psr7;

require __DIR__ . "/vendor/autoload.php";

$container = require __DIR__  . '/config/container.php';
$app = (require __DIR__. '/config/app.php')($container);
$psrFactory = new Psr7\Factory\Psr17Factory();
$worker = new RoadRunner\Http\PSR7Worker(RoadRunner\Worker::create(), $psrFactory, $psrFactory, $psrFactory);

while ($request = $worker->waitRequest()) {
    try {
        $response = $app->handle($request);
        $worker->respond($response);
    } catch (\Throwable $e) {
        $worker->getWorker()->error((string)$e);
    }
}
