<?php
require __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

$host     = $_ENV['DB_HOST'];
$db       = $_ENV['DB_NAME'];
$port     = $_ENV['DB_PORT'];
$charset  = $_ENV['DB_CHARSET'];
$usuario  = $_ENV['DB_USER'];
$password = $_ENV['DB_PASS'];

$dsn = "mysql:host=$host;port=$port;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,    
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,         
    PDO::ATTR_EMULATE_PREPARES   => false,                    
];

try {
    $pdo = new PDO($dsn, $usuario, $password, $options);
} catch (PDOException $e) {
     error_log($e->getMessage());
    echo'Error al conectarse a la base de datos.';
}


?> 