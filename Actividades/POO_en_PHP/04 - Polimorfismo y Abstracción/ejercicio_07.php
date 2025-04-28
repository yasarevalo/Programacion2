<?php

// Definimos la interfaz Comunicable
interface Comunicable {
    public function enviarMensaje();
}

// Clase Correo que implementa Comunicable
class Correo implements Comunicable {
    private $email;

    public function __construct($email) {
        $this->email = $email;
    }

    public function enviarMensaje() {
        echo "Enviando correo a: " . $this->email . "\n";
    }
}

// Clase Texto que implementa Comunicable
class Texto implements Comunicable {
    private $numeroTelefono;

    public function __construct($numeroTelefono) {
        $this->numeroTelefono = $numeroTelefono;
    }

    public function enviarMensaje() {
        echo "Enviando mensaje de texto al número: " . $this->numeroTelefono . "\n";
    }
}

// Crear un arreglo de Comunicables
$mensajes = [
    new Correo("ejemplo@correo.com"),
    new Texto("123456789"),
    new Correo("otro@correo.com"),
    new Texto("987654321")
];

// Recorrer el arreglo y ejecutar enviarMensaje
foreach ($mensajes as $mensaje) {
    $mensaje->enviarMensaje();
}

?>
