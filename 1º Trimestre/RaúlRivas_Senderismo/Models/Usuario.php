<?php

namespace Models;

use Lib\BaseDatos;
use Lib\Validar;
use PDO;
use PDOException;

class Usuario {
    private BaseDatos $conexion;
    private mixed $stmt;

    public function __construct(
        private ?int $id = null,
        private string $nombre = "",
        private string $apellidos = "",
        private string $correo = "",
        private string $direccion = "",
        private string $telefono = "",
        private string $fechaNacimiento = "",
        private string $nombreUsuario = "",
        private string $contrasena = "",
        private string $rol = ""
    ) {
        $this->conexion = new BaseDatos();
    }

    // Getters
    public function getId(): ?int { return $this->id; }
    public function getNombre(): string { return $this->nombre; }
    public function getApellidos(): string { return $this->apellidos; }
    public function getCorreo(): string { return $this->correo; }
    public function getDireccion(): string { return $this->direccion; }
    public function getTelefono(): string { return $this->telefono; }
    public function getFechaNacimiento(): string { return $this->fechaNacimiento; }
    public function getNombreUsuario(): string { return $this->nombreUsuario; }
    public function getContrasena(): string { return $this->contrasena; }
    public function getRol(): string { return $this->rol; }

    // Setters
    public function setId(?int $id): void { $this->id = $id; }
    public function setNombre(string $nombre): void { $this->nombre = $nombre; }
    public function setApellidos(string $apellidos): void { $this->apellidos = $apellidos; }
    public function setCorreo(string $correo): void { $this->correo = $correo; }
    public function setDireccion(string $direccion): void { $this->direccion = $direccion; }
    public function setTelefono(string $telefono): void { $this->telefono = $telefono; }
    public function setFechaNacimiento(string $fechaNacimiento): void { $this->fechaNacimiento = $fechaNacimiento; }
    public function setNombreUsuario(string $nombreUsuario): void { $this->nombreUsuario = $nombreUsuario; }
    public function setContrasena(string $contrasena): void { $this->contrasena = $contrasena; }
    public function setRol(string $rol): void { $this->rol = $rol; }

    // Validación de datos para el registro
    public function validarDatosRegistro(): array {
        $errores = [];

        if (empty($this->nombreUsuario) || empty($this->contrasena) || empty($this->rol)) {
            $errores[] = "Los campos 'Nombre Usuario', 'Contraseña' y 'Rol' son obligatorios";
        }

        if (!Validar::validateString($this->nombre)) {
            $errores['nombre'] = "El nombre no puede contener caracteres especiales";
        }

        if (!Validar::validateString($this->apellidos)) {
            $errores['apellidos'] = "Los apellidos no pueden contener caracteres especiales";
        }

        if (!Validar::validateEmail($this->correo)) {
            $errores['correo'] = "El correo electrónico no es válido";
        }

        if (!Validar::validateString($this->direccion)) {
            $errores['direccion'] = "El formato de la dirección no es válido";
        }

        if (!Validar::validatePhone($this->telefono)) {
            $errores['telefono'] = "El teléfono solo puede contener 9 números";
        }

        if (!Validar::validateDate($this->fechaNacimiento)) {
            $errores['fechaNacimiento'] = "La fecha de nacimiento no es válida";
        }

        if (!Validar::validateString($this->nombreUsuario)) {
            $errores['nombreUsuario'] = "El nombre de usuario es obligatorio y no puede contener caracteres especiales";
        }

        if (!Validar::validateString($this->contrasena) || strlen($this->contrasena) < 6) {
            $errores['contrasena'] = "La contraseña debe tener al menos 6 caracteres y puede incluir letras, caracteres especiales y números";
        }

        if (!in_array($this->rol, ["admin", "user"])) {
            $errores['rol'] = "El rol debe ser 'admin' o 'user'";
        }

        return $errores;
    }

    // Sanitización de los datos de entrada
    public function sanitizarDatos(): void {
        $this->id = Validar::sanitizeInt($this->id);
        $this->nombre = Validar::sanitizeString($this->nombre);
        $this->apellidos = Validar::sanitizeString($this->apellidos);
        $this->correo = Validar::sanitizeEmail($this->correo);
        $this->direccion = Validar::sanitizeString($this->direccion);
        $this->telefono = Validar::sanitizePhone($this->telefono);
        $this->fechaNacimiento = Validar::sanitizeDate($this->fechaNacimiento);
        $this->nombreUsuario = Validar::sanitizeString($this->nombreUsuario);
        $this->contrasena = Validar::sanitizeString($this->contrasena);
        $this->rol = Validar::sanitizeString($this->rol);
    }

    // Validación para login
    public function validarDatosLogin(): array {
        $errores = [];

        if (empty($this->correo)) {
            $errores['correo'] = "El campo correo es obligatorio.";
        }

        if (empty($this->contrasena)) {
            $errores['contrasena'] = "El campo contraseña es obligatorio.";
        }

        return $errores;
    }

    // Validación de datos para edición
    public function validarDatosEdicion(): array {
        $errores = [];

        if (!Validar::validateInt($this->id)) {
            $errores['id'] = "El formato del id no es correcto";
        }

        if (empty($this->nombre)) {
            $errores['nombre'] = "El nombre es obligatorio y su formato no es válido";
        }

        if (empty($this->apellidos)) {
            $errores['apellidos'] = "Los apellidos son obligatorios y su formato no es válido";
        }

        if (empty($this->correo) || !Validar::validateEmail($this->correo)) {
            $errores['correo'] = "El correo electrónico es obligatorio y su formato no es válido";
        }

        if (empty($this->direccion)) {
            $errores['direccion'] = "La dirección es obligatoria y su formato no es válido";
        }

        if (empty($this->telefono) || !Validar::validatePhone($this->telefono)) {
            $errores['telefono'] = "El teléfono es obligatorio y su formato no es válido";
        }

        if (empty($this->fechaNacimiento) || !Validar::validateDate($this->fechaNacimiento)) {
            $errores['fechaNacimiento'] = "La fecha de nacimiento es obligatoria y su formato no es válido";
        }

        if (empty($this->nombreUsuario)) {
            $errores['nombreUsuario'] = "El nombre de usuario es obligatorio y su formato no es válido";
        }

        return $errores;
    }

}
