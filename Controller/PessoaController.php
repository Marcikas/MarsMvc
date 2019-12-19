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
        $json = file_get_contents('php://input');
        $arrayData = json_decode($json, true);

        $pessoa = new \App\Entity\Pessoa(new PessoaRepository); 
        $pessoa->setId($arrayData['id']);              
        $pessoa->setNome($arrayData['nome']);        

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