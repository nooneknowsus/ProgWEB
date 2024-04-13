<?php

namespace Php\Primeiroprojeto\Models\DAO;

use Php\Primeiroprojeto\Models\Domain\Alunos;

class AlunosDAO{

    private Conexao $conexao;

    public function __construct(){
        $this->conexao = new Conexao();
    }

    public function inserir(Alunos $alunos){
        try{
            $sql = "INSERT INTO alunos (nome, ra) VALUES (:nome, :ra)";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":nome", $alunos->getNome());
            $p->bindValue(":ra", $alunos->getRA());
            return $p->execute();
        } catch(\Exception $e){
            return 0;
        }
    }

}