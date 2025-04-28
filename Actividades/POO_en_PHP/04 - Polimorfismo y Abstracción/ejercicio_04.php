<?php
abstract class Figura {
    abstract public function area();
}

class Triangulo extends Figura {
    private $base;
    private $altura;

    public function __construct($base, $altura) {
        $this->base = $base;
        $this->altura = $altura;
    }
    public function area() {
        return ($this->base * $this->altura) / 2;
    }
}

class Circulo extends Figura {
    private $radio;

    public function __construct($radio) {
        $this->radio = $radio;
    }

    public function area() {
        return pi() * pow($this->radio, 2);
    }
}

$figuras = [new Triangulo(15, 5),new Circulo(10)];
foreach ($figuras as $figura) {
    echo "Área: " . $figura->area();
}
?>
	



