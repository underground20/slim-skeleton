<?php

use Slim\App;
use App\Middleware\RequestAttribute;
use App\Middleware\ExceptionHandler;

return static function (App $app) {
    $settings = $app->getContainer()->get('settings');
    $app->add(RequestAttribute::class);
    $app->addRoutingMiddleware();

    $devMode = (bool)getenv('DEV_MODE', true);
    if ($devMode) {
        $app->addErrorMiddleware(
            $settings['displayErrorDetails'],
            $settings['logErrors'],
            $settings['logErrorDetails']
        );
    } else {
        $app->add(ExceptionHandler::class);
    }
};