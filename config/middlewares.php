<?php

use Slim\App;
use App\Middlewares\RequestAttribute;

return static function (App $app) {
    $settings = $app->getContainer()->get('settings');

    $app->addErrorMiddleware(
        $settings['displayErrorDetails'],
        $settings['logErrors'],
        $settings['logErrorDetails']
    );

    $app->add(RequestAttribute::class);
    $app->addRoutingMiddleware();
};