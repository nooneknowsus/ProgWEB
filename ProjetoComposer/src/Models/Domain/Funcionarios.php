<?php

namespace Php\Primeiroprojeto\Models\Domain;

class Funcionarios{

    private $id;
    private $nome;
    private $cpf;

    public function __construct($id, $nome, $cpf){
        $this->setId($id);
        $this->setNome($nome);
        $this->setCpf($cpf);
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getNome(){
        return $this->nome;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function getCpf(){
        return $this->cpf;
    }

    public function setCpf($cpf){
        $this->cpf = $cpf;
    }
    

}