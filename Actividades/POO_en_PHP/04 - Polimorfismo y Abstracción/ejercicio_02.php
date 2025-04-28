<?php
abstract class Vehiculo {
    abstract public function desplazarse();
}

class Bicicleta extends Vehiculo {
    public function desplazarse() {
        echo "La bicicleta se mueve pedaleando.";
    }
}

class Avion extends Vehiculo {
    public function desplazarse() {
        echo "El avión vuela por el aire.";
    }
}

$vehiculos = [new Bicicleta(), new Avion()];
foreach ($vehiculos as $vehiculo) {
    $vehiculo->desplazarse();
}
?>