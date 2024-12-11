<?php

namespace Controllers;

use Lib\Pages;
use Models\Ruta;
use Services\RutaService;
use Services\RutaComentarioService;
use Zebra_Pagination;

class RutaController {

    private Pages $pages;
    private RutaService $rutaService;
    private RutaComentarioService $rutaComentarioService;

    // Constructor de la clase
    public function __construct() {
        $this->pages = new Pages();
        $this->rutaService = new RutaService();
        $this->rutaComentarioService = new RutaComentarioService();
    }

    // Muestra el formulario para crear una nueva ruta
    public function formularioRuta() {
        $this->pages->render('Ruta/formularioRuta');
    }

    // Crea una nueva ruta
    public function añadirRuta() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $ruta = new Ruta(
                null,
                $_POST['titulo'],
                $_POST['descripcion'],
                $_POST['desnivel'],
                $_POST['distancia'] ?? 0,
                $_POST['notas'] ?? '',
                $_POST['dificultad'] ?? ''
            );

            // Sanitizar y validar los datos
            $ruta->sanitizarDatos();
            $errores = $ruta->validarDatosRegistro();

            if (empty($errores)) {
                $resultado = $this->rutaService->guardarRuta([
                    'titulo' => $ruta->getTitulo(),
                    'descripcion' => $ruta->getDescripcion(),
                    'desnivel' => $ruta->getDesnivel(),
                    'distancia' => $ruta->getDistancia() ?: 0,
                    'notas' => $ruta->getNotas() ?: '',
                    'dificultad' => $ruta->getDificultad() ?: ''
                ]);

                if ($resultado === true) {
                    header("Location: " . BASE_URL);
                    exit;
                } else {
                    $errores['db'] = "Error al crear la ruta: " . $resultado;
                    $this->pages->render('Ruta/formularioRuta', ["errores" => $errores]);
                }
            } else {
                $this->pages->render('Ruta/formularioRuta', ["errores" => $errores]);
            }
        }
    }

    // Muestra la página de inicio con rutas y su paginación
    public function index() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $paginacion = new Zebra_Pagination();
        $rutas = $this->rutaService->obtenerRutas();
        $numeroRutas = count($rutas);

        // Configurar el número de elementos por página
        $elementosPorPagina = 3;

        // Paginación
        $paginacion->records($numeroRutas);
        $paginacion->records_per_page($elementosPorPagina);

        // Obtener las rutas con la paginación aplicada
        $rutasPaginadas = array_slice(
            $rutas,
            (($paginacion->get_page() - 1) * $elementosPorPagina),
            $elementosPorPagina
        );

        // Obtener comentarios
        $comentarios = $this->rutaComentarioService->obtenerComentarios();

        // Renderizar la vista de inicio
        $this->pages->render('inicio', [
            'rutas' => $rutasPaginadas,
            'paginacion' => $paginacion,
            'comentarios' => $comentarios
        ]);
    }

    // Muestra todas las rutas con una paginación de 5 por página
    public function listadoCompleto() {
        $paginacion = new Zebra_Pagination();
        $rutas = $this->rutaService->obtenerRutas();
        $numeroRutas = count($rutas);

        // Paginación con 5 rutas por página
        $elementosPorPagina = 5;

        $paginacion->records($numeroRutas);
        $paginacion->records_per_page($elementosPorPagina);

        // Obtener las rutas con la paginación aplicada
        $rutasPaginadas = array_slice(
            $rutas,
            (($paginacion->get_page() - 1) * $elementosPorPagina),
            $elementosPorPagina
        );

        // Obtener la ruta más larga
        $rutaMasLarga = $this->rutaService->rutaMasLarga();

        // Obtener comentarios
        $comentarios = $this->rutaComentarioService->obtenerComentarios();

        // Renderizar la vista de inicio
        $this->pages->render('inicio', [
            'rutas' => $rutasPaginadas,
            'paginacion' => $paginacion,
            'numRutas' => $numeroRutas,
            'rutaMasLarga' => $rutaMasLarga,
            'comentarios' => $comentarios
        ]);
    }

    // Método para buscar rutas por un campo específico
    public function buscarRuta() {
        $paginacion = new Zebra_Pagination();

        if (isset($_GET['campo']) && isset($_GET['buscador'])) {
            $campo = $_GET['campo'];
            $elementoABuscar = $_GET['buscador'];

            $ruta = new Ruta();
            $ruta->setCampo($campo);
            $ruta->setElementoABuscar($elementoABuscar);

            // Sanitizar y validar la búsqueda
            $ruta->sanitizarDatosBusqueda();
            $errores = $ruta->validarDatosBusqueda();

            // Obtener rutas que coinciden con la búsqueda
            $rutas = $this->rutaService->buscarRuta($ruta->getCampo(), $ruta->getElementoABuscar());

            // Configurar paginación
            $elementosPorPagina = 3;
            $paginacion->records(count($rutas));
            $paginacion->records_per_page($elementosPorPagina);
            $paginacion->base_url(BASE_URL . 'Ruta/buscarRuta?campo=' . urlencode($campo) . '&buscador=' . urlencode($elementoABuscar));

            // Obtener rutas paginadas
            $rutasPaginadas = array_slice(
                $rutas,
                (($paginacion->get_page() - 1) * $elementosPorPagina),
                $elementosPorPagina
            );

            // Obtener comentarios
            $comentarios = $this->rutaComentarioService->obtenerComentarios();

            // Renderizar la vista de inicio con los resultados de búsqueda
            $this->pages->render('inicio', [
                'rutas' => $rutasPaginadas,
                'paginacion' => $paginacion,
                'errores' => $errores,
                'comentarios' => $comentarios
            ]);
        }
    }
}
