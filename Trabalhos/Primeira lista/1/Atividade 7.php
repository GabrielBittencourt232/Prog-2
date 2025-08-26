<?php
class Pedido{
    private $itens = [];

    public function adicionarItem($item){
        $this->itens[] = $item;
    }

    public function listarItens(){
        foreach ($this->itens as $i){
            echo $i . "<br>";
        }
    }
}

//Teste
$p = new Pedido();
$p->adicionarItem("Suco de Laranja");
$p->adicionarItem("Hamburguer");
$p->listarItens();
?>