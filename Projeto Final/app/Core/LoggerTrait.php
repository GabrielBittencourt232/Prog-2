<?php namespace Core;

// [Utilização das aulas: Reusabilidade do Código - Trait para reuso horizontal de código]
[cite_start]// Permite que qualquer classe Model ou Controller use a funcionalidade de log sem herança vertical. [cite: 1953, 1959, 1962]
trait LoggerTrait {
    public function registrarLog(string $mensagem, string $nivel = 'INFO'): void {
        $data = date('Y-m-d H:i:s');
        $logEntry = "[$data][$nivel] $mensagem\n";
        // Em um projeto real, você escreveria para um arquivo de log ou banco de dados.
        // Aqui, apenas exibimos.
        error_log($logEntry); 
    }
}