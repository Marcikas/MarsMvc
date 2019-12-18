<?php

require_once "config/Autoload.php";

new Autoloader();

$request = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];
// $argv = $_SERVER['argv'];
// $path_info = $_SERVER['PATH_INFO'];

// var_dump($argv);
// var_dump($method);
// var_dump(basename($path_info));
//die();

switch ($request) {
    case '/api/pessoa/' :        
        Route::get('/api/pessoa', 'PessoaController@index');        
        break;      
    case '/api/pessoa/new' :        
        Route::get('/api/pessoa/new', 'PessoaController@new');        
        break;      
    case '/form' :        
        header('Location: form.php');        
        break;      
    default:
        http_response_code(404);       
        echo "Página não encontrada"; 
        break;
}
