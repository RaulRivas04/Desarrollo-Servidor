<?php

namespace Models;

use Lib\BaseDatos;
use Lib\Validar;
use PDO;
use PDOException;

class RutaComentario {
    private ?int $id;
    private int $idRuta;
    private string $nombre;
    private string $texto;
    private string $fecha;
    private int $idUsuario;

    public function __construct(
        ?int $id = null,
        int $idRuta = 0,
        string $nombre = "",
        string $texto = "",
        string $fecha = "",
        int $idUsuario = 0
    ) {
        $this->id = $id;
        $this->idRuta = $idRuta;
        $this->nombre = $nombre;
        $this->texto = $texto;
        $this->fecha = $fecha;
        $this->idUsuario = $idUsuario;
    }

    // Métodos Getters
    public function getId(): ?int { return $this->id; }
    public function getIdRuta(): int { return $this->idRuta; }
    public function getNombre(): string { return $this->nombre; }
    public function getTexto(): string { return $this->texto; }
    public function getFecha(): string { return $this->fecha; }
    public function getIdUsuario(): int { return $this->idUsuario; }

    // Métodos Setters
    public function setId(?int $id): void { $this->id = $id; }
    public function setIdRuta(int $idRuta): void { $this->idRuta = $idRuta; }
    public function setNombre(string $nombre): void { $this->nombre = $nombre; }
    public function setTexto(string $texto): void { $this->texto = $texto; }
    public function setFecha(string $fecha): void { $this->fecha = $fecha; }
    public function setIdUsuario(int $idUsuario): void { $this->idUsuario = $idUsuario; }

    // Validación de datos
    public function validar(): array {
        $errores = [];

        // Validación del ID de ruta
        if ($this->idRuta <= 0) {
            $errores['idRuta'] = "El ID de la ruta no es válido";
        }

        // Validación del ID de usuario
        if ($this->idUsuario <= 0) {
            $errores['idUsuario'] = "El ID del usuario no es válido";
        }

        // Validación del nombre
        if (empty($this->nombre)) {
            $errores['nombre'] = "El nombre es obligatorio";
        } elseif (strlen($this->nombre) > 100) {
            $errores['nombre'] = "El nombre excede el límite de caracteres";
        }

        // Validación del texto del comentario
        if (empty($this->texto)) {
            $errores['texto'] = "El comentario es obligatorio";
        } elseif (strlen($this->texto) > 500) {
            $errores['texto'] = "El comentario es demasiado largo";
        }

        // Validación de la fecha
        if (empty($this->fecha)) {
            $errores['fecha'] = "La fecha es obligatoria";
        } elseif (!Validar::validateDate($this->fecha)) {
            $errores['fecha'] = "La fecha no es válida";
        }

        return $errores;
    }

    // Sanitización de datos
    public function sanitizar(): void {
        $this->id = Validar::sanitizeInt($this->id);
        $this->idRuta = Validar::sanitizeInt($this->idRuta);
        $this->nombre = Validar::sanitizeString($this->nombre);
        $this->texto = Validar::sanitizeString($this->texto);
        $this->fecha = Validar::sanitizeDate($this->fecha);
        $this->idUsuario = Validar::sanitizeInt($this->idUsuario);
    }

    // Validación de campos para ocultos
    public function validarOcultos(): array {
        $errores = [];

        if ($this->idRuta <= 0) {
            $errores['idRuta'] = "El ID de la ruta no es válido";
        }

        if ($this->idUsuario <= 0) {
            $errores['idUsuario'] = "El ID del usuario no es válido";
        }

        if (empty($this->nombre)) {
            $errores['nombre'] = "El nombre es obligatorio";
        } elseif (strlen($this->nombre) > 100) {
            $errores['nombre'] = "El nombre excede el límite de caracteres";
        }

        return $errores;
    }

    // Sanitización de datos ocultos
    public function sanitizarOcultos(): void {
        $this->idRuta = Validar::sanitizeInt($this->idRuta);
        $this->nombre = Validar::sanitizeString($this->nombre);
        $this->idUsuario = Validar::sanitizeInt($this->idUsuario);
    }
}
