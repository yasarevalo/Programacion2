<?php
spl_autoload_register(function ($clase) {
    $archivo = __DIR__ . '/src/' . str_replace('\\', '/', $clase) . '.php';
    if (file_exists($archivo)) {
        require $archivo;
    }
});
?>