<?php

namespace Php\Primeiroprojeto\Models\Domain;

class Alunos{

    private $id;
    private $nome;
    private $RA;

    public function __construct($id, $nome, $RA){
        $this->setId($id);
        $this->setNome($nome);
        $this->setRA($RA);
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

    public function getRA(){
        return $this->RA;
    }

    public function setRA($RA){
        $this->RA = $RA;
    }
    

}