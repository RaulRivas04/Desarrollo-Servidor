<?php

namespace Controllers;

use Lib\Pages;
use Models\Usuario;
use Services\UsuarioService;

class UsuarioController {

    private Pages $pages;
    private UsuarioService $usuarioService;
    

    public function __construct() {
        $this->pages = new Pages();
        $this->usuarioService = new UsuarioService();
    }

    // Llama al formulario de registro
    public function formularioRegistro() {
        $this->pages->render('Usuario/registro');
    }

    // Maneja el registro de usuario
    public function registrar() {
        $rol = $_POST['rol'] ?? 'usur';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario = new Usuario(
                null,
                $_POST['nombre'],
                $_POST['apellidos'],
                $_POST['email'],
                $_POST['direccion'],
                $_POST['telefono'],
                $_POST['fecha_nacimiento'],
                $_POST['nombre_usuario'],
                $_POST['contrasena'],
                $rol
            );

            // Sanitiza y valida datos
            $usuario->sanitizarDatos();
            $errores = $usuario->validarDatosRegistro();

            // Verifica las contraseñas
            if ($_POST['contrasena'] !== $_POST['confirmar_contrasena']) {
                $errores['confirmar_contrasena'] = "Las contraseñas no coinciden";
            }

            if (empty($errores)) {
                $contrasena_segura = password_hash($usuario->getContrasena(), PASSWORD_BCRYPT, ['cost' => 10]);
                $usuario->setContrasena($contrasena_segura);

                $userData = [
                    'nombre' => $usuario->getNombre(),
                    'apellidos' => $usuario->getApellidos(),
                    'correo' => $usuario->getCorreo(),
                    'direccion' => $usuario->getDireccion(),
                    'telefono' => $usuario->getTelefono(),
                    'fecha_nacimiento' => $usuario->getFechaNacimiento(),
                    'nombre_usuario' => $usuario->getNombreUsuario(),
                    'contrasena' => $contrasena_segura,
                    'rol' => $usuario->getRol()
                ];

                $resultado = $this->usuarioService->guardarUsuarios($userData);

                if ($resultado === true) {
                    header("Location: " . BASE_URL);
                    exit;
                } else {
                    $errores['db'] = "Error al registrar el usuario: " . $resultado;
                    $this->pages->render('Usuario/registro', ["errores" => $errores]);
                }
            } else {
                $this->pages->render('Usuario/registro', ["errores" => $errores]);
            }
        }
    }

    // Llama al formulario para iniciar sesión
    public function formularioInicioSesion() {
        $this->pages->render('Usuario/iniciaSesion');
    }

    // Maneja el inicio de sesión
    public function iniciarSesion() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        
        $errores = [];
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario = new Usuario(null, "", "", $_POST['correo'], "", "", "", "", $_POST['contrasena'], "");

            // Sanitiza y valida datos
            $usuario->sanitizarDatos();
            $errores = $usuario->validarDatosLogin();

            // Inicia sesión si no hay errores
            if (empty($errores)) {
                $resultado = $this->usuarioService->iniciarSesion($usuario->getCorreo(), $usuario->getContrasena());
    
                if ($resultado) {
                    $_SESSION['usuario'] = $resultado;
                    header("Location: " . BASE_URL);
                    exit;
                } else {
                    $errores['login'] = "Los datos son incorrectos";
                }
            }

            $this->pages->render('Usuario/iniciaSesion', ["errores" => $errores]);
        }
    }

    // Cierra la sesión
    public function logout() {
        session_start();
        session_unset();
        session_destroy();
        header("Location: " . BASE_URL);
        exit;
    }

    // Muestra los datos del usuario logueado
    public function verTusDatos() {
        if(session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $usuActual = $_SESSION['usuario'];
        $this->pages->render("Usuario/datosUsuario", ["usuario" => $usuActual]);
    }

    // Actualiza los datos del usuario
    public function actualizarDatos() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario = new Usuario(
                $_POST['id'],
                $_POST['nombre'],
                $_POST['apellidos'],
                $_POST['email'],
                $_POST['direccion'],
                $_POST['telefono'],
                $_POST['fecha_nacimiento'],
                $_POST['nombre_usuario'],
                "",
                ""
            );

            $origen = $_POST['origen'];

            // Sanitiza y valida datos
            $usuario->sanitizarDatos();
            $errores = $usuario->validarDatosEdicion();

            if (count($errores) > 0) {
                $this->pages->render('Usuario/formEditAdminDatos', [
                    'usuario' => $_POST,
                    'errores' => $errores,
                    'origen' => $origen
                ]);
                return;
            }

            $userData = [
                'id' => $usuario->getId(),
                'nombre' => $usuario->getNombre(),
                'apellidos' => $usuario->getApellidos(),
                'correo' => $usuario->getCorreo(),
                'direccion' => $usuario->getDireccion(),
                'telefono' => $usuario->getTelefono(),
                'fecha_nacimiento' => $usuario->getFechaNacimiento(),
                'nombre_usuario' => $usuario->getNombreUsuario()
            ];

            $resultado = $this->usuarioService->actualizar($userData);

            if ($resultado > 0) {
                $usu = $this->usuarioService->obtenerUsuarioPorId($usuario->getId());
                $_SESSION['usuario'] = $usu;
                $usuModificado = $_SESSION["usuario"];

                if ($origen === "verUsuarios") {
                    $usuarios = $this->usuarioService->obtenerTodosUsuarios();
                    $this->pages->render("Usuario/verUsuarios", ["usuarios" => $usuarios]);
                } else {
                    $this->pages->render("Usuario/datosUsuario", ["usuario" => $usuModificado]);
                }
                exit;
            } else {
                $error = 'No se pudo actualizar los datos del usuario';
                $this->pages->render('Usuario/formEditAdminDatos', ['usuario' => $userData, 'error' => $error]);
            }
        }
    }

    // Muestra todos los usuarios (solo administradores)
    public function verUsuarios() {
        if(session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $usuarios = $this->usuarioService->obtenerTodosUsuarios();
        $this->pages->render('Usuario/verUsuarios', ["usuarios" => $usuarios]);
    }

    // Llama al formulario para editar datos de un usuario
    public function formularioDatos() {
        if(session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (isset($_POST['id']) && isset($_POST['origen'])) {
            $origen = $_POST['origen'];
            $id = $_POST['id'];
            $usuario = $this->usuarioService->obtenerUsuarioPorId($id);

            $errores = [];

            // Validación de origen e id
            if ($origen !== "verUsuarios" && $origen !== "datosUsuario") {
                $errores["origen"] = "El origen no es válido";
            }
            if ($id < 0 || $id == " ") {
                $errores["id"] = "El ID no es válido";
            }

            if (count($errores) > 0) {
                $this->pages->render('Usuario/' . $origen, ['usuario' => $_POST, 'errores' => $errores]);
                return;
            }

            if ($usuario) {
                $this->pages->render('Usuario/formEditAdminDatos', [
                    'usuario' => $usuario,
                    'origen' => $origen
                ]);
            } else {
                header('Location: /Senderismo/Usuario/' . $origen);
            }
        } else {
            header("Location: " . BASE_URL);
        }
    }
}
