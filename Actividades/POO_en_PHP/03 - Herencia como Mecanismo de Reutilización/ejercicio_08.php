<?php

class Vehiculo {
    public $velocidad;

    public function __construct($velocidadInicial = 0) {
        $this->velocidad = $velocidadInicial;
    }

    public function acelerar() {
        $this->velocidad += 10;
    }

    public function getVelocidad() {
        return $this->velocidad;
    }
}


class Camion extends Vehiculo {
    public function acelerar() {
        $this->velocidad += 10; 
    }
}


$camion = new Camion(50);
$camion->acelerar();
echo "La velocidad del camion es: " . $camion->getVelocidad() . " km/h";

?>
