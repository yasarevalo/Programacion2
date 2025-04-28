<?php
class Vehiculo {
    public $marca;

    public function __construct($marca) {
        $this->marca = $marca;
    }

    public function avanzar() {
        echo "El vehículo avanza";
    }
}

class Moto extends Vehiculo {
    public $cilindrada;

    public function __construct($marca, $cilindrada) {
        parent::__construct($marca);
        $this->cilindrada = $cilindrada;
    }

    public function avanzar() {
        echo "La moto " . $this->marca ." de ".  $this->cilindrada . " avanza rápidamente.";
    }
}

$moto = new Moto("Guerrero", 150);
$moto->avanzar();
?>