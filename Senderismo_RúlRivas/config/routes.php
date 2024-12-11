<?php
// Ejemplo básico de rutas amigables
require_once 'controllers/RutasController.php';

if (isset($_GET['url'])) {
    $url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
    $controller = ucfirst($url[0]) . 'Controller';
    $method = $url[1] ?? 'index';

    if (class_exists($controller) && method_exists($controller, $method)) {
        $obj = new $controller();
        call_user_func_array([$obj, $method], array_slice($url, 2));
    } else {
        echo "Página no encontrada.";
    }
} else {
    $controller = new RutasController();
    $controller->index();
}
?>