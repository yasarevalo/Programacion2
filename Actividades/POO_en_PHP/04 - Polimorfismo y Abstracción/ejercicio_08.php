<?php
abstract class Instrumento {
    abstract public function tocar();
}

class Violin extends Instrumento {
    public function tocar() {
        echo "El violín está sonando\n";
    }
}

class Bateria extends Instrumento {
    public function tocar() {
        echo "La batería está sonando\n";
    }
}

$instrumentos = [new Violin(),new Bateria()];

foreach ($instrumentos as $instrumento) {
    $instrumento->tocar();
}

?>