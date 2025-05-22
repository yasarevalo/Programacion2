<?php
namespace Controladores;

use Modelos\Usuario;

class ControladorUsuario {
    public function inicio() {
        return "Página de usuarios";
    }
     public function mostrarNombre(): string
    {
        $usuario = new Usuario();
        return "Nombre del usuario: " . $usuario->obtenerNombre();
    }
}
?>