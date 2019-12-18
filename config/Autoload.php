<?php

class Autoloader {        
    
    public function __construct(){
        spl_autoload_extensions(".php");     
        spl_autoload_register( [$this, "loadFiles"] );
        spl_autoload_register( [$this, "loadConfigFiles"] );
        spl_autoload_register( [$this, "loadControllerFiles"] );
        spl_autoload_register( [$this, "loadEntityFiles"] );
        spl_autoload_register( [$this, "loadRepositoryFiles"] );
    }

    private function loadFiles($className){       
        if(file_exists($className . ".php") === true){                
            require_once($className . ".php");
        } 
    }      
    
    private function loadConfigFiles($className){
        $file = self::formatFileName('App\\Config\\', $className, 'config');          

        if(file_exists($file) === true){  
            require_once($file);
        } 
    }
    
    private function loadControllerFiles($className){
        $file = self::formatFileName('App\\Controller\\', $className, 'Controller');          
        
        if(file_exists($file) === true){  
            require_once($file);
        } 
    }
    
    private function loadEntityFiles($className){
        $file = self::formatFileName('App\\Entity\\', $className, 'Entity');          

        if(file_exists($file) === true){  
            require_once($file);
        } 
    }
    
    private function loadRepositoryFiles($className){
        $file = self::formatFileName('App\\Repository\\', $className, 'Database');          

        if(file_exists($file) === true){  
            require_once($file);
        } 
    }

    private function formatFileName(String $prefix, String $className, String $directory){            
        $len = strlen($prefix);
        if (strncmp($prefix, $className, $len) !== 0) {                
            return;
        }
        
        $relativeClass = substr($className, $len);        
        $file = $directory . DIRECTORY_SEPARATOR . str_replace('\\', '/', $relativeClass) . '.php';

        return $file;
    }
}
