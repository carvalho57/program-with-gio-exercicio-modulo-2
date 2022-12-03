<?php

use App\Controllers\HomeController;
use App\Controllers\TransactionController;
use App\Router;
use App\App;
use App\Config;

require_once __DIR__ .  '/../vendor/autoload.php';

session_start();

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$router = Router::create()
            ->get('/', [HomeController::class, 'index'])
            ->get('/transaction/upload', [TransactionController::class,'upload'])
            ->post('/transaction/save', [TransactionController::class, 'save']);


$config = new Config($_ENV);

$config->database($_ENV['DB_HOST'],$_ENV['DB_NAME'],$_ENV['DB_USER'], $_ENV['DB_PASS'],[]);

(new App($router, $config))
    ->run($_SERVER['REQUEST_URI'],$_SERVER['REQUEST_METHOD']);

