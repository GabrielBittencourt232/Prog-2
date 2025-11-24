<?php namespace Controllers;

// [Utilização das aulas: Reuso de Código - Criação de uma classe base para herdar funcionalidades comuns]
class Controller {
    // Método para carregar a View
    public function view(string $viewPath, array $data = []): void {
        extract($data); // Transforma as chaves do array $data em variáveis locais
        require_once "../app/Views/$viewPath.php";
    }
}