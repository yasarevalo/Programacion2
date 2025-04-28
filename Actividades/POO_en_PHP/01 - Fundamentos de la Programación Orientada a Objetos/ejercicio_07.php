<?php
class Producto {
    public $nombre;
    public $precio;
    public $stock;

    public function valorInventario() {
        return $this->precio * $this->stock;
    }
}

$producto = new Producto();
$producto->nombre = "Sal";
$producto->precio = 2000;
$producto->stock = 25;

echo"Producto: ". $producto->nombre . " Inventario: $" . $producto->valorInventario();
?>
