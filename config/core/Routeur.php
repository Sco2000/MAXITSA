<?php

namespace App\core;
use App\controller\CommandeController;
use App\core\ErrorController;
use App\controller\SecurityController;

require_once '../config/core/middlewares.php';

class Routeur {
    public static function resolveRoute(array $URI){
    

    $uri = $_SERVER['REQUEST_URI'];
    if(array_key_exists($uri, $URI)) {
        if(array_key_exists('middlewares', $URI[$uri])) {
            $middlewares = $URI[$uri]['middlewares'];
            runMiddleware($middlewares);
        }
        $controllerName = $URI[$uri]['controller'];
        $methodName = $URI[$uri]['method']; 
        $controller = new $controllerName();
        $controller->$methodName();
    }
    else {
        $error = new ErrorController();
        $error->error404();
    }
}
}