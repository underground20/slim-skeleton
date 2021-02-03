<?php

use App\Action\IndexAction;
use Slim\App;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

return static function (App $app) {
    $app->get('/user/{id}', IndexAction::class);
};
