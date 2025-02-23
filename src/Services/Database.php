<?php

namespace Preflex\Services;

use Illuminate\Database\Capsule\Manager as Capsule;
use PDO;
use Dotenv\Dotenv;

/**
 * Classe responsável pela configuração e gerenciamento da conexão com o banco de dados.
 *
 * Esta classe configura a conexão com o banco de dados utilizando dois métodos principais:
 * - **Eloquent ORM (Query Builder)**: Usando a biblioteca Capsule, configurada para facilitar interações com o banco de dados de maneira orientada a objetos.
 * - **PDO (PHP Data Objects)**: Configura uma conexão direta com o banco de dados, permitindo a execução de consultas SQL mais detalhadas e personalizadas.
 */
class Database
{

    private Capsule $capsule;
    private PDO $pdo;

    public function __construct()
    {

        $dotenv = Dotenv::createImmutable(__DIR__ . '/../../config/');
        $dotenv->load();

        $dbDriver = $_ENV['DB_DRIVER_CAPSULE'];
        $dbHost = $_ENV['DB_HOST'];
        $dbPort = $_ENV['DB_PORT'];
        $dbName = $_ENV['DB_DATABASE'];
        $dbUser = $_ENV['DB_USER'];
        $dbPassword = $_ENV['DB_PASSWORD'];
        $dbCharset = $_ENV['DB_CHARSET'];

        $this->capsule = new Capsule;
        $this->capsule->addConnection([
            'driver' => $dbDriver,
            'host' => $dbHost,
            'port' => $dbPort,
            'database' => $dbName,
            'username' => $dbUser,
            'password' => $dbPassword,
            'charset' => $dbCharset,
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
        ]);

        $this->capsule->setAsGlobal();
        $this->capsule->bootEloquent();

        $this->pdo = new PDO("$dbDriver:host=$dbHost;dbname=$dbName;port=$dbPort", $dbUser, $dbPassword);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function getPdo()
    {
        return $this->pdo;
    }

    public function __invoke($request, $handler)
    {
        return $handler->handle($request);
    }
}