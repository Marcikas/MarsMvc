<?php

namespace App\Controller;

use App\Config\Template;

class HomeController {
       
    public function index(){
        $pessoas = \App\Repository\PessoaRepository::findAll();        
        return Template::render('index', ['pessoa' => $pessoas]);           
    }   
    
    public function teste(){               
        return Template::render('pessoa/exibe', ['nome' => 'Victor']);           
    }   
    
    public function teste2(){               
        return Template::render('form');           
    }   

}