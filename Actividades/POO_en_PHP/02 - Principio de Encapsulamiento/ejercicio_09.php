<?php
class Circulo {
    private $radio;

    public function __construct($radio) {
        if ($radio > 0) {
            $this->radio = $radio;
        }
    }

    public function getRadio() {
        return $this->radio;
    }

    public function setRadio($nuevoRadio) {
        if ($nuevoRadio > 0) {
            $this->radio = $nuevoRadio;
        }
    }
}

$circulo = new Circulo(15);
$circulo->setRadio(-3); 
$circulo->setRadio(8);  
echo "Radio actual: " . $circulo->getRadio();
?>

