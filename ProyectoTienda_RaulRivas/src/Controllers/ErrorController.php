<?php

namespace Src\Controllers;

use Lib\Pages;
use Controllers\PagoController; // Importa PagoController si es necesario

class ErrorController
{
    /**
     * Maneja errores 404 - Página no encontrada
     *
     * @param string $message Mensaje opcional para mostrar en el error
     */
    public static function error404(string $message = 'Página no encontrada'): void
    {
        echo "<h1>Error 404</h1>"; // Título del error
        echo "<p>$message</p>"; // Mensaje de error personalizado
    }
}
?>
