<?php namespace Core;

// [Utilização das aulas: Reusabilidade e Persistência de Dados - Interface define Contrato]
[cite_start]// A interface define o contrato de métodos CRUD que todas as classes Model terão que implementar. [cite: 1490, 1503]
interface Repositorio {
    public function salvar(object $obj): bool;
    public function listar(): array;
    public function buscarPorId(int $id): ?object;
    public function atualizar(object $obj): bool;
    public function deletar(int $id): bool;
}