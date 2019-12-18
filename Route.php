<?php

class Route {
    private static $url;
    private static $controller;

    public function __construct(){
        
    }

    public static function __callStatic($name, $arguments){
        self::$url = $arguments[0];        
        $data = explode('@', $arguments[1]);
        self::$controller = $data[0];
        $function = $data[1];
        
        // var_dump("\App\Controller\\" . (string)self::$controller);
        // die();

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