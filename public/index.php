<?php

use App\Controllers\HomeController;
use App\Router;

require_once './../vendor/autoload.php';

//Informações para tratar o request
// var_dump($_SERVER['REQUEST_URI'],$_SERVER['REQUEST_METHOD'],$_SERVER['QUERY_STRING']);

$router = Router::create()
            ->get('/', [HomeController::class, 'index']);


echo $router->resolve($_SERVER['REQUEST_URI'],$_SERVER['REQUEST_METHOD']);