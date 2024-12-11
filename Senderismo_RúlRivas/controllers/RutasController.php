<?php
require_once 'models/Ruta.php';
require_once 'repositories/RutaRepository.php';

class RutasController {
    private $rutaRepository;

    public function __construct() {
        $this->rutaRepository = new RutaRepository();
    }

    public function listarRutas() {
        $rutas = $this->rutaRepository->getAll();
        require 'views/rutas.php';
    }

    public function buscarRuta($busqueda) {
        $rutas = $this->rutaRepository->search($busqueda);
        require 'views/rutas.php';
    }

    public function agregarRuta($titulo, $descripcion, $desnivel, $distancia) {
        $this->rutaRepository->insertarRuta($titulo, $descripcion, $desnivel, $distancia);
        header('Location: /proyecto-senderismo/rutas');
    }
}
