<?php 
namespace Repositories;

use Models\User;

class UserRepository
{
    /**
     * Guardar un nuevo usuario en la base de datos
     *
     * @param User $user Objeto del usuario a guardar
     * @throws \Exception Si ocurre un error al ejecutar la consulta
     */
    public function save(User $user): void
    {
        $db = new \PDO('mysql:host=localhost;dbname=tienda', 'root', '');
        $stmt = $db->prepare('INSERT INTO usuarios (nombre, apellidos, email, password, rol) VALUES (:nombre, :apellidos, :email, :password, :rol)');
    
        // Vincular las variables con los datos del usuario
        $stmt->bindParam(':nombre', $user->getNombre());
        $stmt->bindParam(':apellidos', $user->getApellidos());
        $stmt->bindParam(':email', $user->getEmail());
        $stmt->bindParam(':password', $user->getPassword());
        $stmt->bindParam(':rol', $user->getRol());
    
        // Registro de diagnóstico
        error_log("Checkpoint: Ejecutando consulta con datos: " . print_r($user->toArray(), true));
    
        if (!$stmt->execute()) {
            // Registrar el error si la consulta falla
            error_log("Error al ejecutar consulta: " . print_r($stmt->errorInfo(), true));
            throw new \Exception('Error al ejecutar la consulta de inserción.');
        }
    }

    /**
     * Buscar un usuario por correo electrónico
     *
     * @param string $email Correo electrónico a buscar
     * @return User|null Objeto `User` si se encuentra, o null si no
     */
    public function findByEmail(string $email): ?User
    {
        $db = new \PDO('mysql:host=localhost;dbname=tienda', 'root', '');
        $stmt = $db->prepare('SELECT * FROM usuarios WHERE email = ? LIMIT 1');
        $stmt->execute([$email]);
        $data = $stmt->fetch(\PDO::FETCH_ASSOC);

        // Devuelve el usuario si se encuentra, de lo contrario, null
        return $data ? User::fromArray($data) : null;
    }

    /**
     * Obtener todos los usuarios de la base de datos
     *
     * @return array Lista de objetos `User`
     */
    public function findAll(): array
    {
        $db = new \PDO('mysql:host=localhost;dbname=miTienda', 'root', '');
        $stmt = $db->prepare('SELECT * FROM users');
        $stmt->execute();
        $usuarios = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        // Convertir cada registro en una instancia de `User`
        return array_map(function ($usuarioData) {
            return User::fromArray($usuarioData);
        }, $usuarios);
    }

    /**
     * Eliminar un usuario por ID
     *
     * @param int $id ID del usuario a eliminar
     */
    public function delete(int $id): void
    {
        $db = new \PDO('mysql:host=localhost;dbname=miTienda', 'root', '');
        $stmt = $db->prepare('DELETE FROM users WHERE id = :id');
        $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
        $stmt->execute();
    }
}
?>
