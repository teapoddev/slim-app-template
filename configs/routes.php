<?php

declare(strict_types=1);

use Slim\App;

/**
 * Настройка маршрутизации приложения
 */
return function (App $app) {
    // Базовые настройки приложения
    $app->get(pattern: '/', callable: \Teapodsoft\Routes\MainRoute::class);
    $app->get(pattern: '/json-schema', callable: \Teapodsoft\Routes\SwaggerRoute::class);

};
