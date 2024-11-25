<?php
require_once 'core/Router.php';

// Activa la sesión para gestionar datos entre solicitudes
session_start();

// Instancia del enrutador y gestiona la solicitud actual
$rutaActual = new Router();
$rutaActual->run();



