<?php

declare(strict_types=1);

use Teapodsoft\Applications\Middlewares\ResponseJsonMiddleware;
use Teapodsoft\Applications\Settings\SettingsInterface;
use Teapodsoft\Applications\SwaggerInterface;
use Psr\Http\Server\MiddlewareInterface;

/**
 * Файл с настройками приложения
 */
return [
    // Настройка необходимых middleware (beforeAction и afterAction)
    MiddlewareInterface::class => [
        ResponseJsonMiddleware::class,
    ],

    // Настройки приложения для работы
    SettingsInterface::class => [
        'displayErrorDetails' => true,
        'logErrors' => false,
        'logErrorDetails' => false,
    ],

    // Настройки для работы со Swagger. Передаем директории для чтения
    SwaggerInterface::class => [
        $_SERVER['DOCUMENT_ROOT'] . '/src/Routes',
    ],


];
