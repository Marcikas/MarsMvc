<?php

namespace App\Controller;

use App\Repository\PessoaRepository;

class PessoaController {
    
    public function index(){  
        $pessoa = new \App\Entity\Pessoa(new PessoaRepository);              
        header('Content-type: application/json');  
        http_response_code(200);    
        echo json_encode($pessoa->getAll());
    }
    
    public function new(){ 
        $pessoa = new \App\Entity\Pessoa(new PessoaRepository); 
        $pessoa->setId($_POST['id']);              
        $pessoa->setNome($_POST['nome']);        

        header('Content-type: application/json');  

        if (!$pessoa->add()) {
            http_response_code(400);            
            echo json_encode(["error" => "Erro ao inserir pessoa"]);
            exit();
        }
        
        http_response_code(200);
        echo json_encode(["success" => "Pessoa ". $pessoa->getNome() ."inserida com sucesso"]);
    }

}