<?php

namespace TasksManager\Services;

use Psr\Container\ContainerInterface;

class Injector implements ContainerInterface
{
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
