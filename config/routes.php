<?php

use App\Http\Action\IndexAction;
use Slim\App;

return static function (App $app) {
    $app->get('/user/{id}', IndexAction::class);
};
