<?php

// Componente 1 processador
class Processador {
    private $modelo;

    public function __construct(string $modelo) {
        $this->modelo = $modelo;
        echo "Processador $modelo faz parte do sistema.<br>";
    }

    public function __destruct() {
        echo "Processador {$this->modelo} foi removido.<br>";
    }
    
    public function getInfo() {
        return "Processador: {$this->modelo}";
    }
}

// Componente 2 placa mãe
class PlacaMae {
    private $marca;

    public function __construct(string $marca) {
        $this->marca = $marca;
        echo "Placa-Mãe com marca $marca foi instalada.<br>";
    }

    public function __destruct() {
        echo "Placa-Mãe foi desinstalada.<br>";
    }

    public function getInfo() {
        return "Placa-Mãe: {$this->marca}";
    }
}

// Componente 3 memória
class Memoria {
    private $tamanho;

    public function __construct(int $tamanho) {
        $this->tamanho = $tamanho;
        echo "Módulo de Memória de {$tamanho}GB foi instalado.<br>";
    }

    public function __destruct() {
        echo "Módulo de Memória de {$this->tamanho}GB foi removido.<br>";
    }
}

// Classe Todo Computador
class Computador {
    private $processador; // Componente 1
    private $placaMae; // Componente 2
    private $memorias; // Componente 3 [vetor]

    public function __construct(string $modeloProcessador, string $marcaPlacaMae, int $numMemorias, int $tamanhoMemoria) {
        echo "<br> Computador completo <br>";
        
        // As partes foram criadas internamente no construtor (Composição)
        $this->processador = new Processador($modeloProcessador);
        $this->placaMae = new PlacaMae($marcaPlacaMae);

        // Criação de múltiplos componentes
        $this->memorias = [];
        for ($i = 0; $i < $numMemorias; $i++) {
            $this->memorias[] = new Memoria($tamanhoMemoria);
        }
    }
    
    public function ligar() {
        echo "Computador iniciando. Componentes: {$this->processador->getInfo()}, {$this->placaMae->getInfo()}.<br>";
        echo "Total de Módulos de memória: " . count($this->memorias) . ".<br>";
    } 

    public function __destruct() {
        // Quando o objeto Computador é destruído, o garbage collector do PHP
        // o garbage collector garante que as partes que não tem mais referências sejam destruídas também
        echo "<br> Destruindo o Computador <br>";
    }
}

// Ex de uso
$pcGamer = new Computador("Core i3", "Asus", 4, 16);
$pcGamer->ligar();

unset($pcGamer); 
?>
