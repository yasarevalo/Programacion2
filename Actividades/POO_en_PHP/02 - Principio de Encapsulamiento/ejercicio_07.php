<?php
class Libro {
    private $numeroPaginas;

    public function __construct($paginas) {
        if ($paginas > 0) {
            $this->numeroPaginas = $paginas;
        }
    }

    public function getPaginas() {
        return $this->numeroPaginas;
    }

    public function setPaginas($nuevasPaginas) {
        if ($nuevasPaginas > 0) {
            $this->numeroPaginas = $nuevasPaginas;
        }
    }
}

$libro = new Libro(300);
$libro->setPaginas(0); 
$libro->setPaginas(350); 
echo "Número de páginas: " . $libro->getPaginas();
?>