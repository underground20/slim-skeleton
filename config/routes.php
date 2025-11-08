<?php

use App\Http\IndexAction;
use Slim\App;

return static function (App $app) {
    $app->get('/', IndexAction::class);
};
