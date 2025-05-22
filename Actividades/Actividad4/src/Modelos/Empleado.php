<?php
namespace Modelos;
use Base\Persona; 

Class Empleado  extends Persona {
    public function trabajar(){
        return "El empleado esta trabajando";
    }
}
?>