<?php
class Animal {
    public $especie;

    public function __construct($especie) {
        $this->especie = $especie;
    }

    public function emitirSonido() {
        echo "Sonido";
    }
}

class Gato extends Animal {
    public function emitirSonido() {
        echo "¡Miau!";
    }
}

$gato = new Gato("Negro");
$gato->emitirSonido();
?>
