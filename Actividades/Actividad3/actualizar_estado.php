<?php
require 'conexion.php'; 
$nuevoEstado = 'activo'; 
$idUsuario = 1;  

try {
    $sql = "UPDATE usuarios SET estado = :estado WHERE id = :id";
    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ':estado' => $nuevoEstado,
        ':id'     => $idUsuario
    ]);

    echo "El estado a sido actualizado para el usuario con ID: $idUsuario";

} catch (PDOException $e) {
    error_log($e->getMessage());  
    echo "Error al actualizar el estado: " . $e->getMessage(); 
}
?>
