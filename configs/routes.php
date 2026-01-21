<?php

declare(strict_types=1);

use Slim\App;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

// Настройка маршрутизации приложения
return function (App $app) {
    // CORS
    $app->options('/{routes:.+}', function (Request $request, Response $response, array $args = []): Response {
        return $response;
    });

    // Обработка главной страницы
    $app->get('/', \Teapodsoft\Actions\TestAction::class);

};
