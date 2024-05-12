<?php

namespace Php\Primeiroprojeto\Controllers;

use Php\Primeiroprojeto\Models\DAO\FuncionariosDAO;
use Php\Primeiroprojeto\Models\Domain\Funcionarios;

class FuncionariosController {

    public function index($params){
        $funcionarioDAO = new FuncionariosDAO();
        $resultado = $funcionarioDAO->consultarTodos();
        $acao = $params[1] ?? "";
        $status = $params[2] ?? "";
        if($acao == "inserir" && $status == "true")
            $mensagem = "Registro inserido com sucesso!";
        elseif($acao == "inserir" && $status == "false")
            $mensagem = "Erro ao inserir!";
        elseif($acao == "alterar" && $status == "true")
            $mensagem = "Registro alterado com sucesso!";
        elseif($acao == "alterar" && $status == "false")
            $mensagem = "Erro ao alterar!";
        elseif($acao == "excluir" && $status == "true")
            $mensagem = "Registro excluído com sucesso!";
        elseif($acao == "excluir" && $status == "false")
            $mensagem = "Erro ao excluir!";
        else 
            $mensagem = "";
        require_once("../src/Views/funcionarios/funcionarios.php");
    }
    
    public function inserir($params){
        require_once("../src/Views/funcionarios/inserir_funcionarios.html");
    }

    public function novo($params){
        $funcionario = new Funcionarios(0, $_POST['nome'], $_POST['cpf']);
        $funcionarioDAO = new FuncionariosDAO();
        if ($funcionarioDAO->inserir($funcionario)){
            header("location: /funcionarios/inserir/true");
        } else {
            header("location: /funcionarios/inserir/false");
        }
    }

    public function alterar($params){
        $funcionarioDAO = new FuncionariosDAO();
        $resultado = $funcionarioDAO->consultar($params[1]);
        require_once("../src/Views/funcionarios/alterar_funcionarios.php");
    }

    public function excluir($params){
        $funcionarioDAO = new FuncionariosDAO();
        $resultado = $funcionarioDAO->consultar($params[1]);
        require_once("../src/Views/funcionarios/excluir_funcionarios.php");
    }

    public function editar($params){
        $funcionario = new Funcionarios($_POST['id'], $_POST['nome'], $_POST['cpf']);
        $funcionarioDAO = new FuncionariosDAO();
        if ($funcionarioDAO->alterar($funcionario)) {
            header("location: /funcionarios/alterar/true");
        } else {
            header("location: /funcionarios/alterar/false");
        }
    }

    public function deletar($params){
        $funcionarioDAO = new FuncionariosDAO();
        if ($funcionarioDAO->excluir($_POST['id'])){
            header("location: /funcionarios/excluir/true");
        } else {
            header("location: /funcionarios/excluir/false");
        }
    }
}

