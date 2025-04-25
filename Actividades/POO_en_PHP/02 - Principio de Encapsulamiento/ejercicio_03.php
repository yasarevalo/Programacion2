<?php
class Producto {
    private $precio;

    public function __construct($precio) {
        if ($precio > 0) {
            $this->precio = $precio;
        } else {
            echo "Precio inválido en el constructor.\n";
        }
    }

    public function getPrecio() {
        return $this->precio;
    }

    public function setPrecio($nuevoPrecio) {
        if ($nuevoPrecio > 0) {
            $this->precio = $nuevoPrecio;
        } else {
            echo "Precio inválido en setPrecio.\n";
        }
    }
}

// Prueba con valor válido
$producto1 = new Producto(1000);
echo "Precio inicial válido: " . $producto1->getPrecio() . "\n"; // 1000
$producto1->setPrecio(500);
echo "Precio modificado válido: " . $producto1->getPrecio() . "\n"; // 500

// Prueba con valor inválido
$producto2 = new Producto(-200); // Muestra error
$producto2->setPrecio(-50); // Muestra error
echo "Precio después de intento inválido: " . $producto2->getPrecio() . "\n"; // No muestra nada o NULL
?>
//corregir