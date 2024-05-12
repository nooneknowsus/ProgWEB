<?php

namespace Php\Primeiroprojeto\Models\DAO;

use Php\Primeiroprojeto\Models\Domain\Funcionarios;

class FuncionariosDAO{

    private Conexao $conexao;

    public function __construct(){
        $this->conexao = new Conexao();
    }

    public function inserir(Funcionarios $Funcionarios){
        try{
            $sql = "INSERT INTO funcionarios (nome, cpf) VALUES (:nome, :cpf)";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":nome", $Funcionarios->getNome());
            $p->bindValue(":cpf", $Funcionarios->getCpf());
            return $p->execute();
        } catch(\Exception $e){
            return 0;
        }
    }

    public function alterar(Funcionarios $Funcionarios){
        try{
            $sql = "UPDATE Funcionarios SET nome = :nome, cpf = :cpf WHERE id = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":nome", $Funcionarios->getNome());
            $p->bindValue(":cpf", $Funcionarios->getCpf());
            $p->bindValue(":id", $Funcionarios->getId());
            return $p->execute();
        }catch(\Exception $e){
            return 0;
        }
    }

    public function excluir($id){
        try{
            $sql = "DELETE FROM Funcionarios WHERE id = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id", $id);
            return $p->execute();
        } catch(\Exception $e){
            return 0;
        }
    }

    public function consultarTodos(){
        try{
            $sql = "SELECT * FROM Funcionarios";
            return $this->conexao->getConexao()->query($sql);
        } catch(\Exception $e){
            return 0;
        }
    }

    public function consultar($id){
        try{
            $sql = "SELECT * FROM Funcionarios WHERE id = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id", $id);
            $p->execute();
            return $p->fetch();
        } catch(\Exception $e){
            return 0;
        }
    }

}