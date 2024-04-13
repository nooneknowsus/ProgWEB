<?php

namespace Php\Primeiroprojeto\Models\DAO;

use Php\Primeiroprojeto\Models\Domain\Funcionarios;

class FuncionariosDAO{

    private Conexao $conexao;

    public function __construct(){
        $this->conexao = new Conexao();
    }

    public function inserir(Funcionarios $funcionario){
        try{
            $sql = "INSERT INTO funcionarios (nome, cpf) VALUES (:nome, :cpf)";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":nome", $funcionario->getNome());
            $p->bindValue(":cpf", $funcionario->getCpf());
            return $p->execute();
        } catch(\Exception $e){
            return 0;
        }
    }

}