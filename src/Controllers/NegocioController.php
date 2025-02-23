<?php

namespace Preflex\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use Preflex\Models\NegocioModel;

class NegocioController
{

    private NegocioModel $negocioModel;

    public function __construct(NegocioModel $negocioModel)
    {
        $this->negocioModel = $negocioModel;
    }

    public function getAll(Request $request, Response $response): Response
    {

        $negocios = $this->negocioModel->getAll();

        $response->getBody()->write(json_encode($negocios));

        return $response
            ->withHeader('Content-Type', 'application/json');
    }

    public function create(Request $request, Response $response): Response
    {

        $data = $request->getParsedBody();
        $bolCreateSuccess = $this->negocioModel->create($data);

        $response->getBody()->write(json_encode($bolCreateSuccess));

        return $response
            ->withHeader('Content-Type', 'application/json');
    }
}
