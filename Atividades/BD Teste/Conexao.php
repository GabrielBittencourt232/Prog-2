<?php

class Conexao {
private static $pdo = null;
public static function conectar() {
if (!self::$pdo) {
self::$pdo = new PDO(
'mysql:host=localhost;
dbname=escola',
'root', '1234'
);
}
return self::$pdo;
}
}
?>
