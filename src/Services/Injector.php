<?php

namespace TasksManager\Services;

use Psr\Container\ContainerInterface;

use TasksManager\Services\Database;

use TasksManager\Controllers\TaskController;
use TasksManager\Controllers\TaskGroupController;
use TasksManager\Models\TaskModel;
use TasksManager\Models\TaskGroupModel;

class Injector implements ContainerInterface
{
    private Database $database;

    public function __construct()
    {
        $this->database = new Database();

        $this->add(TaskController::class, function () {
            return new TaskController(new TaskModel($this->database));
        });

        $this->add(TaskGroupController::class, function () {
            return new TaskGroupController(new TaskGroupModel($this->database));
        });
    }

    protected array $storage;

    public function add(string $id, callable $callable)
    {
        $this->storage[$id] = $callable;
    }

    public function get(string $id): mixed
    {
        if (true === $this->has($id)) {
            return $this->storage[$id]($this);
        }
    }

    public function has($id): bool
    {
        return isset($this->storage[$id]);
    }
}
