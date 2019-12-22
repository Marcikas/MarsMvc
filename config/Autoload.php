<?php

namespace App\Config;

class Autoloader
{
    public function __construct()
    {
        spl_autoload_extensions(".php");
        spl_autoload_register([$this, "loadDirectoryFiles"]);
    }
    
    /**
     * Busca o arquivo a ser carregado nas pastas registradas e faz o require do mesmo
     *
     * @param string $className
     * @author Victor Marciano
     */
    private function loadDirectoryFiles(string $className)
    {
        // Pega o array com os namespaces e diretórios do arquivo de configuração
        $data = include(__DIR__ . '\\autoloadFile\\config.php');

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
