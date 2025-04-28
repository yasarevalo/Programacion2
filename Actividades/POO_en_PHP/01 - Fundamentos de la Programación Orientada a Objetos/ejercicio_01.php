<?php
class Libro{
	public $titulo;
	public $autor;

	public function presentar(){
		echo "Titulo:{$this->titulo}, Autor:{$this->autor}.";}}
$libro=new Libro();
$libro->titulo="Harry Potter";
$libro->autor="JK Rowling";
$libro->presentar();
?>

