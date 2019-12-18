<?php

class Autoloader {        
    
    public function __construct(){
        spl_autoload_extensions(".php");     
        spl_autoload_register( [$this, "loadFiles"] );      
        spl_autoload_register( [$this, "loadDirectoryFiles"] );
    }

    // Carrega os arquivos da pasta raíz do projeto
    private function loadFiles($className){       
        if(file_exists($className . ".php") === true){                
            require_once($className . ".php");
        } 
    }      
    
    // Carrega os arquivos presentes nos diretórios do projeto
    private function loadDirectoryFiles($className){ 
        // Novas pastas e namespaces criados deverão ser inseridos neste array       
        $data = [
            ['prefix' => 'App\\Config\\', 'directory' => 'config'],
            ['prefix' => 'App\\Controller\\', 'directory' => 'Controller'],
            ['prefix' => 'App\\Entity\\', 'directory' => 'Entity'],            
            ['prefix' => 'App\\Repository\\', 'directory' => 'Database']          
        ];
        
        $this->requireFile($className, $data);        
    }
    
    private function requireFile($className, array $data){
        foreach ($data as $d) {            
            $len = strlen($d['prefix']);
            if (strncmp($d['prefix'], $className, $len) !== 0) {                
                continue;
            }
            
            $relativeClass = substr($className, $len);        
            $file = $d['directory'] . DIRECTORY_SEPARATOR . str_replace('\\', '/', $relativeClass) . '.php';
            
            if(file_exists($file) === true){               
                require_once($file);
            }            
        }             
    }
}
