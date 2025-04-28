<?php
class Producto {
    private $precio;

    public function __construct($precio) {
        if ($precio > 0) {
            $this->precio = $precio;
        }
    }

    public function getPrecio() {
        return $this->precio;
    }

    public function setPrecio($nuevoPrecio) {
        if ($nuevoPrecio > 0) {
            $this->precio = $nuevoPrecio;
    }
}

}
$producto = new Producto(2000);
echo "Precio inicial válido: " . $producto->getPrecio()  ; 
$producto->setPrecio(1500);
echo "Precio modificado válido: " . $producto->getPrecio()  ; 


$producto->setPrecio(-50);//El valor del producto no cambia, sigue siendo 1500
echo "Precio invalido el valor sigue siendo: " . $producto->getPrecio() ; 
?>