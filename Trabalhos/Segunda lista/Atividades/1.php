<?php

// Classe base
class Animal {
    public function falar() {
        echo "O animal faz um som.\n";
    }
}

// Subclasse Cachorro
class Cachorro extends Animal {
    // Sobrescrevendo o método falar()
    public function falar() {
        echo "Au Au\n";
    }
}

// Subclasse Gato
class Gato extends Animal {
    // Sobrescrevendo o método falar()
    public function falar() {
        echo "Miau\n";
    }
}

// Demonstração do polimorfismo
$cachorro = new Cachorro();
$gato = new Gato();

echo "O cachorro diz: ";
$cachorro->falar(); // Saída: Au Au

echo "O gato diz: ";
$gato->falar();     // Saída: Miau

?>