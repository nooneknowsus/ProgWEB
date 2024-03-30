<?php

class Ponto
{
    private $x;
    private $y;
    private static $contador = 0;

    public function __construct($x, $y)
    {
        $this->x = $x;
        $this->y = $y;
        self::$contador++;
    }

    public static function getContador()
    {
        return self::$contador;
    }

    public function setX($x)
    {
        $this->x = $x;
    }

    public function getX()
    {
        return $this->x;
    }

    public function setY($y)
    {
        $this->y = $y;
    }

    public function getY()
    {
        return $this->y;
    }

    public function distanciaPontos(Ponto $p)
    {
        return sqrt(pow($p->getX() - $this->getX(), 2) + pow($p->getY() - $this->getY(), 2));
    }

    public function distanciaCoordenadas($x, $y)
    {
        return sqrt(pow($x - $this->x, 2) + pow($y - $this->y, 2));
    }

    public static function distanciaDoisPontos($x1, $x2, $y1, $y2)
    {
        return sqrt(pow($x2 - $x1, 2) + pow($y2 - $y1, 2));
    }

}
    $ponto1 = new Ponto(9, 16);
    $ponto2 = new Ponto(20, 6);

    echo "<p>Número de pontos criados: " . Ponto::getContador() . "</p>";

    echo "<p>Distância entre Objeto Ponto1 e Objeto Ponto2: " . $ponto1->distanciaPontos($ponto2) . "</p>";

    echo "<p>Distância entre ponto1 e (5, 8): " . $ponto1->distanciaCoordenadas(5, 8) . "</p>";

    echo "<p>Distância entre (2, 4) e (20, 6): " . Ponto::distanciaDoisPontos(2, 4, 20, 6) . "</p>";
?>