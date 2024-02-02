<?php

namespace TasksManager\Services;
use \PDO;

class Database {
    private $pdo;

    public function __construct($string_conn, $username, $password) {
        $this->pdo = new PDO($string_conn, $username, $password);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function getPdo() {
        return $this->pdo;
    }
}
