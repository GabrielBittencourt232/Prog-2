<?php
class Aluno
{
    public $nome;
    public $media;

    public function verificarAprovacao()
    {
        if ($this->media >= 7) {
        echo "<br>".$this->nome. " aprovado". " ";
        
    }
    else {
        echo "<br>". $this->nome. " reprovado". " ";
    }
}
}

$aluno1 = new Aluno();
$aluno1->nome = "Jonatan";
$aluno1->media = 6.5;

$aluno2 = new Aluno();
$aluno2->nome = "Pedro";
$aluno2->media = 8.5;

$aluno1->verificarAprovacao();

$aluno2->verificarAprovacao();

?>