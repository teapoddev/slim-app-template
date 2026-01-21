<?php

use Slim\Factory\AppFactory;
use DI\ContainerBuilder;
use Slim\Factory\ServerRequestCreatorFactory;
use Teapodsoft\Applications\Settings\SettingsInterface;
use Teapodsoft\Applications\ResponseEmitter\ResponseEmitter;
use Teapodsoft\Env;

require_once dirname(__DIR__) . '/vendor/autoload.php';

Env::load(dirname(__DIR__), '.env');

$containerBuilder = new ContainerBuilder();

$settings = require dirname(__DIR__) . '/configs/settings.php';
$settings($containerBuilder);

$repositories = require dirname(__DIR__) . '/configs/repositories.php';
$repositories($containerBuilder);

$container = $containerBuilder->build();
AppFactory::setContainer($container);
$app = AppFactory::create();
$callableResolver = $app->getCallableResolver();

$middleware = require dirname(__DIR__) . '/configs/middlewares.php';
$middleware($app);

$routes = require dirname(__DIR__) . '/configs/routes.php';
$routes($app);

$settings = $container->get(SettingsInterface::class);
$displayErrorDetails = $settings->get('displayErrorDetails');
$logError = $settings->get('logError');
$logErrorDetails = $settings->get('logErrorDetails');

$serverRequestCreator = ServerRequestCreatorFactory::create();
$request = $serverRequestCreator->createServerRequestFromGlobals();

$app->addRoutingMiddleware();
$app->addBodyParsingMiddleware();

$errorMiddleware = $app->addErrorMiddleware($displayErrorDetails, $logError, $logErrorDetails);

$response = $app->handle($request);
$responseEmitter = new ResponseEmitter();
$responseEmitter->emit($response);
