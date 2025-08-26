<?php
class Produto{
    public $nome;
    public $preco;

    public function ExibirValor(){
        echo"O produto ". $this->nome. " custa R$". $this->preco;
    }

}
$Cookie = new Produto;
$Cookie->nome = "Biscoito";
$Cookie->preco = 3.50;

$Cookie->ExibirValor(); 

?>