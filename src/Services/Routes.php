<?php

namespace TasksManager\Services;

use Slim\App;
use Slim\Exception\HttpNotFoundException;
use Psr\Http\Message\ServerRequestInterface as Request;

use TasksManager\Controllers\TaskController;
use TasksManager\Controllers\TaskGroupController;

class Routes
{
    public static function defineRoutes(App $app): void
    {
        $app->get('/tasks', [TaskController::class, 'getAll']);
        $app->post('/tasks', [TaskController::class, 'create']);
        $app->get('/groups', [TaskGroupController::class, 'getAll']);
        $app->post('/groups', [TaskGroupController::class, 'create']);

        $app->map(['GET', 'POST', 'PUT', 'DELETE', 'PATCH'], '/{routes:.+}', function (Request $request) {
            throw new HttpNotFoundException($request);
        });
    }
}
