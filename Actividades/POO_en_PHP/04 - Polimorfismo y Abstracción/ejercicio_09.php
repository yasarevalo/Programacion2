<?php
interface Calculable {
    public function calcularPerimetro();
}
class Cuadrado implements Calculable {
    private $lado;

    public function __construct($lado) {
        $this->lado = $lado;
    }

    public function calcularPerimetro() {
        return 4 * $this->lado;}
}

class Circulo implements Calculable {
    private $radio;

    public function __construct($radio) {
        $this->radio = $radio;
    }

    public function calcularPerimetro() {
        return 2 * pi() * $this->radio; // perímetro círculo  2 * pi * radio
    }
}

$figuras = [new Cuadrado(5),new Circulo(7)];

foreach ($figuras as $figura) {
    echo "Perímetro: " . $figura->calcularPerimetro() . "\n";
}

?>