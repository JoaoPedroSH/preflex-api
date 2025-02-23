<?php

namespace Preflex\Services;

/**
 * @OA\Info(title="Minha API", version="1.0")
 */

use Slim\App;
use Slim\Exception\HttpNotFoundException;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Routing\RouteCollectorProxy;

use Preflex\Controllers\UsuarioController;
use Preflex\Controllers\NegocioController;

class Routes
{
    public static function defineRoutes(App $app): void
    {

        $app->get('/', function (Request $request, Response $response) {
            $response->getBody()->write('Preflex API');
            return $response
                ->withHeader('Content-Type', 'application/json');

        });

        $app->group('/usuarios', function (RouteCollectorProxy $group) {
            $group->get('', [UsuarioController::class, 'getAll']);
            $group->post('', [UsuarioController::class, 'create']);
        });

        $app->group('/negocios', function (RouteCollectorProxy $group) {
            $group->get('', [NegocioController::class, 'getAll']);
            $group->post('', [NegocioController::class, 'create']);
        });

        $app->map(['GET', 'POST', 'PUT', 'DELETE', 'PATCH'], '/{routes:.+}', function (Request $request) {
            throw new HttpNotFoundException($request);
        });

    }

}