<?php

namespace Php\Primeiroprojeto\Models\DAO;

use Php\Primeiroprojeto\Models\Domain\Curso;

class CursoDAO{

    private Conexao $conexao;

    public function __construct(){
        $this->conexao = new Conexao();
    }

    public function inserir(Curso $curso){
        try{
            $sql = "INSERT INTO curso (nome, duracao) VALUES (:nome, :duracao)";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":nome", $curso->getNome());
            $p->bindValue(":duracao", $curso->getDuracao());
            return $p->execute();
        } catch(\Exception $e){
            return 0;
        }
    }

}