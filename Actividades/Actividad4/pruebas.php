<?php
require 'autoload.php';
require 'src/Ayudantes/funciones.php';


use Modelos\Usuario;
use Modelos\Empleado;
use Controladores\ControladorUsuario;
use Proveedor\Herramientas\Ayudante as AyudaProveedor;
use Vistas\Vista;
use Utilidades\Matematica;
use Configuracion\ConfiguracionApp;
use function Ayudantes\saludar;


// Ejercicio1 - Usuario -> decirHola
$usuario = new Usuario();
echo $usuario->decirHola() . "\n";

// Ejercicio2 - Empleado hereda Persona
$empleado = new Empleado();
echo $empleado->saludar() . " - " . $empleado->trabajar() . "\n";

// Ejercicio3 - AyudarProveedor -> ayudar (metodo estatico)
echo AyudaProveedor::ayudar() . "\n";


// Ejercicio4 - Vista implementa Renderable
$vista = new Vista();
echo $vista->renderizar() . "\n";

//Ejercicio5 - Spl_autoload_register (carga de los namespace)


// Ejercicio6 - ControladorUsuario -> inicio
$controlador = new ControladorUsuario();
echo $controlador->inicio() . "\n";

// Ejercicio7 - Matematica::sumar 
echo Matematica::sumar(1600, 500) . "\n";

// Ejercicio8 - Contante ConfiguracionApp
echo ConfiguracionApp::NOMBRE_APP . "\n";

// Ejercicio9 - Funcion saludar desde funciones.php
echo saludar() . "\n";

// Ejercicio10 
$controlador = new ControladorUsuario();
echo $controlador->mostrarNombre() . "\n";
?>