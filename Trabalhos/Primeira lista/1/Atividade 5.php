<?php
class Usuario{
    private $senha = 4002;

    public function verificarSenha($senhaDigitada){
        $senha = $this->senha === $senhaDigitada;
    }
} 

$u = new Usuario();
var_dump($u-> verificarSenha("4002")); //verdadeiro
var_dump($u-> verificarSenha("5555")); //falso

?>