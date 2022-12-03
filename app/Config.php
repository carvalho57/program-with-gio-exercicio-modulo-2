<?php

declare(strict_types=1);

namespace App;

class Config {    
    public function __construct(protected array $config) {

    }

    public function database(string $host, string $database, string $user, string $pass, array $options = []) {
        $this->config = [
            'db' => [
                'host' => $host,
                'database' => $database,
                'user' => $user,
                'password' => $pass
            ]
        ];
                
        $this->config['db']['options'] = $options;        
    }
    
    public function getDB() {
        return $this->config['db'];
    }
}