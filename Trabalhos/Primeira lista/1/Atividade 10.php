<?php
class ConexaoBD{
    public function conectar(){
        return "Conexão com banco estabelecida!";
    }

    public function getConexao(){
        return $this-> conectar();
    }
}

//Teste
$bd = new ConexaoBD();
echo $bd->getConexao();

?>