<?php
// filepath: /c:/xampp/htdocs/ProyectoTienda_RaulRivas/src/Controllers/CarritoController.php
namespace Controllers;

use Lib\Pages;
use Services\CarritoService;
use Utils;

class CarritoController
{
    private Pages $pages; // Gestiona las vistas
    private CarritoService $carritoService; // Servicio para manejar el carrito

    public function __construct()
    {
        $this->pages = new Pages();
        $this->carritoService = new CarritoService();
    }

    /**
     * Ver el carrito del usuario
     */
    public function verCarrito()
    {
        // Redirige al login si el usuario no ha iniciado sesión
        if (!Utils::isLoggedIn()) {
            header('Location: ' . BASE_URL . 'login');
            exit;
        }

        $userId = $_SESSION['user']['id'];
        $productos = $this->carritoService->obtenerProductosEnCarrito($userId);

        // Renderiza la vista del carrito con los productos del usuario
        $this->pages->render('carrito/verCarrito', ['productos' => $productos]);
    }

    /**
     * Confirmar el pago de los productos en el carrito
     */
    public function confirmarPago()
    {
        // Redirige al login si el usuario no ha iniciado sesión
        if (!Utils::isLoggedIn()) {
            header('Location: ' . BASE_URL . 'login');
            exit;
        }

        $metodoPago = $_POST['metodo_pago'];
        $userId = $_SESSION['user']['id'];
        $productos = $this->carritoService->obtenerProductosEnCarrito($userId);

        // Renderiza la vista de confirmación de pago
        $this->pages->render('carrito/confirmarPago', ['productos' => $productos, 'metodoPago' => $metodoPago]);
    }

    /**
     * Procesar el pago del carrito
     */
    public function pagar()
    {
        // Redirige al login si el usuario no ha iniciado sesión
        if (!Utils::isLoggedIn()) {
            header('Location: ' . BASE_URL . 'login');
            exit;
        }

        $userId = $_SESSION['user']['id'];
        $metodoPago = $_POST['metodo_pago'];
        $productos = $this->carritoService->obtenerProductosEnCarrito($userId);

        // Intenta crear un pedido y vaciar el carrito si tiene éxito
        if ($this->carritoService->crearPedido($userId, $metodoPago, $productos)) {
            $this->carritoService->vaciarCarrito($userId);
            $_SESSION['success_message'] = 'Compra realizada exitosamente.';
        } else {
            $_SESSION['error_message'] = 'Hubo un problema al procesar su compra. Por favor, inténtelo de nuevo.';
        }

        header('Location: ' . BASE_URL . 'carrito/verCarrito');
        exit;
    }

    /**
     * Agregar un producto al carrito
     */
    public function agregarProducto()
    {
        // Redirige al login si el usuario no ha iniciado sesión
        if (!Utils::isLoggedIn()) {
            header('Location: ' . BASE_URL . 'login');
            exit;
        }

        $userId = $_SESSION['user']['id'];
        $productoId = $_POST['producto_id'];
        $cantidad = $_POST['cantidad'];

        // Añade el producto al carrito del usuario
        $this->carritoService->agregarProductoAlCarrito($userId, $productoId, $cantidad);

        $_SESSION['success_message'] = 'Producto añadido al carrito.';
        header('Location: ' . BASE_URL . 'producto/index');
        exit;
    }

    /**
     * Eliminar un producto del carrito
     */
    public function eliminar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $producto_id = $_POST['producto_id'];
            $carrito = new Carrito(); // Instancia del carrito
            $carrito->eliminarProducto($producto_id); // Elimina el producto del carrito
            header('Location: ' . BASE_URL . 'carrito');
            exit();
        }
    }

    /**
     * Vaciar el carrito
     */
    public function vaciar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userId = $_SESSION['user']['id'];
            $this->carritoService->vaciarCarrito($userId); // Vacía el carrito del usuario
            echo json_encode(['success' => true]); // Respuesta en formato JSON
            exit();
        }
    }
}
