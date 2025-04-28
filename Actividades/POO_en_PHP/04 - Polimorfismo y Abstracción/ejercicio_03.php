<?php
interface Printable {
    public function imprimir();
}

class Documento implements Printable {
    public function imprimir() {
        echo "Imprimiendo documento en papel.";
    }
}

class Foto implements Printable {
    public function imprimir() {
        echo "Imprimiendo foto en alta resolución.";
    }
}

$elementos = [new Documento(), new Foto()];
foreach ($elementos as $elemento) {
    $elemento->imprimir();
}
?>