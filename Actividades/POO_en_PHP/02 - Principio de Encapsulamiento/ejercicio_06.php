<?php
class Rectangulo {
    private $largo;
    private $ancho;

    public function __construct($largo, $ancho) {
        $this->setDimensiones($largo, $ancho);
    }

    public function setDimensiones($largo, $ancho) {
        if ($largo > 0 && $ancho > 0) {
            $this->largo = $largo;
            $this->ancho = $ancho;
        }
    }

    public function getLargo() {
        return $this->largo;
    }

    public function getAncho() {
        return $this->ancho;
    }
}

$rect = new Rectangulo(8, 4);
$rect->setDimensiones(8, -3); 
echo "EL largo: " . $rect->getLargo() . ", el ancho: " . $rect->getAncho();
?>