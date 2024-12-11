<?php

namespace Controllers;

class FrontController
{
    public static function ejecutar(): void
    {
        // Determinar el controlador a utilizar
        $controladorNombre = isset($_GET['controller']) 
            ? 'Controllers\\' . $_GET['controller'] . 'Controller' 
            : 'Controllers\\' . CONTROLLER_DEFAULT;

        // Verificar si el controlador existe
        if (class_exists($controladorNombre)) {
            $controlador = new $controladorNombre();

            // Verificar si la acción existe y llamarla
            if (isset($_GET['action']) && method_exists($controlador, $_GET['action'])) {
                $accion = $_GET['action'];
                $controlador->$accion();
            } 
            // Si no hay acción definida, llamar a la acción por defecto
            elseif (empty($_GET['controller']) && empty($_GET['action'])) {
                $accionPorDefecto = ACTION_DEFAULT;
                $controlador->$accionPorDefecto();
            } else {
                echo ErrorController::mostrarError404();
            }
        } else {
            echo ErrorController::mostrarError404();
        }
    }
}
