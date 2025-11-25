<?php namespace Models;

class IdentificadorVeicular {
    private string $placa; // Número da placa

    // Construtor: O identificador é criado com a placa.
    public function __construct(string $placa) {
        $this->placa = strtoupper(trim($placa)); // Garante que a placa seja em letras maiúsculas
    }

    // Getter
    public function getPlaca(): string { 
        return $this->placa; 
    }
    
    // Método destrutor para demonstrar o ciclo de vida COMPARTILHADO.
    // Quando o Veículo é destruído, este componente também é, simulando o cancelamento do registro.
    public function __destruct() {
        error_log("[COMPOSIÇÃO] Identificador (Placa: {$this->placa}) DELETADO DO SISTEMA.");
    }
}