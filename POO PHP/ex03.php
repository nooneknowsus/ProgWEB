<?php

abstract class Telefone
{
    protected $ddd;
    protected $numero;

    abstract public function calculaCusto($tempoDeLigacao);

}


class Fixo extends Telefone
{
    private $custoPorMinuto;

    public function __construct($ddd, $numero, $custoPorMinuto)
    {
        parent::__construct($ddd, $numero);
        $this->custoPorMinuto = $custoPorMinuto;
    }

    public function calculaCusto($tempoLigacao)
    {
        return $tempoLigacao * $this->custoPorMinuto;
    }

}

class PrePago extends Celular
{
    public function calculaCusto($tempoLigacao)
    {
        return $tempoLigacao * ($this->custoMinutoBase * 1.4);
    }
}

abstract class Celular extends Telefone
{
    protected $custoMinutoBase;
    protected $operadora;

    public function __construct($ddd, $numero, $custoMinutoBase, $operadora)
    {
        parent::__construct($ddd, $numero);
        $this->custoMinutoBase = $custoMinutoBase;
        $this->operadora = $operadora;
    }
}

class PosPago extends Celular
{
    public function calculaCusto($tempoLigacao)
    {
        return $tempoLigacao * ($this->custoMinutoBase * 0.9);
    }
}

?>