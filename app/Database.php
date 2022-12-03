<?php

namespace App;

class Database {

    protected \PDO $pdo;

    public function __construct(array $config) {
        $this->pdo = new \PDO(
                "mysql:host={$config['host']};dbname={$config['database']}", 
                $config['user'], 
                $config['password'],
                $config['options'] ?? []);
    }

    public function __call($name, $arguments)
    {
        return call_user_func_array([$this->pdo, $name], $arguments);
    }
}