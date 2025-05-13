<?php
require 'database.php';

$db = new Database();

$db->createUser('yas@email.com', 'activo');
echo "Usuario agregado.\n";

$usuario = $db->getUserById(1);
if ($usuario) {
    echo "Usuario : " . $usuario['email'] . " - Estado: " . $usuario['estado'] . "\n";
} else {
    echo "Usuario no encontrado.\n";
}

$db->updateUserEstado(1, 'inactivo');
echo "Estado actualizado.\n";


$usuario = $db->getUserById(1);
echo "Nuevo estado: " . $usuario['estado'] . "\n";
?>
