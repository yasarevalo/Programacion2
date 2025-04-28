<?php

// Clase abstracta Trabajador
abstract class Trabajador {
    abstract public function calcularIngreso();
}

// Subclase Fijo
class Fijo extends Trabajador {
    private $sueldoMensual;

    public function __construct($sueldoMensual) {
        $this->sueldoMensual = $sueldoMensual;
    }

    public function calcularIngreso() {
        return $this->sueldoMensual;
    }
}

// Subclase Temporal
class Temporal extends Trabajador {
    private $horasTrabajadas;
    private $pagoPorHora;

    public function __construct($horasTrabajadas, $pagoPorHora) {
        $this->horasTrabajadas = $horasTrabajadas;
        $this->pagoPorHora = $pagoPorHora;
    }

    public function calcularIngreso() {
        return $this->horasTrabajadas * $this->pagoPorHora;
    }
}

// Crear un arreglo de trabajadores
$trabajadores = [
    new Fijo(3000),
    new Temporal(120, 25),
    new Fijo(4000),
    new Temporal(100, 30)
];

// Mostrar ingresos
foreach ($trabajadores as $trabajador) {
    echo "Ingreso: $" . $trabajador->calcularIngreso() . "\n";
}

?>
