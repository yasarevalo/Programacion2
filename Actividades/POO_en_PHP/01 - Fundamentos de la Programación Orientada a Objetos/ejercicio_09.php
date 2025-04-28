<?php
class Trabajador {
public $nombre;
public $cargo;
public $salario;

    public function informacion() {
   		echo "Nombre del trabajador: {$this->nombre}, cargo:{$this->cargo} y su salario es de $ {$this->salario}.";
	}
}
$trabajador = new Trabajador();
$trabajador->nombre = "Juan";
$trabajador->cargo = "Repartidor";
$trabajador->salario = 150000;
$trabajador->informacion();  //Resultado: Nombre del trabajador: Juan, cargo: Repartidor y su salario es de $150000.
?>