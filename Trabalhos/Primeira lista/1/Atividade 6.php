<?php
class Config{
    protected $parametros;
}

class ConfigApp extends Config{
    public function setParametros($p){
        $this->parametros = $p;
    }
    public function getParametros(){   
        return $this->parametros;
    }
}
//Teste
$c = new ConfigApp();
$c->setParametros("Modo claro ativado");

echo $c->getParametros();
?>