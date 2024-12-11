<?php

namespace Models;

use Lib\Validar;

class Ruta {

    // Propiedades privadas
    private ?int $id;
    private string $titulo;
    private string $descripcion;
    private int $desnivel;
    private float $distancia;
    private string $notas;
    private string $dificultad;

    // Variables para búsqueda
    private string $campo;
    private string $elementoABuscar;

    // Constructor
    public function __construct(
        int $id = null,
        string $titulo = "",
        string $descripcion = "",
        int $desnivel = 0,
        float $distancia = 0.0,
        string $notas = "",
        string $dificultad = ""
    ) {
        $this->id = $id;
        $this->titulo = $titulo;
        $this->descripcion = $descripcion;
        $this->desnivel = $desnivel;
        $this->distancia = $distancia;
        $this->notas = $notas;
        $this->dificultad = $dificultad;
    }

    // Métodos Getters
    public function getId(): ?int { return $this->id; }
    public function getTitulo(): string { return $this->titulo; }
    public function getDescripcion(): string { return $this->descripcion; }
    public function getDesnivel(): int { return $this->desnivel; }
    public function getDistancia(): float { return $this->distancia; }
    public function getNotas(): string { return $this->notas; }
    public function getDificultad(): string { return $this->dificultad; }

    // Métodos de búsqueda Getters
    public function getCampo(): string { return $this->campo; }
    public function getElementoABuscar(): string { return $this->elementoABuscar; }

    // Métodos Setters
    public function setId(int $id): void { $this->id = $id; }
    public function setTitulo(string $titulo): void { $this->titulo = $titulo; }
    public function setDescripcion(string $descripcion): void { $this->descripcion = $descripcion; }
    public function setDesnivel(int $desnivel): void { $this->desnivel = $desnivel; }
    public function setDistancia(float $distancia): void { $this->distancia = $distancia; }
    public function setNotas(string $notas): void { $this->notas = $notas; }
    public function setDificultad(string $dificultad): void { $this->dificultad = $dificultad; }

    // Métodos de búsqueda Setters
    public function setCampo(string $campo): void { $this->campo = $campo; }
    public function setElementoABuscar(string $elementoABuscar): void { $this->elementoABuscar = $elementoABuscar; }

    // Validación de datos de registro
    public function validarDatosRegistro(): array {
        $errores = [];

        if (empty($this->titulo)) $errores["titulo"] = "El campo 'Título' es obligatorio";
        if (empty($this->descripcion)) $errores["descripcion"] = "El campo 'Descripción' es obligatorio";
        if (empty($this->desnivel)) $errores["desnivel"] = "El campo 'Desnivel' es obligatorio";

        if (!empty($this->titulo) && !Validar::validateString($this->titulo)) $errores['titulo'] = "El título no puede tener caracteres especiales";  
        if (!empty($this->descripcion) && strlen($this->descripcion) > 65535) $errores['descripcion'] = "Descripción demasiado larga";

        if (!empty($this->desnivel) && !Validar::validateInt($this->desnivel)) $errores['desnivel'] = "El desnivel debe ser un número entero";

        if (!empty($this->distancia) && !Validar::validateDouble($this->distancia)) $errores['distancia'] = "La distancia debe ser un número decimal";

        if (!empty($this->notas) && strlen($this->notas) > 65535) $errores['notas'] = "Notas demasiado largas";

        if (!empty($this->dificultad) && !in_array($this->dificultad, ["baja", "media", "alta"])) $errores['dificultad'] = "La dificultad debe ser 'baja', 'media' o 'alta'";

        return $errores;
    }

    // Validación de datos para la búsqueda
    public function validarDatosBusqueda(): array {
        $errores = [];

        if (empty($this->campo)) $errores['campo'] = "Selecciona un campo para buscar";
        if (empty($this->elementoABuscar)) $errores['buscador'] = "Introduce un valor a buscar";

        $camposPermitidos = ["titulo", "descripcion", "desnivel", "distancia", "notas", "dificultad"];
        if (!in_array($this->campo, $camposPermitidos)) $errores['campo'] = "Campo no válido";

        switch($this->campo) {
            case 'desnivel':
            case 'distancia':
                if (!is_numeric($this->elementoABuscar)) $errores['buscador'] = "Valor no numérico en el campo '$this->campo'";
                break;
            case 'dificultad':
                if (!empty($this->elementoABuscar) && !in_array(strtolower($this->elementoABuscar), ["baja", "media", "alta"])) {
                    $errores['buscador'] = "Dificultad no válida";
                }
                break;
        }

        return $errores;
    }

    // Método de sanitización de datos
    public function sanitizarDatos(): void {
        $this->titulo = Validar::sanitizeString($this->titulo);
        $this->descripcion = Validar::sanitizeString($this->descripcion);
        $this->desnivel = Validar::sanitizeInt($this->desnivel);
        $this->distancia = Validar::sanitizeDouble($this->distancia);
        $this->dificultad = Validar::sanitizeString($this->dificultad);
        $this->notas = Validar::sanitizeString($this->notas);
    }

    // Método de sanitización para búsqueda
    public function sanitizarDatosBusqueda(): void {
        $this->campo = Validar::sanitizeString($this->campo);

        switch ($this->campo) {
            case 'desnivel':
                $this->elementoABuscar = Validar::sanitizeInt($this->elementoABuscar);
                break;
            case 'distancia':
                $this->elementoABuscar = Validar::sanitizeDouble($this->elementoABuscar);
                break;
            default:
                $this->elementoABuscar = Validar::sanitizeString($this->elementoABuscar);
        }
    }
}
