<?php

abstract class Transporte {
    // A tarifa pode depender de fatores como a distância
    abstract public function calcularTarifa($distancia);
}

class Onibus extends Transporte {
    public function calcularTarifa($distancia) {
        // Tarifa fixa, independente da distância
        return 5.50;
    }
}

class Metro extends Transporte {
    public function calcularTarifa($distancia) {
        // Tarifa fixa, independente da distância
        return 6.00;
    }
}

class Taxi extends Transporte {
    private $bandeira = 4.50;
    private $precoPorKm = 2.75;

    public function calcularTarifa($distancia) {
        // Tarifa base + (distância * preço por km)
        return $this->bandeira + ($distancia * $this->precoPorKm);
    }
}

// Demonstração
$onibus = new Onibus();
$metro = new Metro();
$taxi = new Taxi();
$distanciaViagem = 10; // 10 km

// O uso do number_format é apenas para exibir o valor em formato de moeda
echo "Tarifa do Ônibus: R$ " . number_format($onibus->calcularTarifa($distanciaViagem), 2, ',', '.') . "<br>";
echo "Tarifa do Metrô: R$ " . number_format($metro->calcularTarifa($distanciaViagem), 2, ',', '.') . "<br>";
echo "Tarifa do Táxi para " . $distanciaViagem . "km: R$ " . number_format($taxi->calcularTarifa($distanciaViagem), 2, ',', '.') . "<br>";

?>