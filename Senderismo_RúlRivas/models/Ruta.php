<?php
class Ruta {
    public $id;
    public $titulo;
    public $descripcion;
    public $desnivel;
    public $distancia_km;
    public $fecha_creacion;

    public function __construct($id, $titulo, $descripcion, $desnivel, $distancia_km, $fecha_creacion) {
        $this->id = $id;
        $this->titulo = $titulo;
        $this->descripcion = $descripcion;
        $this->desnivel = $desnivel;
        $this->distancia_km = $distancia_km;
        $this->fecha_creacion = $fecha_creacion;
    }
}
