<?php

namespace TasksManager\Models;
use TasksManager\Services\Database;
use \PDO;

class TaskModel {
    private $database;

    public function __construct(Database $database) {
        $this->database = $database;
    }

    public function getTasks() {
        $pdo = $this->database->getPdo();
        $tasks = $pdo->query("SELECT * FROM tasks");
        return $tasks->fetchAll(PDO::FETCH_ASSOC);
    }
}
