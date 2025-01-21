<?php

namespace Controllers;

use Lib\Pages;
use Services\CategoriaService;
use Lib\Validator;
use Lib\ValidationException;
use Utils;
use Controllers\PagoController; // Asegúrate de importar PagoController si es necesario

class CategoriaController
{
    private Pages $pages; // Gestiona las vistas
    private CategoriaService $categoriaService; // Servicio para manejar las categorías

    public function __construct()
    {
        $this->pages = new Pages();
        $this->categoriaService = new CategoriaService();
    }

    /**
     * Crear una nueva categoría
     */
    public function create()
    {
        // Verifica si el usuario tiene permisos de administrador
        if (!Utils::isAdmin()) {
            header('Location: ' . BASE_URL);
            exit;
        }

        $data = $_POST['data'] ?? []; // Obtiene los datos del formulario

        // Reglas de validación para la categoría
        $rules = [
            'nombre' => '/^[a-zA-Z\s]+$/'
        ];

        try {
            // Valida los datos ingresados
            Validator::validate($data, $rules);
            $this->categoriaService->createCategoria($data['nombre']); // Crea la categoría
            $_SESSION['success_message'] = 'Categoría creada exitosamente.';
            header('Location: ' . BASE_URL . 'categoria/index'); // Redirige al listado de categorías
            exit;
        } catch (ValidationException $e) {
            // Maneja errores de validación
            $_SESSION['error_message'] = implode('<br>', $e->getErrors());
            header('Location: ' . BASE_URL . 'categoria/create');
            exit;
        }
    }

    /**
     * Mostrar productos de una categoría específica
     */
    public function productosPorCategoria(int $categoriaId)
    {
        try {
            $productos = $this->categoriaService->getProductosPorCategoria($categoriaId); // Obtiene los productos por categoría
            $this->pages->render('productos/categoria', ['productos' => $productos]); // Renderiza la vista de productos
        } catch (\Exception $e) {
            // Muestra un mensaje de error en caso de fallo
            $this->pages->render('error', ['mensaje' => $e->getMessage()]);
        }
    }

    /**
     * Listar todas las categorías
     */
    public function index()
    {
        $categorias = $this->categoriaService->getAllCategorias(); // Obtiene todas las categorías
        $this->pages->render('categoria/index', ['categorias' => $categorias]); // Renderiza la vista del listado
    }

    /**
     * Mostrar el formulario de creación de categorías
     */
    public function verFormulario()
    {
        $this->pages->render('categoria/create'); // Renderiza el formulario de creación
    }

    /**
     * Guardar una nueva categoría
     */
    public function guardarCategoria()
    {
        $this->create(); // Reutiliza el método create
    }

    /**
     * Mostrar el listado de categorías (alias de index)
     */
    public function verCategorias()
    {
        $this->index(); // Reutiliza el método index
    }
}
