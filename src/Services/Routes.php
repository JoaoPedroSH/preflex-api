<?php

namespace TasksManager\Services;

use Slim\App;
use Slim\Exception\HttpNotFoundException;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Routing\RouteCollectorProxy;
use TasksManager\Controllers\TaskController;
use TasksManager\Controllers\TaskGroupController;

class Routes
{
    public static function defineRoutes(App $app): void
    {
        $app->group('/tasks', function (RouteCollectorProxy $group) {
            $group->get('', [TaskController::class, 'getAll']);
            $group->post('', [TaskController::class, 'create']);
        });

        $app->group('/tasks_groups', function (RouteCollectorProxy $group) {
            $group->get('', [TaskGroupController::class, 'getAll']);
            $group->post('', [TaskGroupController::class, 'create']);
        });

        $app->map(['GET', 'POST', 'PUT', 'DELETE', 'PATCH'], '/{routes:.+}', function (Request $request) {
            throw new HttpNotFoundException($request);
        });
    }
}
