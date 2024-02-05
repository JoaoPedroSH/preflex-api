<?php

namespace TasksManager\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use TasksManager\Models\TaskGroupModel;

class TaskGroupController
{

    private $taskGroupModel;

    public function __construct(TaskGroupModel $taskGroupModel)
    {
        $this->taskGroupModel = $taskGroupModel;
    }

    public function getAll(Request $request, Response $response): Response
    {

        $tasks = $this->taskGroupModel->getAll();

        $response->getBody()->write(json_encode($tasks));

        return $response
            ->withHeader('Content-Type', 'application/json');
    }

    public function create(Request $request, Response $response): Response
    {

        $task = $this->taskGroupModel->create();

        $response->getBody()->write(json_encode($task));

        return $response
            ->withHeader('Content-Type', 'application/json');
    }
}
