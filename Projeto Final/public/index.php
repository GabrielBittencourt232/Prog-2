<?php

// Configuração básica
error_reporting(E_ALL);
ini_set('display_errors', 1);

// [Reuso de Código: Autoload - Carrega as classes automaticamente com base no namespace]
spl_autoload_register(function($class) {
    // Converte namespace\Classe para path/to/Classe.php
    $file = str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
    $path = '../' . $file;
    if (file_exists($path)) {
        require_once $path;
    }
});

// --- Roteador Simples ---
$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$url = trim($url, '/'); // Remove barras no início/fim

// Define o Controller, Método e Parâmetros
$segments = explode('/', $url);
$controllerName = !empty($segments[0]) ? ucfirst($segments[0]) . 'Controller' : 'VeiculoController';
$methodName = $segments[1] ?? 'index';
$param = $segments[2] ?? null;

$controllerClass = "Controllers\\" . $controllerName;

if (class_exists($controllerClass)) {
    // [Princípio POO: Polimorfismo (Implícito) - Chamamos métodos na classe Controller (ou em suas filhas) uniformemente]
    $controller = new $controllerClass();
    
    if (method_exists($controller, $methodName)) {
        if ($param !== null) {
            $controller->$methodName($param);
        } else {
            $controller->$methodName();
        }
    } else {
        // Método não encontrado
        (new Controllers\Controller())->view('404');
    }
} else {
    // Controller não encontrado
    (new Controllers\Controller())->view('404');
}