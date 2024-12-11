<?php

namespace Repositories;

use Lib\BaseDatos;
use Models\Usuario;
use PDO;
use PDOException;

class UsuarioRepository {
    private BaseDatos $db;

    public function __construct() {
        $this->db = new BaseDatos();
    }

    // Insertar un usuario en la base de datos
    public function crearUsuario(Usuario $usuario): bool|string {
        try {
            $sql = "INSERT INTO usuarios (nombre, apellidos, correo, direccion, telefono, fecha_nacimiento, usuario, contraseña, rol)
                    VALUES (:nombre, :apellidos, :correo, :direccion, :telefono, :fecha_nacimiento, :usuario, :contrasena, :rol)";
            $stmt = $this->db->prepare($sql);

            $stmt->bindValue(':nombre', $usuario->getNombre(), PDO::PARAM_STR);
            $stmt->bindValue(':apellidos', $usuario->getApellidos(), PDO::PARAM_STR);
            $stmt->bindValue(':correo', $usuario->getCorreo(), PDO::PARAM_STR);
            $stmt->bindValue(':direccion', $usuario->getDireccion(), PDO::PARAM_STR);
            $stmt->bindValue(':telefono', $usuario->getTelefono(), PDO::PARAM_STR);
            $stmt->bindValue(':fecha_nacimiento', $usuario->getFechaNacimiento(), PDO::PARAM_STR);
            $stmt->bindValue(':usuario', $usuario->getNombreUsuario(), PDO::PARAM_STR);
            $stmt->bindValue(':contrasena', $usuario->getContrasena(), PDO::PARAM_STR);
            $stmt->bindValue(':rol', $usuario->getRol(), PDO::PARAM_STR);

            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    // Verificar si el correo existe
    public function obtenerPorCorreo(string $correo): ?array {
        try {
            $sql = "SELECT * FROM usuarios WHERE correo = :correo";
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(':correo', $correo, PDO::PARAM_STR);
            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
        } catch (PDOException $e) {
            error_log("Error al obtener el usuario: " . $e->getMessage());
            return null;
        }
    }

    // Obtener un usuario por su ID
    public function obtenerPorId(int $id): ?array {
        try {
            $sql = "SELECT * FROM usuarios WHERE id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
        } catch (PDOException $e) {
            error_log("Error al obtener el usuario por ID: " . $e->getMessage());
            return null;
        }
    }

    // Actualizar la información de un usuario
    public function actualizarUsuario(Usuario $usuario): int|string {
        try {
            $sql = "UPDATE usuarios 
                    SET nombre = :nombre, apellidos = :apellidos, correo = :correo, 
                        direccion = :direccion, telefono = :telefono, fecha_nacimiento = :fecha_nacimiento, 
                        usuario = :usuario
                    WHERE id = :id";

            $stmt = $this->db->prepare($sql);

            $stmt->bindValue(':id', $usuario->getId(), PDO::PARAM_INT);
            $stmt->bindValue(':nombre', $usuario->getNombre(), PDO::PARAM_STR);
            $stmt->bindValue(':apellidos', $usuario->getApellidos(), PDO::PARAM_STR);
            $stmt->bindValue(':correo', $usuario->getCorreo(), PDO::PARAM_STR);
            $stmt->bindValue(':direccion', $usuario->getDireccion(), PDO::PARAM_STR);
            $stmt->bindValue(':telefono', $usuario->getTelefono(), PDO::PARAM_STR);
            $stmt->bindValue(':fecha_nacimiento', $usuario->getFechaNacimiento(), PDO::PARAM_STR);
            $stmt->bindValue(':usuario', $usuario->getNombreUsuario(), PDO::PARAM_STR);

            $stmt->execute();
            return $stmt->rowCount();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    // Obtener todos los usuarios
    public function obtenerTodos(): ?array {
        try {
            $sql = "SELECT * FROM usuarios ORDER BY nombre";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC) ?: null;
        } catch (PDOException $e) {
            error_log("Error al obtener los usuarios: " . $e->getMessage());
            return null;
        }
    }
}
