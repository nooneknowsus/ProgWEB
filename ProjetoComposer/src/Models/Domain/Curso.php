<?php

namespace Php\Primeiroprojeto\Models\Domain;

class Curso{

    private $id;
    private $nome;
    private $duracao;

    public function __construct($id, $nome, $duracao){
        $this->setId($id);
        $this->setNome($nome);
        $this->setDuracao($duracao);
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

    public function getDuracao(){
        return $this->duracao;
    }

    public function setDuracao($duracao){
        $this->duracao = $duracao;
    }
    

}