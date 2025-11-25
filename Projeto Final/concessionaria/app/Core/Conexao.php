<?php namespace Core;

use PDO;
use PDOException;
// [Utilização das aulas: Reusabilidade e Persistência de Dados - Uso de PDO e Tratamento de Exceções]

class Conexao {
    private static $instancia = null;
    private const DB_CONFIG = [
        'host' => 'localhost',
        'dbname' => 'concessionaria',
        'user' => 'root', // Altere conforme seu Laragon
        'pass' => '',     // Altere conforme seu Laragon
    ];
    
    // [Conceito POO: Atributo Estático - Garantir que $instancia seja a mesma em toda a aplicação]
    public static function conectar(): ?PDO {
        if (self::$instancia === null) {
            try {
                $dsn = 'mysql:host=' . self::DB_CONFIG['host'] . ';dbname=' . self::DB_CONFIG['dbname'] . ';charset=utf8';
                self::$instancia = new PDO($dsn, self::DB_CONFIG['user'], self::DB_CONFIG['pass'], [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Configura para lançar exceções em caso de erro [cite: 1617]
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, // Define o modo de busca padrão para objetos [cite: 1618, 1687]
                ]);
            } catch (PDOException $e) {
                // Em um ambiente real, você logaria o erro.
                die("Erro na conexão com o banco de dados: " . $e->getMessage());
            }
        }
        return self::$instancia;
    }
}