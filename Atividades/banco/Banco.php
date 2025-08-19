<?php
class Conta{
    private $titular;
    private $saldo;
    private $numero;

    public function __construct($titular, $saldo, $numero){
        $this->titular = $titular;
        $this->saldo = $saldo;

    }
}

?>