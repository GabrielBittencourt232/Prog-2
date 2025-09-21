<?php

abstract class Impressora {
    abstract public function imprimir($documento);
}

class PDF extends Impressora {
    public function imprimir($documento) {
        echo "Imprimindo documento PDF: " . $documento . "<br>";
    }
}

class Texto extends Impressora {
    public function imprimir($documento) {
        echo "Imprimindo arquivo de texto (.txt): " . $documento . "<br>";
    }
}

class Imagem extends Impressora {
    public function imprimir($documento) {
        echo "Imprimindo imagem (JPG, PNG): " . $documento . "<br>";
    }
}

// Demonstração
$impressoraPdf = new PDF();
$impressoraTexto = new Texto();
$impressoraImagem = new Imagem();

$impressoraPdf->imprimir("relatorio_final.pdf");
$impressoraTexto->imprimir("anotacoes.txt");
$impressoraImagem->imprimir("foto_ferias.jpg");

?>