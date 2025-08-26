<?php
class Funcionario {
    protected $salario;
}

class Gerente extends Funcionario{

    public function setSalario($salario){
        $this->salario = $salario;
    }

    public function getSalario(){
        return $this->salario;
    }
}



?>