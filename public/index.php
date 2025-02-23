<?php

require __DIR__ . '/../vendor/autoload.php';

use Slim\Factory\AppFactory;
use Preflex\Services\Cors;
use Preflex\Services\Routes;
use Preflex\Services\Injector;
use Preflex\Services\Database;

AppFactory::setContainer(new Injector());
$app = AppFactory::create();
$app->add(new Cors());
$app->add(new Database());
Routes::defineRoutes($app);

$app->run();