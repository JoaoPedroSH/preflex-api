<?php

namespace Preflex\Services;

use Psr\Container\ContainerInterface;
use Preflex\Controllers\UsuarioController;
use Preflex\Controllers\NegocioController;
use Preflex\Models\UsuarioModel;
use Preflex\Models\NegocioModel;
use Exception;

class Injector implements ContainerInterface
{
    protected array $storage = [];

    public function __construct()
    {

        $this->add(UsuarioController::class, function (Injector $container) {
            return new UsuarioController($container->get(UsuarioModel::class));
        });
        $this->add(NegocioController::class, function (Injector $container) {
            return new NegocioController($container->get(NegocioModel::class));
        });


        $this->add(UsuarioModel::class, function () {
            return new UsuarioModel();
        });
        $this->add(NegocioModel::class, function () {
            return new NegocioModel();
        });
    }

    /**
     * Adiciona uma dependência no container.
     *
     * @param string $id
     * @param callable $callable
     */
    public function add(string $id, callable $callable): void
    {
        $this->storage[$id] = $callable;
    }

    /**
     * Recupera uma dependência do container.
     *
     * @param string $id
     * @return mixed
     * @throws Exception
     */
    public function get(string $id): mixed
    {
        if (!$this->has($id)) {
            throw new Exception("Dependencia {$id} não encontrada.");
        }

        return $this->storage[$id]($this);
    }

    /**
     * Verifica se a dependência está registrada no container.
     *
     * @param string $id
     * @return bool
     */
    public function has(string $id): bool
    {
        return isset($this->storage[$id]);
    }
}

