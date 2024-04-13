<?php

namespace Php\Primeiroprojeto\Controllers;

use Php\Primeiroprojeto\Models\DAO\FuncionariosDAO;
use Php\Primeiroprojeto\Models\Domain\Funcionarios;

class FuncionariosController {

    public function inserir($params) {
        require_once("../src/Views/funcionarios/inserir_funcionario.html");
    }

    public function novo($params) {
        $funcionario = new Funcionarios(0, $_POST['nome'], $_POST['cpf']);
        $funcionarioDAO = new FuncionariosDAO();
        if ($funcionarioDAO->inserir($funcionario)) {
            return "Inserido com sucesso!";
        } else {
            return "Erro ao inserir!";
        }
    }
}

