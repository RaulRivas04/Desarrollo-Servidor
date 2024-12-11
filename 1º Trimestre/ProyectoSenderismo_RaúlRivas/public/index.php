<?php
session_start();

$request = $_SERVER['REQUEST_URI'];
$partes = explode('/', trim($request, '/'));

$controlador = $partes[0] ?? 'ruta';
$accion = $partes[1] ?? 'listarRutas';
$parametros = array_slice($partes, 2);

require_once "controllers/{$controlador}Controller.php";
$claseControlador = ucfirst($controlador) . 'Controller';
$instancia = new $claseControlador();

call_user_func_array([$instancia, $accion], $parametros);
