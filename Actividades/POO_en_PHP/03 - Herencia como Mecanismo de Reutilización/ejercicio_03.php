<?php
class Persona {
    public $nombre;
    public $edad;

    public function __construct($nombre, $edad) {
        $this->nombre = $nombre;
        $this->edad = $edad;
    }

    public function saludar() {
        echo "Hola, soy $this->nombre y tengo $this->edad años.";
    }
}

class Profesor extends Persona {
    public $materia;

    public function __construct($nombre, $edad, $materia) {
        parent::__construct($nombre, $edad);
        $this->materia = $materia;
    }

    public function saludar() {
        echo "Hola, soy el profesor $this->nombre, tengo $this->edad y enseño $this->materia.";
    }
}

$profesor = new Profesor("Sebastian", 51, "Programación II");
$profesor->saludar();
?>

