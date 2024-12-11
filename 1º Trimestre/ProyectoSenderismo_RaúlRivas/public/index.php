<?php
require_once '../vendor/autoload.php';
require_once '../config/db.php';

use App\Router;

$router = new Router();
$router->run();
?>
