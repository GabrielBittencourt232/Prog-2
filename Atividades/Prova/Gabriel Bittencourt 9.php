<?php

// Exemplo simples de composição: Biblioteca cria e possui Livros.
// Os Livros são criados pela Biblioteca (Dependência vital).

class Livro
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

class Biblioteca
{
    // variável livros
    private array $livros = [];

    // Cria e adiciona um Livro (biblioteca controla a criação do Livro)
    public function adicionarLivro(string $nome): Livro
    {
        $livro = new Livro($nome);
        $this->livros[] = $livro;
        return $livro;
    }

    public function listarLivros(): array
    {
        return array_map(fn(Livro $l) => $l->getNome(), $this->livros);
    }

    public function removerLivro(string $nome): bool
    {
        foreach ($this->livros as $i => $l) {
            if ($l->getNome() === $nome) {
                array_splice($this->livros, $i, 1);
                return true;
            }
        }
        return false;
    }
}

//Ex de uso
$biblioteca = new Biblioteca();
$biblioteca->adicionarLivro("Percy Jackson");
$biblioteca->adicionarLivro("Enigma do Medo"); // adicionou dois livros

$biblioteca->removerLivro("Percy Jackson"); //Removeu Percy Jackson da biblioteca
?>
