<?php

use App\Infrastructure\Middleware\ExceptionHandler;
use App\Infrastructure\Middleware\RequestAttribute;
use Psr\Log\LoggerInterface;
use Slim\App;

return static function (App $app): void {
    $app->add(RequestAttribute::class);
    $app->addRoutingMiddleware();

    $env = getenv('APP_ENV') ?: 'dev';
    if ($env === 'dev') {
        $settings = $app->getContainer()->get('config')['settings'];
        $logger = $app->getContainer()->get(LoggerInterface::class);
        $app->addErrorMiddleware(
            $settings['display_error_details'],
            $settings['log_errors'],
            $settings['log_error_details'],
            $logger,
        );

        return;
    }

    $app->add(ExceptionHandler::class);
};
