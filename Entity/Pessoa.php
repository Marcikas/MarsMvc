<?php

namespace App\Entity;

use App\Repository\PessoaRepository;

class Pessoa
{
    private $id;
    private $nome;
    private $repository;

    public function __construct(PessoaRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getNome(): string
    {
        return $this->nome;
    }
    
    public function getId(): int
    {
        return $this->id;
    }
    
    public function setNome(string $nome)
    {
        $this->nome = $nome;
    }
    
    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function getAll()
    {
        return $this->repository::findAll();
    }
    
    public function remove()
    {
        return $this->repository::delete($this);
    }
    
    public function add()
    {
        return $this->repository::insert($this);
    }
}
