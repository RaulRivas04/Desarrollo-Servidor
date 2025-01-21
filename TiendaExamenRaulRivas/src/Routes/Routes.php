<?php
namespace Routes;

use Controllers\ErrorController;
use Controllers\UserController;
use Lib\Router;

class Routes {
    public static function index(){
        Router::add('GET', '/', function () {
            $pages = new \Lib\Pages();
            $pages->render('inicio');
        });

        //USUARIOS
        Router::add('GET', '/registro', function() {
            (new UserController())->register();
        });

        Router::add('POST', '/registro', function() {
            (new UserController())->register();
        });

        Router::add('GET', '/login', function() {
            (new UserController())->login();
        });

        Router::add('POST', '/login', function() {
            (new UserController())->login();
        });

        Router::add('GET', '/messages', function() {
            (new UserController())->listMessages();
        });

        Router::dispatch();
    }
}