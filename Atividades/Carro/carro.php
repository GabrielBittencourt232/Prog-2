<?php
class Carro{
    public $marca;
    public $modelo;
    public $ano;
    
    public function exibirInformacoes()
    {
        echo "O carro é da marca:". $this->marca . " modelo:" . $this->modelo  ." e ano:". $this->ano  . "";
    }
}

$meuCarro = new Carro();
$meuCarro->marca = "FIAT";
$meuCarro->modelo = "Palio";
$meuCarro->ano = 1997; 

$meuCarro->exibirInformacoes();


?>