<?php

namespace Routes;

use Controllers\AuthController;
use Controllers\UserController;
use Controllers\AdminController;
use Controllers\CategoriaController;
use Controllers\ProductoController;
use Controllers\CarritoController;
use Controllers\PagoController;
use Lib\Router;
use Src\Controllers\ErrorController;
use DBTienda\Database;

class Routes {
    public static function index() {
        error_log("Checkpoint: Entrando a Routes::index");

        Router::add('GET', '/', function () {
            error_log("Checkpoint: Cargando la vista de inicio");
            $pages = new \Lib\Pages();
            $pages->render('inicio');
        });

        // Ruta para errores
        Router::add('GET', '/error/', function () {
            error_log("Checkpoint: Ruta de error ejecutada");
            return (new ErrorController())->error404();
        });

        /* AUTH */
        Router::add('GET', '/register', function () {
            error_log("Checkpoint: Ruta GET /register ejecutada");
            (new AuthController())->register();
        });

        Router::add('POST', 'register', function () {
            error_log("Checkpoint: Ruta POST /register ejecutada");
            (new AuthController())->register();
        });

        // login
        Router::add('GET', 'login', function () {
            error_log("Checkpoint: Ruta GET /login ejecutada");
            (new AuthController())->login();
        });

        Router::add('POST', 'login', function () {
            error_log("Checkpoint: Ruta POST /login ejecutada");
            (new AuthController())->processLogin();
        });

        // logout
        Router::add('GET', 'logout', function () {
            error_log("Checkpoint: Ruta GET /logout ejecutada");
            session_destroy();
            header('Location: ' . BASE_URL);
            exit;
        });

        // test-db
        Router::add('GET', 'test-db', function () {
            error_log("Checkpoint: Ruta GET /test-db ejecutada");
            try {
                $db = Database::getConnection();
                echo "Conexión exitosa a la base de datos.";
            } catch (\Exception $e) {
                error_log("Error: " . $e->getMessage());
                echo "Error al conectar a la base de datos: " . $e->getMessage();
            }
        });

        /* Admin Controller */

        Router::add('GET', 'admin/usuarios', function () {
            if (isset($_SESSION['user']) && $_SESSION['user']['role'] === 'admin') {
                (new AdminController())->listarUsuarios();
            } else {
                header('Location: ' . BASE_URL);
                exit;
            }
        });
        
        Router::add('GET', 'admin', function () {
            (new AdminController())->index();
        });
        
        Router::add('GET', 'admin/usuarios', function () {
            (new AdminController())->listarUsuarios();
        });
        
        Router::add('GET', 'admin/crearUsuario', function () {
            (new AdminController())->crearUsuario();
        });
        
        Router::add('POST', 'admin/crearUsuario', function () {
            (new AdminController())->crearUsuario();
        });
        
        Router::add('POST', 'admin/eliminarUsuario/:id', function ($id) {
            if (isset($_SESSION['user']) && $_SESSION['user']['role'] === 'admin') {
                (new AdminController())->eliminarUsuario($id);
            } else {
                header('Location: ' . BASE_URL);
                exit;
            }
        });
        
        /* USER CONTROLLER */
        
        Router::add('GET', 'usuario/registar', function () {
            error_log("Checkpoint: Ruta GET /usuario/registro ejecutada");
            (new UserController())->mostrarFormularioRegistro();
        });
        
        Router::add('POST', 'usuario/registrar', function () {
            error_log("Checkpoint: Ruta POST /usuario/registro ejecutada");
            (new UserController())->registrarUsuario();
        });
        
        // Rutas para categorías
        Router::add('POST', 'categoria/create', [new CategoriaController(), 'create']);
        Router::add('GET', 'categoria/index', [new CategoriaController(), 'index']);
        Router::add('GET', 'categoria/ver-formulario', function () {
            (new CategoriaController())->verFormulario();
        });
        
        // Rutas para productos
        Router::add('POST', 'producto/create', [new ProductoController(), 'create']);
        Router::add('GET', 'producto/index', [new ProductoController(), 'index']);
        Router::add('GET', 'producto/ver-formulario', function () {
            (new ProductoController())->verFormulario();
        });
        Router::add('POST', 'producto/guardar', function () {
            (new ProductoController())->guardarProducto();
        });
        Router::add('GET', 'producto/ver', function () {
            (new ProductoController())->verProductos();
        });
        Router::add('GET', 'producto/categoria/{id}', function ($id) {
            (new ProductoController())->verProductosPorCategoria($id);
        });
        
        // Rutas para el carrito
        Router::add('GET', 'carrito/verCarrito', function () {
            if (isset($_SESSION['user'])) {
                (new CarritoController())->verCarrito();
            } else {
                header('Location: ' . BASE_URL . 'login');
                exit;
            }
        });
        
        Router::add('POST', 'carrito/pagar', function () {
            if (isset($_SESSION['user'])) {
                (new CarritoController())->pagar();
            } else {
                header('Location: ' . BASE_URL . 'login');
                exit;
            }
        });
        
        Router::add('POST', 'carrito/agregar', function () {
            if (isset($_SESSION['user'])) {
                (new CarritoController())->agregarProducto();
            } else {
                header('Location: ' . BASE_URL . 'login');
                exit;
            }
        });
        
        Router::add('POST', 'carrito/confirmar-pago', function () {
            if (isset($_SESSION['user'])) {
                (new CarritoController())->confirmarPago();
            } else {
                header('Location: ' . BASE_URL . 'login');
                exit;
            }
        });

        Router::add('POST', '/carrito/eliminar', function () {
            (new CarritoController())->eliminar();
        });

        Router::add('GET', '/carrito/verCarrito', function () {
            (new CarritoController())->verCarrito();
        });

        // Ruta para procesar pago
        Router::add('POST', 'pagar', function () {
            (new PagoController())->procesarPago();
        });

        // Ruta para vaciar carrito
        Router::post('/carrito/vaciar', [CarritoController::class, 'vaciar']);

        Router::add('POST', '/carrito/vaciar', function () {
            (new CarritoController())->vaciar();
        });
        

        // Despachar la ruta solicitada
        error_log("Checkpoint: Despachando rutas");
        Router::dispatch();
    }
}
?>