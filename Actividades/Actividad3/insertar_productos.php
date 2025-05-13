<?php
require 'conexion.php'; 

try {
    $sql = "INSERT INTO productos (nombre, precio) VALUES (:nombre, :precio)";
    $stmt = $pdo->prepare($sql);

    $productos = [
        ['nombre' => 'Leche', 'precio' => 2500.00],
        ['nombre' => 'Azucar', 'precio' => 2500.00],
        ['nombre' => 'Queso', 'precio' => 6200.00],
        ['nombre' => 'Harina', 'precio' => 4200.00],
    ];

    foreach ($productos as $producto) {
        $stmt->execute([
            ':nombre' => $producto['nombre'],
            ':precio' => $producto['precio']
        ]);
    }

    echo "Productos insertados correctamente.";
} catch (PDOException $e) {
    echo "Error al insertar productos: " . $e->getMessage();
}
