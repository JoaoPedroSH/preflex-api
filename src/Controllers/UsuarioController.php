<?php

namespace Preflex\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use Preflex\Models\UsuarioModel;

class UsuarioController
{

    private UsuarioModel $usuarioModel;

    public function __construct(UsuarioModel $usuarioModel) {
        $this->usuarioModel = $usuarioModel;
    }
    
    public function getAll(Request $request, Response $response):Response
    {

        $usuarios = $this->usuarioModel->getAll();

        $response->getBody()->write(json_encode($usuarios));

        return $response
                    ->withHeader('Content-Type', 'application/json');
    }

    public function create(Request $request, Response $response):Response
    {

        $data = $request->getParsedBody();
        $bolCreateSuccess = $this->usuarioModel->create($data);

        $response->getBody()->write(json_encode($bolCreateSuccess));

        return $response
                    ->withHeader('Content-Type', 'application/json');
    }
}
