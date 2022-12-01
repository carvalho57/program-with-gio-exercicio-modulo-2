<?php

declare(strict_types=1);

namespace App\Exceptions;

class RouteNotFoundException implements \Exception {
    protected $message  = 'Route not found';
}