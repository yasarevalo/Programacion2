<?php
$host = 'localhost';  
$db   = 'fliachipana';  
$port = 3306;  
$charset = 'utf8mb4';  
$dsn = "mysql:host=$host;port=$port;dbname=$db;charset=$charset";
$usuario = 'root';        
$password = 'Yasminarevalo2005';  
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