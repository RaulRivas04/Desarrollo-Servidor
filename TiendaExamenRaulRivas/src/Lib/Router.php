<?php
namespace Lib;

class Router
{
    private static $routes = [];

    public static function add(string $method, string $action, callable $controller): void
    {
        $action = trim($action, '/'); // Elimina barras iniciales y finales de la acción
        self::$routes[$method][$action] = $controller;
    }

    public static function dispatch(): void
    {
        $method = $_SERVER['REQUEST_METHOD']; // Obtener el método de la solicitud (GET, POST, etc.)
        $action = preg_replace('/TiendaExamenRaulRivas/', '', $_SERVER['REQUEST_URI']); // Remover el prefijo "TiendaExamenRaulRivas" de la URL
        $action = trim($action, '/'); // Eliminar barras iniciales y finales

        $param = null; // Parámetro opcional en la URL
        preg_match('/[0-9]+$/', $action, $match); // Buscar números al final de la URL

        if (!empty($match)) {
            $param = $match[0]; // Guardar el parámetro encontrado
            $action = preg_replace('/' . $match[0] . '/', ':id', $action); // Reemplazar el número por ':id'
        }

        if (isset(self::$routes[$method][$action])) {
            call_user_func(self::$routes[$method][$action], $param);
        } else {
            \Controllers\ErrorController::error404();
        }
    }
}