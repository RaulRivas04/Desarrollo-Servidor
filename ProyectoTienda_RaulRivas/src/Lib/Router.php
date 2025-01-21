<?php
namespace Lib;

class Router {

    private static $routes = [];

    // Método para añadir rutas con su controlador correspondiente
    public static function add(string $method, string $action, Callable $controller): void {
        $action = trim($action, '/'); // Elimina barras iniciales y finales de la acción
        self::$routes[$method][$action] = $controller;
    }

    public static function post($path, $callback)
    {
        self::$routes['POST'][$path] = $callback;
    }

    // Método para despachar la ruta solicitada
    public static function dispatch(): void {
        $method = $_SERVER['REQUEST_METHOD']; // Obtener el método de la solicitud (GET, POST, etc.)
        $action = preg_replace('/ProyectoTienda_RaulRivas/', '', $_SERVER['REQUEST_URI']); // Remover el prefijo "ProyectoTienda_RaulRivas" de la URL
        $action = trim($action, '/'); // Eliminar barras iniciales y finales

        $param = null; // Parámetro opcional en la URL
        preg_match('/[0-9]+$/', $action, $match); // Buscar números al final de la URL

        if (!empty($match)) {
            $param = $match[0]; // Guardar el parámetro encontrado
            $action = preg_replace('/' . $match[0] . '/', ':id', $action); // Reemplazar el número por ':id'
        }

        $fn = self::$routes[$method][$action] ?? null; // Obtener la función asociada a la ruta

        if ($fn) {
            echo call_user_func($fn, $param); // Llamar a la función de la ruta
        } else {
            // Manejar ruta no encontrada
            http_response_code(404);
            echo "Error 404: Ruta no encontrada.";
        }
    }
}