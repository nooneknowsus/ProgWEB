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

    public function alterar(Alunos $alunos){
        try{
            $sql = "UPDATE alunos SET nome = :nome, ra = :ra WHERE id = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":nome", $alunos->getNome());
            $p->bindValue(":ra", $alunos->getRA());
            $p->bindValue(":id", $alunos->getId());
            return $p->execute();
        }catch(\Exception $e){
            return 0;
        }
    }

    public function excluir($id){
        try{
            $sql = "DELETE FROM alunos WHERE id = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id", $id);
            return $p->execute();
        } catch(\Exception $e){
            return 0;
        }
    }

    public function consultarTodos(){
        try{
            $sql = "SELECT * FROM alunos";
            return $this->conexao->getConexao()->query($sql);
        } catch(\Exception $e){
            return 0;
        }
    }

    public function consultar($id){
        try{
            $sql = "SELECT * FROM alunos WHERE id = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id", $id);
            $p->execute();
            return $p->fetch();
        } catch(\Exception $e){
            return 0;
        }
    }
}