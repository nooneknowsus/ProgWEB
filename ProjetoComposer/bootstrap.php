<?php

require __DIR__."/vendor/autoload.php";

$metodo = $_SERVER['REQUEST_METHOD'];
$caminho = $_SERVER['PATH_INFO'] ?? '/';

$r = new Php\Primeiroprojeto\Router($metodo, $caminho);

#ROTAS

$r->get('/olamundo', function (){
    return "Olá mundo!";
} );

$r->get('/olapessoa/{nome}', function($params){
    return 'Olá '.$params[1];
} );

$r->get('/exer1/formulario', function(){
    include("exer1.html");
} );

$r->post('/exer1/resposta', function(){
    $valor1 = $_POST['valor1'];
    $valor2 = $_POST['valor2'];
    $soma = $valor1 + $valor2;
    return "a soma é :" . $soma;
} );

# Lista 

$r->get('/ex1/formulario', function(){
    include("ex1.html");
} );

$r->post('/ex1/resposta', function(){
    $valor1 = $_POST['valor1'];
    
    if ($valor1 > 0) {
        return "Valor positivo";
    } else if ($valor1 == 0) {
        return "Valor igual a zero";
    } else {
        return "Valor negativo";
    }
    
} );


$r->get('/ex3/formulario', function(){
    include("ex3.html");
} );

$r->post('/ex3/resposta', function(){
    $valor1 = $_POST['valor1'];
    $valor2 = $_POST['valor2'];
    
    $soma = $valor1 + $valor2;

    if ($valor1 == $valor2){
        return "Os valores são iguais: " . $soma * 3;
    } else {
        return "$valor1 + $valor2 = " . $soma;
    }
    
    
} );

#ROTAS

$resultado = $r->handler();

if(!$resultado){
    http_response_code(404);
    echo "Página não encontrada!";
    die();
}

echo $resultado($r->getParams());


