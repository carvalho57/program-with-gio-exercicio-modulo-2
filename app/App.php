<?php

declare(strict_types=1);

namespace App;

use App\Exceptions\RouteNotFoundException;
use App\Views\View;

class App {    

    private static Database $database;        

    public function __construct(protected Router $router, protected Config $config) {        
        static::$database = new Database($config->getDB());     
    }

    public static function db() {        
        return static::$database;
    }    

    public function run($requestUri, $requestMethod) {

        try  {
            echo $this->router->resolve($requestUri,$requestMethod);
        } catch(RouteNotFoundException $e) {
            http_response_code(404);      
            echo View::create('error/404');
            die();
        }
    }
}