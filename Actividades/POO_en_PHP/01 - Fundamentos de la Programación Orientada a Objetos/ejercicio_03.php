<?php
class estudiante{
public $nombre;
public $edad;
public $matricula;

public function mostrarDatos(){ 
    echo"nombre.{$this->nombre},edad:{$this->edad}, matricula:{$this->matricula}";
    }
}

$estudiante = new estudiante();
$estudiante -> nombre = "Juan";
$estudiante -> edad = 15;
$estudiante ->matricula = 1064;
$estudiante -> mostrarDatos();
?>