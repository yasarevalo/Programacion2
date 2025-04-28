<?php
class Cuenta{
	public $saldo=0;

	public function ingresar($monto){
		$this->saldo += $monto;
			}
	public function retirar($monto){
		$this->saldo -=$monto;
}}

$cuenta = new Cuenta();
$cuenta->ingresar(1000);
$cuenta->retirar(500);
echo "Saldo final: $".$cuenta->saldo;
?>
