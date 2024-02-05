<?php

namespace TasksManager\Services;

/**
 * @OA\Info(title="Minha API", version="1.0")
 */

use Slim\App;
use Slim\Exception\HttpNotFoundException;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Routing\RouteCollectorProxy;

use TasksManager\Controllers\TaskController;
use TasksManager\Controllers\TaskGroupController;

class Routes
{
    public static function defineRoutes(App $app): void
    {
        $app->get('/', function (Request $request, Response $response) {
            $response->getBody()->write('Tela principal');
            return $response
                ->withHeader('Content-Type', 'application/json');

        });

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
