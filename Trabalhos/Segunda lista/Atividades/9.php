<?php

// Interface que define o contrato para os formatadores
interface FormatadorDeTexto {
    public function formatar($texto);
}

// Implementações concretas da interface
class Maiusculo implements FormatadorDeTexto {
    public function formatar($texto) {
        return strtoupper($texto);
    }
}

class Minusculo implements FormatadorDeTexto {
    public function formatar($texto) {
        return strtolower($texto);
    }
}

class Capitalizado implements FormatadorDeTexto {
    public function formatar($texto) {
        return ucwords(strtolower($texto));
    }
}

// Classe que usa um formatador
class Mensagem {
    private $texto;

    public function __construct($texto) {
        $this->texto = $texto;
    }

    public function exibir(FormatadorDeTexto $formatador) {
        echo $formatador->formatar($this->texto) . "<br>";
    }
}

// Demonstração
$mensagem = new Mensagem("Exemplo Formatador de Texto");

echo "Formato Maiúsculo: ";
$mensagem->exibir(new Maiusculo());

echo "Formato Minúsculo: ";
$mensagem->exibir(new Minusculo());

echo "Formato Capitalizado: ";
$mensagem->exibir(new Capitalizado());

?>