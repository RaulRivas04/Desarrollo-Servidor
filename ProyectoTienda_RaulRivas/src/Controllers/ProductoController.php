<?php

namespace Controllers;

use Lib\Pages;
use Services\ProductoService;
use Lib\Validator;
use Lib\ValidationException;
use Utils;
use Controllers\PagoController;

class ProductoController
{
    private Pages $pages; // Gestiona las vistas
    private ProductoService $productoService; // Servicio para manejar productos

    public function __construct()
    {
        $this->pages = new Pages();
        $this->productoService = new ProductoService();
    }

    /**
     * Crear un nuevo producto
     */
    public function create()
    {
        // Verifica si el usuario es administrador
        if (!Utils::isAdmin()) {
            header('Location: ' . BASE_URL); // Redirige al inicio si no tiene permisos
            exit;
        }

        $data = $_POST['data'] ?? []; // Obtiene los datos del formulario

        // Reglas de validación para el producto
        $rules = [
            'nombre' => '/^[a-zA-Z\s]+$/', // Solo letras y espacios
            'precio' => '/^\d+(\.\d{1,2})?$/' // Número decimal con hasta dos decimales
        ];

        try {
            // Valida los datos
            Validator::validate($data, $rules);

            // Crea el producto con el nombre y precio proporcionados
            $this->productoService->createProducto($data['nombre'], (float)$data['precio']);
            $_SESSION['success_message'] = 'Producto creado exitosamente.';
            header('Location: ' . BASE_URL . 'producto/index'); // Redirige al listado de productos
            exit;
        } catch (ValidationException $e) {
            // Maneja errores de validación
            $_SESSION['error_message'] = implode('<br>', $e->getErrors());
            header('Location: ' . BASE_URL . 'producto/create'); // Redirige al formulario de creación
            exit;
        }
    }

    /**
     * Mostrar el listado de productos
     */
    public function index()
    {
        $productos = $this->productoService->getAllProductos(); // Obtiene todos los productos
        $this->pages->render('producto/index', ['productos' => $productos]); // Renderiza la vista del listado
    }

    /**
     * Mostrar el formulario para crear un producto
     */
    public function verFormulario()
    {
        $this->pages->render('producto/create'); // Renderiza el formulario de creación
    }

    /**
     * Guardar un producto (reutiliza el método create)
     */
    public function guardarProducto()
    {
        $this->create(); // Reutiliza el método create
    }

    /**
     * Mostrar el listado de productos (alias de index)
     */
    public function verProductos()
    {
        $this->index(); // Reutiliza el método index
    }
}
