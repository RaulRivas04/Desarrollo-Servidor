<?php

namespace Controllers;

class ErrorController
{
    public static function mostrarError404(): string
    {
        return "<p>La página solicitada no se encuentra disponible</p>";
    }
}

?>
