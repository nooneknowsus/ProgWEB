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
    } else if ($B > $A){
        return "$A $B";
    }


});


#ROTAS

$resultado = $r->handler();

if (!$resultado) {
    http_response_code(404);
    echo "Página não encontrada!";
    die();
}

echo $resultado($r->getParams());


