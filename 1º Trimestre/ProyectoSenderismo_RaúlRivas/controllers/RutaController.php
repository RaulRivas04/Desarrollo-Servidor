<?php
require_once 'models/RutaModel.php';
require_once 'models/ComentarioModel.php';

class RutaController {
    public function listarRutas() {
        $modelo = new RutaModel();
        $rutas = $modelo->obtenerTodas();
        include 'views/lista_rutas.php';
    }

    public function listarRutasPaginadas($paginaActual = 1, $porPagina = 10) {
        $modelo = new RutaModel();
        $rutas = $modelo->obtenerTodas();
        $paginador = $this->paginacion($rutas, $porPagina, $paginaActual);
        include 'views/lista_rutas_paginadas.php';
    }

    private function paginacion($items, $porPagina, $paginaActual, $opciones = []) {
        $coleccion = collect($items);
        return new LengthAwarePaginator(
            $coleccion->forPage($paginaActual, $porPagina),
            $coleccion->count(),
            $porPagina,
            $paginaActual,
            $opciones
        );
    }
}
