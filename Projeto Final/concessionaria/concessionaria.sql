-- Passo 1: Criar o banco de dados
CREATE DATABASE IF NOT EXISTS concessionaria
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;
USE concessionaria;

-- Passo 2: Criar a tabela de Veículos
CREATE TABLE veiculos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    marca VARCHAR(50) NOT NULL,
    modelo VARCHAR(50) NOT NULL,
    ano INT NOT NULL,
    preco DECIMAL(10, 2) NOT NULL,
    cor VARCHAR(30),
    data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
-- [Utilizaçãconcessionariao das aulas: Reusabilidade e Persistência de Dados - Criação do BD e Tabela]