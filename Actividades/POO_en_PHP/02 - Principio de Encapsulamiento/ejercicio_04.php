<?php
class Vehiculo {
    private $kilometros;

    public function __construct($kmIniciales) {
        $this->kilometros = $kmIniciales;
    }

    public function getKilometros() {
        return $this->kilometros;
    }

    public function avanzar($km) {
        if ($km > 0) {
            $this->kilometros += $km;
        }
    }
}

$auto = new Vehiculo(10000);
$auto->avanzar(150);
echo "Kilómetros recorridos: " . $auto->getKilometros()."<br";
$auto->avanzar(-10);
echo "Kilómetros recorridos: " . $auto->getKilometros();
?>
