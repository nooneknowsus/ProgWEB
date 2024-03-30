<?php 

class Funcionario {
    private $nome;
    private $codigo;
    private $salarioBase;


    public function __construct($nome, $codigo, $salarioBase){
        $this->nome = $nome;
        $this->codigo = $codigo;
        $this->salarioBase = $salarioBase;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getCodigo(){
        return $this->codigo;
    }

    public function getSalario(){
        return $this->salarioBase;
    }

    public function getSalarioLiquido(){
        $inss = $this->salarioBase * 0.1;
        $ir = 0.0;
        if ($this->salarioBase > 2000.0) {
            $ir = ($this->salarioBase - 2000) * 0.12; 
        } 
        return($this->salarioBase - $inss - $ir);
    }

    public function __toString(){
        return "<p>Nome: " . $this->nome . " Código: " . $this->codigo . " Salário: " . $this->salarioBase;
    }

}

class Servente extends Funcionario {
    private $insalubridade;

    public function __construct($nome, $codigo, $salarioBase, $insalubridade){
        parent::__construct($nome, $codigo, $salarioBase);
            $this->insalubridade = $insalubridade;
    }


    public function getInsalubridade(){
        return $this->insalubridade;
    }

    public function setInsalubridade($insalubridade) {
        $this->insalubridade = $insalubridade;
    }


    public function __toString(){
        return parent::__toString() . ", Insalubridade: " . $this->insalubridade . "</p>";
    }


}


class Motorista extends Funcionario{

    private $carteiraMotorista;

    public function __construct($nome, $codigo, $salarioBase, $carteiraMotorista){
        parent::__construct($nome, $codigo, $salarioBase);
            $this->carteiraMotorista = $carteiraMotorista;
    }

    public function setCaretiraMotorisat($carteiraMotorista){
        $this->carteiraMotorista = $carteiraMotorista;
    }
    public function __toString() {
        return parent::__toString() . ", Carteira de Motorista: " . $this->carteiraMotorista . "</p>";
    }
}

class MestreDeObras extends Servente {
    private $numFuncionarios;

    public function __construct($nome, $codigo, $salarioBase, $insalubridade, $numFuncionarios){
        parent::__construct($nome, $codigo, $salarioBase, $insalubridade);
        $this->numFuncionarios = $numFuncionarios;
    }

    public function getNumFuncionarios() {
        return $this->numFuncionarios;
    }

    public function setNumFuncionarios($numFuncionarios) {
        $this->numFuncionarios = $numFuncionarios;
    }

    public function getAdicionalMestre() {
        return ($this->numFuncionarios >= 10) ? ($this->numFuncionarios / 10) * 0.1 * $this->getSalario() : 0;
    }

    public function __toString() {
        return parent::__toString() . " Número de Funcionários: " . $this->numFuncionarios . ", Adicional Mestre: " . $this->getAdicionalMestre();
    }
}


    $servente = new Servente("João", "1", 1500, 5);
    echo $servente . "";

    $motorista = new Motorista("Marcelo", "2", 2000, "15032024");
    echo $motorista . "";

    $mestreDeObras = new MestreDeObras("Paulo", "3", 3000, 5, 15);
    echo $mestreDeObras . "";
?>