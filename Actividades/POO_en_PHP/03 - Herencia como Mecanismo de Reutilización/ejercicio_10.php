<?php
class Animal {
    public $nombre;

    public function __construct($nombre) {
        $this->nombre = $nombre;
    }

    public function moverse() {
        echo $this->nombre . " se está moviendo.";
    }
}

class Pez extends Animal {
    private $tipoAgua;

    public function __construct($nombre, $tipoAgua) {
        parent::__construct($nombre);
        $this->tipoAgua = $tipoAgua;
    }

    public function moverse() {
        echo $this->nombre . " nada en agua " . $this->tipoAgua . ".";
    }
}

$pez = new Pez("Juan", "dulce");
$pez->moverse();

?>