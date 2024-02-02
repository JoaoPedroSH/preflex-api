<?php

require __DIR__ . '/../vendor/autoload.php';

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Slim\Exception\HttpNotFoundException;

use TasksManager\Controllers\TaskController;
use TasksManager\Services\Injector;
use TasksManager\Services\Database;
use TasksManager\Services\Cors;
use TasksManager\Models\TaskModel;

$container = new Injector();
$container->add(TaskController::class, function(){
    $database = new Database('mysql:host=localhost;dbname=tasksmanager;port=3300', 'root', 123456);
    return new TaskController(new TaskModel($database));
});


AppFactory::setContainer($container);
$app = AppFactory::create();
$app->add(new Cors());

$app->get('/', [TaskController::class, 'getAll']);


$app->map(['GET', 'POST', 'PUT', 'DELETE', 'PATCH'], '/{routes:.+}', function (Request $request) {
    throw new HttpNotFoundException($request);
});


$app->run();