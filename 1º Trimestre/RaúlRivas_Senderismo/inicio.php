<?php 
        // Llamar al archivo con las configuraciones
        require_once "config/db.php";
        // Llamar al autoloader del composer para cargar las clases
        require_once "vendor/autoload.php";
        
        // Cargar la página de inicio al abrir
        use Controllers\FrontController;
                
        // Llamar al método corregido 'ejecutar'
        FrontController::ejecutar();
?>
