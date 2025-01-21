<?php
session_start();

require_once "../vendor/autoload.php";
require_once '../Config/config.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
//$Dotenv-->safeLoad();

// Ensure the Router class is included or autoloaded
require_once __DIR__ . '/Lib/Router.php';

// Ensure the Routes class is included or autoloaded
require_once __DIR__ . '/Routes/Routes.php';

// Ensure the UserController class is included or autoloaded
require_once __DIR__ . '/Controllers/UserController.php';

// Ensure the ErrorController class is included or autoloaded
require_once __DIR__ . '/Controllers/ErrorController.php';

// Ensure the Pages class is included or autoloaded
require_once __DIR__ . '/Lib/Pages.php';

// Add the correct use statements
use Routes\Routes;

// Initialize the Routes
Routes::index();