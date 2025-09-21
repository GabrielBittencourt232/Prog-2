<?php

// Classe base abstrata
abstract class FiguraGeometrica {
    abstract public function calcularArea();
}

class Quadrado extends FiguraGeometrica {
    private $lado;

    public function __construct($lado) {
        $this->lado = $lado;
    }

    public function calcularArea() {
        return $this->lado * $this->lado;
    }
}

class Circulo extends FiguraGeometrica {
    private $raio;

    public function __construct($raio) {
        $this->raio = $raio;
    }

    public function calcularArea() {
        return pi() * pow($this->raio, 2);
    }
}

class Retangulo extends FiguraGeometrica {
    private $base;
    private $altura;

    public function __construct($base, $altura) {
        $this->base = $base;
        $this->altura = $altura;
    }

    public function calcularArea() {
        return $this->base * $this->altura;
    }
}

// Demonstração
$quadrado = new Quadrado(5);
$circulo = new Circulo(3);
$retangulo = new Retangulo(4, 6);

echo "Área do Quadrado: " . $quadrado->calcularArea() . "<br>";
echo "Área do Círculo: " . $circulo->calcularArea() . "<br>";
echo "Área do Retângulo: " . $retangulo->calcularArea() . "<br>";

?>