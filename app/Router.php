<?php
declare (strict_types=1);

namespace App;

use App\Exceptions\RouteNotFoundException;

class Router {
    
    private array $routes = array();
    
    public static function create() {
        return new static();
    }

    private function register($method, $uri, $action) {
        $this->routes[$method][$uri] = $action;
        return $this;
    }

    public function get($uri, $action) {
        return $this->register('GET', $uri, $action);
    }

    public function post($uri, $action) {
        return $this->register('POST', $uri, $action);
    }

    public function put($uri, $action) {
        return $this->register('PUT', $uri, $action);
    }

    public function delete($uri, $action) {
        return $this->register('DELETE', $uri, $action);
    }

    public function patch($uri, $action) {
        return $this->register('PATCH', $uri, $action);
    }
    public function resolve($uri,$method) {

        $uri = explode("?",$uri)[0];
        $action = $this->routes[$method][$uri];

        if(is_callable($action))
            return call_user_func($action);

        [$class,$method] = $action;

        if(class_exists($class)) {
            $class = new $class;

            if(method_exists($class,$method)) {
                return call_user_func_array([$class,$method], []);
            }
        }

        throw new RouteNotFoundException();
    }
}