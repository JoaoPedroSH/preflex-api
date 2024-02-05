<?php

require __DIR__ . '/../vendor/autoload.php';

use Slim\Factory\AppFactory;
use TasksManager\Services\Injector;
use TasksManager\Services\Cors;
use TasksManager\Services\Routes;

AppFactory::setContainer(new Injector());

$app = AppFactory::create();
$app->add(new Cors());

Routes::defineRoutes($app);

$app->run();