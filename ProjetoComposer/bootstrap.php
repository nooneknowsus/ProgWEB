<?php
require __DIR__ . "/vendor/autoload.php";
$metodo = $_SERVER['REQUEST_METHOD'];
$caminho = $_SERVER['PATH_INFO'] ?? '/';
$r = new Php\Primeiroprojeto\Router($metodo, $caminho);
#ROTAS
$r->get('/olamundo', function () {
    return "Olá mundo!";
});
$r->get('/olapessoa/{nome}', function ($params) {
    return 'Olá ' . $params[1];
});
$r->get('/exer1/formulario', function () {
    include ("exer1.html");
});
$r->post('/exer1/resposta', function () {
    $valor1 = $_POST['valor1'];
    $valor2 = $_POST['valor2'];
    $soma = $valor1 + $valor2;
    return "a soma é :" . $soma;
});
# Lista 
$r->get('/ex1/formulario', function () {
    include ("ex1.html");
});
$r->post('/ex1/resposta', function () {
    $valor1 = $_POST['valor1'];
    if ($valor1 > 0) {
        return "Valor positivo";
    } else if ($valor1 == 0) {
        return "Valor igual a zero";
    } else {
        return "Valor negativo";
    }
});
$r->get('/ex2/formulario', function () {
    include ("ex2.html");
});
$r->post('/ex2/resposta', function () {
    function encontrarMenor($numeros)
    {
        $menor = $numeros[0];
        $posicao = 0;
        $tamanho = count($numeros);
        for ($i = 1; $i < $tamanho; $i++) {
            if ($numeros[$i] < $menor) {
                $menor = $numeros[$i];
                $posicao = $i;
            }
        }
        return array ("valor" => $menor, "posicao" => $posicao);
    }
    $numeros = array (
        $_POST['valor1'],
        $_POST['valor2'],
        $_POST['valor3'],
        $_POST['valor4'],
        $_POST['valor5'],
        $_POST['valor6'],
        $_POST['valor7']
    );
    $resultado = encontrarMenor($numeros);
    echo "Menor valor: " . $resultado["valor"] . "<br>";
    echo "Posição do menor valor na sequência de entrada: " . ($resultado["posicao"] + 1) . "<br>";
});
$r->get('/ex3/formulario', function () {
    include ("ex3.html");
});
$r->post('/ex3/resposta', function () {
    $valor1 = $_POST['valor1'];
    $valor2 = $_POST['valor2'];
    $soma = $valor1 + $valor2;
    if ($valor1 == $valor2) {
        return "Os valores são iguais: " . $soma * 3;
    } else {
        return "$valor1 + $valor2 = " . $soma;
    }
});
$r->get('/ex4/formulario', function () {
    include ("ex4.html");
});
$r->post('/ex4/resposta', function () {
    $valor1 = $_POST['valor1'];
    function tabuada($valor)
    {
        $i = 1;
        while ($i <= 10) {
            echo "<p>$valor x $i = " . $valor * $i . "</p>";
            $i++;
        }
    }
    return tabuada($valor1);
});
$r->get('/ex5/formulario', function () {
    include ("ex5.html");
});
$r->post('/ex5/resposta', function () {
    $valor1 = $_POST['valor1'];
    function fatorial($valor)
    {
        if ($valor == 0 || $valor == 1) {
            return 1;
        } else {
            $resultado = 1;
            for ($i = 2; $i <= $valor; $i++) {
                $resultado = $resultado * $i;
            }
            return "$valor! = " . $resultado;
        }
    }
    return fatorial($valor1);
});
$r->get('/ex6/formulario', function () {
    include ("ex6.html");
});
$r->post('/ex6/resposta', function () {
    $A = $_POST['valor1'];
    $B = $_POST['valor2'];
    if ($A > $B) {
        return "$B $A";
    } else if ($A == $B) {
        return "Números iguai: $A";
    } else if ($B > $A) {
        return "$A $B";
    }
});
$r->get('/ex7/formulario', function () {
    include ("ex7.html");
});
$r->post('/ex7/resposta', function () {
    $valor1 = $_POST['valor1'];
    $valorConvertido = $valor1 * 100;
    return "{$valor1}m = {$valorConvertido}cm";
});
$r->get('/ex8/formulario', function () {
    include ("ex8.html");
});
$r->post('/ex8/resposta', function () {
    $valor1 = $_POST['valor1'];
    $litros = $valor1 / 3;
    $latas = ceil($litros / 18);
    $valorTotal = $latas * 80;
    echo "<p>Latas de tinta necessárias: $latas</p>";
    echo "<p>Valor Total: R$ " . number_format($valorTotal, 2, ',', '.') . "</p>";
});
$r->get('/ex9/formulario', function () {
    include ("ex9.html");
});
$r->post('/ex9/resposta', function () {
    $anoNascimento = $_POST['valor1'];
    $ano_atual = date("Y");
    $idade = $ano_atual - $anoNascimento;
    $diasDeVida = $anoNascimento * 365;
    $nextYear = 2025 - $anoNascimento;
    echo "<p>A. Você tem $idade ano(s)</p>";
    echo "<p>B. Você viveu em torno de $diasDeVida dias de vida.</p>";
    echo "<p>C. Você terá $nextYear ano(s) em 2025</p>";
});
$r->get('/ex10/formulario', function () {
    include ("ex10.html");
});
$r->post('/ex10/resposta', function () {
    $peso = $_POST['valor1'];
    $altura = $_POST['valor2'];
    $imc = $peso / ($altura ** 2);
    $imc_formatado = number_format($imc, 2);
    echo"<p>Seu IMC: $imc_formatado</p>";
    if ($imc < 18.5) {
        return "Classificação: Magreza";
    } else if ($imc >= 18.5 && $imc <= 24.9) {
        return "Classificação: Normal";
    } else if ($imc >= 25 && $imc <= 29.9) {
        return "Classificação: Sobrepeso";
    } else if ($imc >= 30 && $imc <= 39.9) {
        return "Classificação: Obesidade Grau II";
    } else {
        return "Classificação: Obesidade Grave Grau III";
    }
});
//Chamando o formulário para inserir categoria
$r->get('/categoria/inserir',
    'Php\Primeiroprojeto\Controllers\CategoriaController@inserir');

$r->post('/categoria/novo',
    'Php\Primeiroprojeto\Controllers\CategoriaController@novo');

$r->get('/categoria', 
    'Php\Primeiroprojeto\Controllers\CategoriaController@index');

$r->get('/categoria/{acao}/{status}', 
    'Php\Primeiroprojeto\Controllers\CategoriaController@index');

$r->get('/categoria/alterar/id/{id}',
    'Php\Primeiroprojeto\Controllers\CategoriaController@alterar');

$r->get('/categoria/excluir/id/{id}',
    'Php\Primeiroprojeto\Controllers\CategoriaController@excluir');

$r->post('/categoria/editar',
    'Php\Primeiroprojeto\Controllers\CategoriaController@editar');

$r->post('/categoria/deletar',
    'Php\Primeiroprojeto\Controllers\CategoriaController@deletar');
    
//Chamando o formulário para inserir Alunos
$r->get('/alunos/inserir',
    'Php\Primeiroprojeto\Controllers\AlunosController@inserir');
$r->post('/alunos/novo',
    'Php\Primeiroprojeto\Controllers\AlunosController@novo');

$r->get('/alunos', 
    'Php\Primeiroprojeto\Controllers\AlunosController@index');

$r->get('/alunos/{acao}/{status}', 
    'Php\Primeiroprojeto\Controllers\AlunosController@index');

$r->get('/alunos/alterar/id/{id}',
    'Php\Primeiroprojeto\Controllers\AlunosController@alterar');

$r->get('/alunos/excluir/id/{id}',
    'Php\Primeiroprojeto\Controllers\AlunosController@excluir');

$r->post('/alunos/editar',
    'Php\Primeiroprojeto\Controllers\AlunosController@editar');

$r->post('/alunos/deletar',
    'Php\Primeiroprojeto\Controllers\AlunosController@deletar');

//Chamando o formulário para inserir Cursos
$r->get('/curso/inserir',
    'Php\Primeiroprojeto\Controllers\CursoController@inserir');
$r->post('/curso/novo',
    'Php\Primeiroprojeto\Controllers\CursoController@novo');

$r->get('/curso', 
    'Php\Primeiroprojeto\Controllers\CursoController@index');

$r->get('/curso/{acao}/{status}', 
    'Php\Primeiroprojeto\Controllers\CursoController@index');

$r->get('/curso/alterar/id/{id}',
    'Php\Primeiroprojeto\Controllers\CursoController@alterar');

$r->get('/curso/excluir/id/{id}',
    'Php\Primeiroprojeto\Controllers\CursoController@excluir');

$r->post('/curso/editar',
    'Php\Primeiroprojeto\Controllers\CursoController@editar');

$r->post('/curso/deletar',
    'Php\Primeiroprojeto\Controllers\CursoController@deletar');


//Chamando o formulário para inserir Funcionarios
$r->get('/funcionarios/inserir',
    'Php\Primeiroprojeto\Controllers\FuncionariosController@inserir');
    
$r->post('/funcionarios/novo',
    'Php\Primeiroprojeto\Controllers\FuncionariosController@novo');

$r->get('/funcionarios', 
    'Php\Primeiroprojeto\Controllers\FuncionariosController@index');

$r->get('/funcionarios/{acao}/{status}', 
    'Php\Primeiroprojeto\Controllers\FuncionariosController@index');

$r->get('/funcionarios/alterar/id/{id}',
    'Php\Primeiroprojeto\Controllers\FuncionariosController@alterar');

$r->get('/funcionarios/excluir/id/{id}',
    'Php\Primeiroprojeto\Controllers\FuncionariosController@excluir');

$r->post('/funcionarios/editar',
    'Php\Primeiroprojeto\Controllers\FuncionariosController@editar');

$r->post('/funcionarios/deletar',
    'Php\Primeiroprojeto\Controllers\FuncionariosController@deletar');

//Chamando o formulário para inserir Professores
$r->get('/professores/inserir',
    'Php\Primeiroprojeto\Controllers\funcionarios@inserir');

$r->post('/professores/novo',
    'Php\Primeiroprojeto\Controllers\ProfessorController@novo');

#ROTAS

$resultado = $r->handler();
 
if(!$resultado){
    http_response_code(404);
    echo "Página não encontrada!";
    die();
}
 
if ($resultado instanceof Closure){
    echo $resultado($r->getParams());
} elseif (is_string($resultado)){
    $resultado = explode("@", $resultado);
    $controller = new $resultado[0];
    $resultado = $resultado[1];
    echo $controller->$resultado($r->getParams());
}