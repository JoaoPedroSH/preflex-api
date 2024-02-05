<?php

namespace TasksManager\Models;

use TasksManager\Services\Database;
use \PDO;

class TaskGroupModel
{
    private $database;

    public function __construct(Database $database)
    {
        $this->database = $database;
    }

    public function getAll()
    {
        $pdo = $this->database->getPdo();
        $tasks = $pdo->query("SELECT * FROM tasks_groups");
        return $tasks->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create()
    {
        $pdo = $this->database->getPdo();
        $tasks = $pdo->query("SELECT * FROM tasks_groups");
        return $tasks->fetchAll(PDO::FETCH_ASSOC);
    }
}
