<?php 

namespace Lib;

class Pages {
    
    // Método para cargar y renderizar páginas
    public function render(string $pageName, array $params = []): void {
        // Asignar las variables dinámicamente si existen parámetros
        if (!empty($params)) {
            foreach ($params as $name => $value) {
                $$name = $value;  // Crear variables dinámicas
            }
        }
        
        // Rutas de los archivos del layout y la página
        $headerPath = "Views/layout/header.php";
        $footerPath = "Views/layout/footer.php";
        $pagePath = "Views/$pageName.php";

        // Validar si el archivo de la vista existe
        if (!file_exists($pagePath)) {
            error_log("La vista '$pagePath' no existe.");
            die("Error: La vista '$pageName' no fue encontrada."); // Puedes usar die() para depurar
        }

        // Incluir los archivos
        require_once $headerPath;
        require_once $pagePath;
        require_once $footerPath;
    }
}
?>
