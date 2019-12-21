<?php

namespace App\Config;

class Autoloader
{
    public function __construct()
    {
        spl_autoload_extensions(".php");
        spl_autoload_register([$this, "loadDirectoryFiles"]);
    }
    
    // Carrega os arquivos presentes nos diretórios do projeto
    private function loadDirectoryFiles($className)
    {
        // Novas pastas e namespaces criados deverão ser inseridos neste array
        $data = [
            ['prefix' => 'App\\Config\\', 'directory' => 'config'],
            ['prefix' => 'App\\Controller\\', 'directory' => 'Controller'],
            ['prefix' => 'App\\Entity\\', 'directory' => 'Entity'],
            ['prefix' => 'App\\Repository\\', 'directory' => 'Database']
        ];
       
        array_walk($data, function ($arrayData, $key, $className) {
            $len = strlen($arrayData['prefix']);
            if (strncmp($arrayData['prefix'], $className, $len) !== 0) {
                return;
            }
            
            $relativeClass = substr($className, $len);
            $file = $arrayData['directory'] . DIRECTORY_SEPARATOR . str_replace('\\', '/', $relativeClass) . '.php';
           
            if (file_exists($file) === true) {
                require_once($file);
            }
        }, $className);
    }
}
