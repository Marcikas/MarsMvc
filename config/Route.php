<?php

namespace App\Config;

class Route {    
    private static $controller;

    public static function __callStatic($name, $arguments){            
        if(strcmp($arguments[0], $_SERVER['REQUEST_URI'])){            
            return;
        }        

        if(strtoupper($name) !== $_SERVER['REQUEST_METHOD']){
            header("Content-type: application/json");
            http_response_code(405);
            echo json_encode([
                "error" => "Método HTTP inválido. Esperado: $name, Obtido: " . $_SERVER['REQUEST_METHOD'] .""
            ]);
            exit();
        }

        $data = explode('@', $arguments[1]);
        self::$controller = $data[0];
        $function = $data[1];
       
        if (class_exists("\App\Controller\\" . (string)self::$controller)) {
            $controllerName = "\App\Controller\\".(string)self::$controller;
            $controller = new $controllerName;
            
            if (is_callable([$controller, $function])) {
                return call_user_func( [$controller, $function] );                
            }

            throw new \Exception(
                "A função '$function' não existe na classe $controller->get_class() !"
            );    
        } 
        
        throw new \Exception("A Controller ".self::$controller." passada na rota não existe!");
    }
}