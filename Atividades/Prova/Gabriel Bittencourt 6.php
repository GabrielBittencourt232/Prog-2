<?php

//ex básico de associação
class Usuario
{
    private string $nome;

    public function __construct(string $nome)
    {
        $this->nome = $nome;
    }

    public function getNome(): string
    {
        return $this->nome;
    }
}

class Prova
{
    private string $materia;
    private Usuario $responsavel;

    public function __construct(string $materia, Usuario $responsavel = null)
    {
        $this->materia = $materia;
        $this->responsavel = $responsavel;
    }

    public function setResponsavel(Usuario $usuario): void
    {
        $this->responsavel = $usuario;
    }

    public function getResponsavel(): Usuario
    {
        return $this->responsavel;
    }

    public function descricao(): string
    {
        $nome = $this->responsavel ? $this->responsavel->getNome() : "Sem responsável";
        return "{$this->materia} — Responsável: {$nome}";
    }
}

// Ex de uso
$gabriel = new Usuario("gabriel");
$A1 = new Prova("Prog 2", $gabriel);
echo $A1->descricao() . "<br>"; //  Prog 2 — Responsável: gabriel

$leandro = new Usuario("leandro");
$A1->setResponsavel($leandro);
echo $A1->descricao() . "<br>"; // Prog 2 — Responsável: leandro

?>
