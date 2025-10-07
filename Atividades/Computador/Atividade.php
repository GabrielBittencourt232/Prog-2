<?php

// Classe Parte 1
class Processador {
    private $modelo;

    public function __construct(string $modelo) {
        $this->modelo = $modelo;
        echo "Processador $modelo foi instalado.<br>";
    }

    public function __destruct() {
        echo "Processador {$this->modelo} foi desinstalado.<br>";
    }
    
    public function getInfo() {
        return "Processador: {$this->modelo}";
    }
}

// Classe Parte 2
class PlacaMae {
    private $chipset;

    public function __construct(string $chipset) {
        $this->chipset = $chipset;
        echo "Placa-Mãe com chipset $chipset foi instalada.<br>";
    }

    public function __destruct() {
        echo "Placa-Mãe foi desinstalada.<br>";
    }

    public function getInfo() {
        return "Placa-Mãe: {$this->chipset}";
    }
}

// Classe Parte 3
class MemoriaRAM {
    private $tamanhoGB;

    public function __construct(int $tamanhoGB) {
        $this->tamanhoGB = $tamanhoGB;
        echo "Módulo de Memória RAM de {$tamanhoGB}GB foi instalado.<br>";
    }

    public function __destruct() {
        echo "Módulo de Memória RAM de {$this->tamanhoGB}GB foi removido.<br>";
    }
}

// Classe Todo - Computador
class Computador {
    private $processador; // Composição 1
    private $placaMae; // Composição 2
    private $memorias; // Composição 3 (Array de Partes)

    public function __construct(string $modeloProcessador, string $chipsetPlacaMae, int $numMemorias, int $tamanhoMemoria) {
        echo "<br>--- Montando um novo Computador ---<br>";
        
        // As partes são criadas internamente no construtor (Composição)
        $this->processador = new Processador($modeloProcessador);
        $this->placaMae = new PlacaMae($chipsetPlacaMae);

        // Criação de múltiplos componentes
        $this->memorias = [];
        for ($i = 0; $i < $numMemorias; $i++) {
            $this->memorias[] = new MemoriaRAM($tamanhoMemoria);
        }
        
        echo "Computador montado com sucesso.<br>";
    }
    
    public function ligar() {
        echo "Computador iniciando. Componentes: {$this->processador->getInfo()}, {$this->placaMae->getInfo()}.<br>";
        echo "Total de Módulos RAM: " . count($this->memorias) . ".<br>";
    }

    public function __destruct() {
        // Quando o objeto Computador é destruído, o garbage collector do PHP
        // garante que as partes (Processador, PlacaMae, e os itens do array $memorias)
        // que não têm mais referências externas sejam destruídas também,
        // acionando seus destrutores. Isso demonstra o Ciclo de Vida Compartilhado.
        echo "<br>--- Desmontando e destruindo o Computador ---<br>";
    }
}

// Exemplo de Uso
$pcGamer = new Computador("Core i7-12700K", "Z690", 4, 16);
$pcGamer->ligar();

// A dependência existencial é demonstrada aqui:
// Ao remover a última referência ao Computador, ele é destruído,
// e automaticamente todas as suas partes são destruídas junto.
unset($pcGamer); 
// Saída esperada: Mensagens de destruição do Computador, 
// seguidas pelas mensagens de destruição de cada componente (Processador, PlacaMae, 4x MemoriaRAM).
?>
