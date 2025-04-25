<?php
class Circulo {
public $radio;

    public function calcularPerimetro() {
 	  return 2 * pi() * $this->radio;
}
}
$circulo = new Circulo();
$circulo->radio = 4;
echo "Perimetro: " . $circulo->calcularPerimetro();  //Resultado: Perimetro: 24,14

?>