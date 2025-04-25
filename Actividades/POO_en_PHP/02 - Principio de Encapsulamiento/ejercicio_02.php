<?php
class Usuario {
    private $edad;

    public function __construct($edad) {
        if ($edad > 0) {
            $this->edad = $edad;
        }
    }

    public function getEdad() {
        return $this->edad;
    }

    public function setEdad($nuevaEdad) {
        if ($nuevaEdad > 0) {
            $this->edad = $nuevaEdad;
        }
    }
}

$usuario = new Usuario(18);
$usuario->setEdad(26);
echo "La edad del usuario es: " . $usuario->getEdad();
?>
