<?php
require 'conexion.php';

$nombreBuscado = isset($_GET['nombre']) ? $_GET['nombre'] : '';

if ($nombreBuscado) {
    try {
        $sql = "SELECT * FROM productos WHERE nombre = :nombre";
        $stmt = $pdo->prepare($sql);

        $stmt->execute([':nombre' => $nombreBuscado]);

        $producto = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($producto) {
            echo "Producto encontrado: \n";
            echo "ID: " . $producto['id'] . "\n";
            echo "Nombre: " . $producto['nombre'] . "\n";
            echo "Precio: " . $producto['precio'] . "\n";
        } else {
            echo "Producto no encontrado.\n";
        }

    } catch (PDOException $e) {
        echo "Error al buscar producto: " . $e->getMessage() . "\n";
    }
} else {
    echo "Ingresar producto para buscar.\n";
}
?>
