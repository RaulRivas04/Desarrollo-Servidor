<?php

// Configuración de la base de datos
$servidor = 'localhost';
$bd = 'senderismo';
$usuario = 'root';
$contrasena = '';

// Definir parámetros por defecto
$controladorPredeterminado = 'RutaController';
$accionPredeterminada = 'inicio';

// URL base del proyecto
$urlBase = 'http://localhost/senderismo/';

// Definir constantes globales
define('SERVERNAME', $servidor);
define('DATABASE', $bd);
define('USERNAME', $usuario);
define('PASSWORD', $contrasena);

define('CONTROLLER_DEFAULT', $controladorPredeterminado);
define('ACTION_DEFAULT', $accionPredeterminada);

define('BASE_URL', $urlBase);

?>
