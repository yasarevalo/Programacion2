<?php
class Producto {
    public $nombre;
    public $precio;

    public function __construct($nombre, $precio) {
        $this->nombre = $nombre;
        $this->precio = $precio;
    }

    public function detalle() {
        echo "$this->nombre cuesta $$this->precio";
    }
}

class ProductoOferta extends Producto {
    public $descuento;

    public function __construct($nombre, $precio, $descuento) {
        parent::__construct($nombre, $precio);
        $this->descuento = $descuento;
    }

    public function detalle() {
        $precioFinal = $this->precio - ($this->precio * $this->descuento / 100);
        echo "El producto $this->nombre tiene un descuento del $this->descuento% y cuesta $$precioFinal";
    }
}

$oferta = new ProductoOferta("Harina", 900, 25);
$oferta->detalle();
?>

