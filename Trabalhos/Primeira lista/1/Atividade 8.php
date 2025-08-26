<?php
class Cliente{
    public $nome;
    protected $cpf;
    private $telefone;

    public function setTelefone($telefone){
        $this->telefone = $telefone;
    }
    public function getTelefone(){
        return $this->telefone;
    }
}

//Teste
$c = new Cliente();
$c->nome = "Jonatan";
$c->setTelefone("49999676753");

echo "Nome: $c->nome <br>";
echo "Telefone: ". $c->getTelefone();
?>