<?php

class Calculadora {
    /**
     * Soma dois ou três números.
     * Se o terceiro parâmetro ($c) não for passado, seu valor será null.
     */
    public function somar($a, $b, $c = null) {
        if ($c !== null) {
            // Se $c foi fornecido, soma os três
            return $a + $b + $c;
        }
        // Caso contrário, soma apenas os dois primeiros
        return $a + $b;
    }
}

$calc = new Calculadora();

// Chamada com 2 parâmetros
echo "Soma de 5 + 3: " . $calc->somar(5, 3) . "\n"; // Saída: 8

// Chamada com 3 parâmetros
echo "Soma de 5 + 3 + 2: " . $calc->somar(5, 3, 2) . "\n"; // Saída: 10

?>