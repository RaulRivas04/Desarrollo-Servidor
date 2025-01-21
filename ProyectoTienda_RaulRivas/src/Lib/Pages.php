<?php

namespace Lib;

use src\Controllers\ErrorController;

class Pages
{
    /**
     * Renderiza una vista.
     *
     * @param string $pageName Nombre de la vista a cargar (sin extensión .php).
     * @param array|null $params Parámetros opcionales que serán pasados a la vista.
     */
    public function render(string $pageName, array $params = null): void
    {
        // Checkpoint de entrada
        error_log("Checkpoint: Entrando a Pages::render");
        error_log("Intentando cargar la vista: $pageName");

        // Si hay parámetros, los convierte en variables disponibles para la vista
        if ($params != null) {
            foreach ($params as $name => $value) {
                $$name = $value;
            }
        }

        // Ruta base para las vistas
        $basePath = dirname(__DIR__) . "/Views";
        $viewPath = $basePath . "/$pageName.php";

        // Verificar si la vista existe
        if (!file_exists($viewPath)) {
            error_log("Checkpoint: La vista no existe en $viewPath");

            // Instanciar ErrorController y mostrar error
            $errorController = new ErrorController();
            $errorController->error404("La vista '$pageName' no fue encontrada en '$viewPath'.");

            return;
        }

        error_log("Checkpoint: La vista $pageName existe. Cargando...");

        // Cargar el layout con header y footer
        require_once $basePath . "/layout/header.php";
        require_once $viewPath;
        require_once $basePath . "/layout/footer.php";
    }
}
