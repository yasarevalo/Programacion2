<?php
require 'conexion.php';
$cuentaOrigen = 1;
$cuentaDestino = 111; // ID que no existe
$monto = 1000.00;

try {
    $pdo->beginTransaction();


    $stmt1 = $pdo->prepare("UPDATE cuentas SET saldo = saldo - :monto WHERE id = :origen");
    $stmt1->execute([
        ':monto' => $monto,
        ':origen' => $cuentaOrigen
    ]);

    if ($stmt1->rowCount() === 0) {
        throw new Exception("La cuenta de origen no existe o no se pudo actualizar.");
    }

    $stmt2 = $pdo->prepare("UPDATE cuentas SET saldo = saldo + :monto WHERE id = :destino");
    $stmt2->execute([
        ':monto' => $monto,
        ':destino' => $cuentaDestino
    ]);


    if ($stmt2->rowCount() === 0) {
        throw new Exception("La cuenta de destino no existe o no se pudo actualizar.");
    }

    $pdo->commit();
    echo "Transferencia completa.";

} catch (Exception $e) {
    $pdo->rollBack();
    echo "Error en la transferencia: " . $e->getMessage();
}
?>
