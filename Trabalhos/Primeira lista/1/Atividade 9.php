<?php
class ContaBancaria{
    private $saldo = 0;
    
    public function depositar($valor){
        $this->saldo += $valor;
    }

    public function sacar($valor){
       if($valor <= $this->saldo){
        $this->saldo -= $valor;
        return true;
    }
    return false;
    }
    public function getSaldo(){
        return $this->saldo;
    }
}
//Teste
$conta = new ContaBancaria();
$conta->depositar(700);
if ($conta->sacar(900)){
    echo "Saque realizado";
}
else{
    echo "Saldo insuficiente";
}

echo "Saldo atual R$". $conta->getSaldo();

?>