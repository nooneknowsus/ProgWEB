<?php

namespace Php\Primeiroprojeto\Controllers;

use Php\Primeiroprojeto\Models\DAO\ProfessorDAO;
use Php\Primeiroprojeto\Models\Domain\Professor;

class ProfessorController {

    public function index($params){
        $professorDAO = new ProfessorDAO();
        $resultado = $professorDAO->consultarTodos();
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
        require_once("../src/Views/professores/professores.php");
    }
    
    public function inserir($params){
        require_once("../src/Views/professores/inserir_professor.html");
    }

    public function novo($params){
        $professor = new Professor(0, $_POST['nome'], $_POST['graduacao']);
        $professorDAO = new ProfessorDAO();
        if ($professorDAO->inserir($professor)){
            header("location: /professores/inserir/true");
        } else {
            header("location: /professores/inserir/false");
        }
    }

    public function alterar($params){
        $professorDAO = new ProfessorDAO();
        $resultado = $professorDAO->consultar($params[1]);
        require_once("../src/Views/professores/alterar_professor.php");
    }

    public function excluir($params){
        $professorDAO = new ProfessorDAO();
        $resultado = $professorDAO->consultar($params[1]);
        require_once("../src/Views/professores/excluir_professor.php");
    }

    public function editar($params){
        $professor = new Professor($_POST['id'], $_POST['nome'], $_POST['graduacao']);
        $professorDAO = new ProfessorDAO();
        if ($professorDAO->alterar($professor)) {
            header("location: /professores/alterar/true");
        } else {
            header("location: /professores/alterar/false");
        }
    }

    public function deletar($params){
        $professorDAO = new ProfessorDAO();
        if ($professorDAO->excluir($_POST['id'])){
            header("location: /professores/excluir/true");
        } else {
            header("location: /professores/excluir/false");
        }
    }
}

