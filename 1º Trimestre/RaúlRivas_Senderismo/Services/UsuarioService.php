<?php

namespace Services;

use Models\Usuario;
use Repositories\UsuarioRepository;

class ServicioUsuario {
    private UsuarioRepository $repositorio;

    public function __construct() {
        $this->repositorio = new UsuarioRepository();
    }

    // Método para guardar un nuevo usuario en la base de datos
    public function registrarUsuario(array $datosUsuario): bool|string {
        try {
            $usuario = new Usuario(
                null,
                $datosUsuario['nombre'],
                $datosUsuario['apellidos'],
                $datosUsuario['correo'],
                $datosUsuario['direccion'],
                $datosUsuario['telefono'],
                $datosUsuario['fecha_nacimiento'],
                $datosUsuario['nombre_usuario'],
                $datosUsuario['contrasena'],
                $datosUsuario['rol']
            );

            return $this->repositorio->guardarUsuarios($usuario);
        } catch (\Exception $e) {
            error_log("Error al registrar el usuario: " . $e->getMessage());
            return false;
        }
    }

    // Método para obtener el correo del usuario
    public function obtenerCorreoUsuario(string $correo): ?array {
        return $this->repositorio->obtenerCorreo($correo);
    }

    // Método para obtener un usuario por su ID
    public function obtenerUsuarioPorID(int $id): ?array {
        return $this->repositorio->obtenerUsuarioPorId($id);
    }

    // Método para actualizar los datos de un usuario
    public function modificarUsuario(array $datosUsuario): int|string {
        try {
            $usuario = new Usuario(
                $datosUsuario['id'],
                $datosUsuario['nombre'],
                $datosUsuario['apellidos'],
                $datosUsuario['correo'],
                $datosUsuario['direccion'],
                $datosUsuario['telefono'],
                $datosUsuario['fecha_nacimiento'],
                $datosUsuario['nombre_usuario']
            );

            return $this->repositorio->actualizar($usuario);
        } catch (\Exception $e) {
            error_log("Error al modificar el usuario: " . $e->getMessage());
            return $e->getMessage();
        }
    }

    // Método para verificar si las credenciales del usuario son correctas
    public function autenticarUsuario(string $correo, string $contrasena): ?array {
        $usuario = $this->obtenerCorreoUsuario($correo);
        
        if ($usuario && password_verify($contrasena, $usuario['contraseña'])) {
            return $usuario;
        }

        return null;
    }

    // Método para obtener todos los usuarios
    public function obtenerUsuarios(): ?array {
        return $this->repositorio->obtenerTodosUsuarios();
    }
}
