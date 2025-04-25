<?php
class Persona{
	public $nombre;
	public $edad;
	
	public function esAdulto(){
		if($this->edad >=18){
			return "True";
		}else{
			return "False";
}}}
$persona=new Persona();
$persona->nombre="Juan";
$persona->edad=18;
echo "{$persona->nombre} tiene {$persona->edad} años : ".$persona->esAdulto();

?>
