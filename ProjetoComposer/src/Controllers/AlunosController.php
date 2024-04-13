<?php

namespace Php\Primeiroprojeto\Controllers;

use Php\Primeiroprojeto\Models\DAO\AlunosDAO;
use Php\Primeiroprojeto\Models\Domain\Alunos;

class AlunosController {

    public function inserir($params) {
        require_once("../src/Views/alunos/inserir_alunos.html");
    }

    public function novo($params) {
        $alunos = new Alunos(0, $_POST['nome'], $_POST['ra']);
        $alunosDAO = new AlunosDAO();
        if ($alunosDAO->inserir($alunos)) {
            return "Inserido com sucesso!";
        } else {
            return "Erro ao inserir!";
        }
    }
}

