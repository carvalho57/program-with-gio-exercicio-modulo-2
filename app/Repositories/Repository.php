<?php

declare(strict_types=1);

namespace App\Repositories;

use App\App;
use App\Database;

abstract class Repository  {
    protected Database $db;
    public function __construct() {
        $this->db = App::db();
    }
}