<?php

use Slim\App;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

return static function (App $app) {
    $app->get('/', function (Request $request, Response $response) {
        $response->getBody()->write('test');
        return $response;
    });
};
