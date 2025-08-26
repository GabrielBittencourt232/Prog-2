<?php
class ContaBancaria{
    private $saldo = 0;
    
    public function depositar($valor){
        $this->saldo += $valor;
    }

    public function sacar($valor){
        $this->saldo -= $valor;
    }

    public function getSaldo(){
        return $this->saldo;
    }
}



?>