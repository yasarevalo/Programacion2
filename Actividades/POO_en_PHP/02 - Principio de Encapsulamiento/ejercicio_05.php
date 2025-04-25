<?php
class Estudiante {
    private $calificaciones = [];

    public function __construct($notasIniciales = []) {
        foreach ($notasIniciales as $nota) {
            $this->agregarCalificacion($nota);
        }
    }

    public function agregarCalificacion($nota) {
        if ($nota >= 0 && $nota <= 10) {
            $this->calificaciones[] = $nota;
        }
    }

    public function getPromedio() {
        if (count($this->calificaciones) === 0) return 0;
        return array_sum($this->calificaciones) / count($this->calificaciones);
    }
}

$alumno = new Estudiante([7, 8, 9]);
$alumno->agregarCalificacion(10);
$alumno->agregarCalificacion(8); 
echo "Promedio: " . $alumno->getPromedio();
?>
