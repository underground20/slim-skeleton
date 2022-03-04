<?php

use Slim\App;
use App\Middleware\RequestAttribute;
use App\Middleware\ExceptionHandler;

return static function (App $app) {
    $settings = $app->getContainer()->get('config')['settings'];
    $app->add(RequestAttribute::class);
    $app->addRoutingMiddleware();

    $devMode = (bool)getenv('DEV_MODE', true);
    if ($devMode) {
        $app->addErrorMiddleware(
            $settings['display_error_details'],
            $settings['log_errors'],
            $settings['log_error_details']
        );
    } else {
        $app->add(ExceptionHandler::class);
    }
};
