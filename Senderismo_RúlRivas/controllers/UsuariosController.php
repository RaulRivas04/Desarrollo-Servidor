<?php
require_once 'models/Usuario.php';
require_once 'repositories/UsuarioRepository.php';

class UsuariosController {
    private $usuarioRepository;

    public function __construct() {
        $this->usuarioRepository = new UsuarioRepository();
    }

    public function login($email, $password) {
        $usuario = $this->usuarioRepository->findByEmail($email);
        if ($usuario && password_verify($password, $usuario->password)) {
            session_start();
            $_SESSION['usuario'] = $usuario;
            header('Location: /proyecto-senderismo');
        } else {
            echo 'Usuario o contraseña incorrectos';
        }
    }

    public function registro($nombre, $email, $password) {
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        $this->usuarioRepository->registrarUsuario($nombre, $email, $hashed_password);
    }
}
