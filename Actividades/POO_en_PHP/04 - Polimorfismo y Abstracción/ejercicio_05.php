<?php
interface Reproducible {
    public function reproducir();
}

class Pelicula implements Reproducible {
    private $titulo;

    public function __construct($titulo) {
        $this->titulo = $titulo;
    }

    public function reproducir() {
        echo "Reproduciendo la película: " . $this->titulo . "\n";
    }
}

class Podcast implements Reproducible {
    private $nombre;

    public function __construct($nombre) {
        $this->nombre = $nombre;
    }

    public function reproducir() {
        echo "Reproduciendo el podcast: " . $this->nombre;
    }
}

$items = [new Pelicula("Harry Potter"),new Podcast("Bts")];

foreach ($items as $item) {
    $item->reproducir();
}

?>
