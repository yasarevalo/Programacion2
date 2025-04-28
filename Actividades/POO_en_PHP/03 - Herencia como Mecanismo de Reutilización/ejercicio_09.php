<?php

// Clase base Empleado
class Empleado {
    protected $nombre;
    protected $salario;

    public function __construct($nombre, $salario) {
        $this->nombre = $nombre;
        $this->salario = $salario;
    }

    public function calcularPago() {
        return $this->salario;
    }
}

// Subclase Freelancer
class Freelancer extends Empleado {
    private $horas;

    public function __construct($nombre, $salarioPorHora, $horasTrabajadas) {
        parent::__construct($nombre, $salarioPorHora);
        $this->horas = $horasTrabajadas;
    }

    // Sobrescribir calcularPago
    public function calcularPago() {
        return $this->salario * $this->horas;
    }
}

// Prueba
$freelancer = new Freelancer("María", 500, 20); // $500 por hora, 20 horas
echo "El pago de " . $freelancer->nombre . " es: $" . $freelancer->calcularPago();

?>