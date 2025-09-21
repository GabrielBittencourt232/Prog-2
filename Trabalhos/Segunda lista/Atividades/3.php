<?php

// Classe base abstrata
abstract class Pagamento {
    abstract public function processar();
}

// Subclasse para pagamento com Cartão
class Cartao extends Pagamento {
    public function processar() {
        echo "Processando pagamento com Cartão de Crédito...\n";
    }
}

// Subclasse para pagamento com Pix
class Pix extends Pagamento {
    public function processar() {
        echo "Processando pagamento via Pix...\n";
    }
}

// Subclasse para pagamento com Boleto
class Boleto extends Pagamento {
    public function processar() {
        echo "Processando pagamento com Boleto Bancário...\n";
    }
}

// Demonstração
$pagamentoCartao = new Cartao();
$pagamentoPix = new Pix();
$pagamentoBoleto = new Boleto();

$pagamentoCartao->processar();
$pagamentoPix->processar();
$pagamentoBoleto->processar();

?>