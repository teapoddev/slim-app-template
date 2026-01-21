<?php

declare(strict_types=1);

use Teapodsoft\Middlewares\ResponseJsonMiddleware;
use Teapodsoft\Middlewares\SessionMiddleware;

return function (\Slim\App $app) {
    $app->add(SessionMiddleware::class);
    $app->add(ResponseJsonMiddleware::class);
};

