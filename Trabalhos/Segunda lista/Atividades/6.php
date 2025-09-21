<?php

class Relatorio {
    public function __call($nomeMetodo, $argumentos) {
        echo "Tentando chamar o método '$nomeMetodo' com " . count($argumentos) . " argumento(s).<br>";

        if ($nomeMetodo == 'gerar') {
            if (count($argumentos) == 1) {
                echo "Gerando relatório simples para: " . $argumentos[0] . "<br>";
            } elseif (count($argumentos) == 2) {
                echo "Gerando relatório para '" . $argumentos[0] . "' no período de '" . $argumentos[1] . "'.<br>";
            } else {
                echo "Método 'gerar' chamado com número de argumentos inválido. <br>";
            }
        } else {
            echo "Método '$nomeMetodo' não encontrado.<br>";
        }
    }
}

$relatorio = new Relatorio();

// Simulação de sobrecarga
$relatorio->gerar('Vendas');
$relatorio->gerar('Despesas', 'Setembro');
$relatorio->outroMetodo();

?>