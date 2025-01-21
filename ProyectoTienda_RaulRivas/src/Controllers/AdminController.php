<?php

namespace Controllers;

use Lib\Pages;
use Models\User;
use Repositories\UserRepository;
use Services\AdminService;
use Utils;
use Controllers\PagoController;

class AdminController
{
    private Pages $pages; // Gestión de vistas
    private UserRepository $userRepository; // Repositorio para manejo de usuarios

    public function __construct()
    {
        $this->pages = new Pages();
        $this->userRepository = new UserRepository();
    }

    /**
     * Mostrar el panel de administración
     */
    public function index(): void
    {
        // Verifica que el usuario sea administrador
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
            header('Location: ' . BASE_URL); // Redirige si no tiene permisos
            exit;
        }

        $this->pages->render('admin/index', ['titulo' => 'Panel de Administración']);
    }

    /**
     * Mostrar la lista de usuarios
     */
    public function listarUsuarios(): void
    {
        // Verifica que el usuario sea administrador
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
            header('Location: ' . BASE_URL);
            exit;
        }

        // Recupera todos los usuarios
        $usuarios = $this->userRepository->findAll();
        $this->pages->render('admin/usuarios', ['usuarios' => $usuarios]);
    }

    /**
     * Crear un nuevo usuario
     */
    public function crearUsuario(): void
    {
        // Verifica que el usuario sea administrador
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
            header('Location: ' . BASE_URL);
            exit;
        }

        // Verifica si la solicitud es POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = $_POST['data'] ?? null;

            if ($data) {
                // Crea un nuevo usuario con los datos proporcionados
                $user = new User(
                    null,
                    $data['nombre'] ?? '',
                    $data['apellidos'] ?? '',
                    $data['email'] ?? '',
                    password_hash($data['password'] ?? '', PASSWORD_BCRYPT),
                    $data['role'] ?? 'user'
                );

                try {
                    $this->userRepository->save($user); // Guarda el usuario
                    $_SESSION['admin_success'] = 'Usuario creado exitosamente.';
                } catch (\PDOException $e) {
                    $_SESSION['admin_error'] = 'Error al crear el usuario: ' . $e->getMessage();
                }
            }

            header('Location: ' . BASE_URL . 'admin/usuarios');
            exit;
        }

        $this->pages->render('admin/crearUsuario');
    }

    /**
     * Eliminar un usuario
     */
    public function eliminarUsuario(int $id): void
    {
        // Verifica que el usuario sea administrador
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
            header('Location: ' . BASE_URL);
            exit;
        }

        try {
            $this->userRepository->delete($id); // Elimina al usuario por ID
            $_SESSION['admin_success'] = 'Usuario eliminado exitosamente.';
        } catch (\Exception $e) {
            $_SESSION['admin_error'] = 'Error al eliminar el usuario: ' . $e->getMessage();
        }

        header('Location: ' . BASE_URL . 'admin/usuarios');
        exit;
    }
}
?>
