<?php

abstract class Veiculo {
    abstract public function mover();
}

class Carro extends Veiculo {
    public function mover() {
        echo "O carro está acelerando na estrada.<br>";
    }
}

class Bicicleta extends Veiculo {
    public function mover() {
        echo "A bicicleta está pedalando na ciclovia.<br>";
    }
}

class Aviao extends Veiculo {
    public function mover() {
        echo "O avião está decolando e voando pelos céus.<br>";
    }
}

// Demonstração
$carro = new Carro();
$bicicleta = new Bicicleta();
$aviao = new Aviao();

$carro->mover();
$bicicleta->mover();
$aviao->mover();

?>