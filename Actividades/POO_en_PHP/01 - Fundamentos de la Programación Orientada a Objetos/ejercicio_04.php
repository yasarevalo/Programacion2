<?php
class Coche{
	public $marca;
	public $modelo;
	public $color;
	
	public function detalles(){
		echo "Marca Auto: {$this->marca}, modelo: {$this->modelo} y su color es: {$this->color}.";
}}
$coche=new Coche();
$coche->marca="Toyota";
$coche->modelo="Corolla";
$coche->color="Gris";
$coche->detalles();
?>
