<?php
class estudiante{
public $nombre;
public $edad;
public $matricula;

public function mostrarDatos(){
echo"nombre.{$this->nombre},edad:{$this->edad}, matricula:{$this->matricula};}}
$estudiante= new estudiante();
$estudiante ->nombre="juan";
$estudiante ->edad = 17;
$estudiante ->matricula = 1780;
$estudiante -> mostrarDatos;
?> 