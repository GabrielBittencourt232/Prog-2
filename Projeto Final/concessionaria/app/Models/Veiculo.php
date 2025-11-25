<?php namespace Models;

use Core\Conexao;
use Core\Repositorio;
use Core\LoggerTrait;
use Exception;
use PDO;             // <--- ADICIONE ESTA LINHA
use PDOException;    // <--- ADICIONE ESTA LINHA

// [Utilização das aulas: Herança, Interfaces e Traits]
class Veiculo implements Repositorio {
    use LoggerTrait;
    
   // [Conceito POO: Encapsulamento - Atributos 'private' para proteger o estado interno e garantir controle via Getters/Setters] [cite: 2280]
    private ?int $id = null;
    private string $marca;
    private string $modelo;
    private int $ano;
    private float $preco;
    private string $cor;
    private int $quilometragem;

   // [Conceito POO: Construtor - Inicializa o objeto Veiculo e garante um estado inicial válido] [cite: 2187, 2219]
    public function __construct(string $marca, string $modelo, int $ano, float $preco, string $cor, int $quilometragem, ?int $id = null) {
        $this->id = $id;
        $this->setMarca($marca);
        $this->setModelo($modelo);
        $this->setAno($ano);
        $this->setPreco($preco);
        $this->setCor($cor);
        $this->setQuilometragem($quilometragem);
        $this->registrarLog("Novo objeto Veiculo instanciado.");
    }
    
    // --- Getters (Acessores) ---
   // [Conceito POO: Getters - Permitem leitura controlada dos atributos privados] [cite: 2316]
    public function getId(): ?int { return $this->id; }
    public function getMarca(): string { return $this->marca; }
    public function getModelo(): string { return $this->modelo; }
    public function getAno(): int { return $this->ano; }
    public function getPreco(): float { return $this->preco; }
    public function getCor(): string { return $this->cor; }
    public function getQuilometragem(): int { return $this->quilometragem; }

    // --- Setters (Modificadores) com Validação ---
   // [Conceito POO: Setters - Permitem modificação dos atributos privados com validação] [cite: 2324, 2328]
    public function setMarca(string $marca): void { 
        if (empty($marca)) { throw new Exception("Marca não pode ser vazia."); } 
        $this->marca = $marca; 
    }
    public function setModelo(string $modelo): void { 
        if (empty($modelo)) { throw new Exception("Modelo não pode ser vazio."); } 
        $this->modelo = $modelo; 
    }
    public function setAno(int $ano): void { 
        if ($ano < 1900 || $ano > date('Y') + 1) { throw new Exception("Ano inválido."); } 
        $this->ano = $ano; 
    }
    public function setPreco(float $preco): void { 
        if ($preco <= 0) { throw new Exception("Preço deve ser positivo."); } 
        $this->preco = $preco; 
    }
    public function setCor(string $cor): void { 
        $this->cor = $cor; 
    }
    public function setQuilometragem(int $km): void { 
    if ($km < 0) { 
        throw new Exception("Quilometragem não pode ser negativa."); 
    } 
    $this->quilometragem = $km;
    }

    // --- Métodos da Interface Repositorio (Lógica de Persistência) ---

    // [Utilização das aulas: Reusabilidade e Persistência de Dados - Implementação do método salvar (CREATE/UPDATE) com Prepared Statements]
    public function salvar(object $obj): bool {
        $pdo = Conexao::conectar();
        
        // Verifica se é UPDATE ou INSERT
        if ($obj->getId() !== null) {
            $sql = "UPDATE veiculos SET marca = :marca, modelo = :modelo, ano = :ano, preco = :preco, cor = :cor, quilometragem = :km WHERE id = :id";
            $this->registrarLog("Atualizando veículo ID: {$obj->getId()}");
        } else {
            $sql = "INSERT INTO veiculos (marca, modelo, ano, preco, cor, quilometragem) VALUES (:marca, :modelo, :ano, :preco, :cor, :km)";
            $this->registrarLog("Criando novo veículo.");
        }

        try {
            $stmt = $pdo->prepare($sql);
           // [Utilização das aulas: Prepared Statements - Proteção contra SQL Injection] [cite: 1601, 1603, 1653]
            $stmt->bindValue(':marca', $obj->getMarca());
            $stmt->bindValue(':modelo', $obj->getModelo());
            $stmt->bindValue(':ano', $obj->getAno());
            $stmt->bindValue(':preco', $obj->getPreco());
            $stmt->bindValue(':cor', $obj->getCor());
            $stmt->bindValue(':km', $obj->getQuilometragem());
            
            if ($obj->getId() !== null) {
                $stmt->bindValue(':id', $obj->getId(), PDO::PARAM_INT);
            }
            
            return $stmt->execute();

        } catch (PDOException $e) {
            $this->registrarLog("Erro ao salvar: " . $e->getMessage(), 'ERROR');
            return false;
        }
    }

    // [Implementação do método atualizar (UPDATE)]
    // Mesmo que a lógica real esteja em salvar(), a assinatura deve existir para satisfazer a interface.
    public function atualizar(object $obj): bool {
    // Apenas garante que o objeto tenha um ID antes de tentar salvar
    if ($obj->getId() === null) {
        $this->registrarLog("Tentativa de atualizar objeto sem ID.", 'WARN');
        return false;
    }
    return $this->salvar($obj);
}

    // [Implementação do método listar (READ ALL)]
    public function listar(): array {
        try {
            $pdo = Conexao::conectar();
            $stmt = $pdo->query("SELECT * FROM veiculos ORDER BY marca, modelo ASC");
           // Retorna um array de objetos genéricos, mas poderia ser mapeado para objetos Veiculo se a classe não implementasse Repositorio. [cite: 1679]
            return $stmt->fetchAll(); 
        } catch (PDOException $e) {
            $this->registrarLog("Erro ao listar: " . $e->getMessage(), 'ERROR');
            return [];
        }
    }

    // [Implementação do método buscarPorId (READ ONE)]
    public function buscarPorId(int $id): ?object {
        try {
            $pdo = Conexao::conectar();
            $stmt = $pdo->prepare("SELECT * FROM veiculos WHERE id = :id");
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $veiculoData = $stmt->fetch();

            if ($veiculoData) {
                // Mapeia o resultado do banco de dados para um novo objeto Veiculo
                return new Veiculo(
                    $veiculoData->modelo,
                    $veiculoData->marca,
                    $veiculoData->ano,
                    $veiculoData->preco,
                    $veiculoData->cor,
                    $veiculoData->quilometragem,
                    $veiculoData->id
                );
            }
            return null;
        } catch (\PDOException $e) {
            $this->registrarLog("Erro ao buscar: " . $e->getMessage(), 'ERROR');
            return null;
        }
    }
    
    // [Implementação do método deletar (DELETE)]
    public function deletar(int $id): bool {
        try {
            $pdo = Conexao::conectar();
            $stmt = $pdo->prepare("DELETE FROM veiculos WHERE id = :id");
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (\PDOException $e) {
            $this->registrarLog("Erro ao deletar: " . $e->getMessage(), 'ERROR');
            return false;
        }
    }
}