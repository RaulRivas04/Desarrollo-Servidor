// 3. CONTROLADORES
// UsuarioController.php
class UsuarioController {
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre_usuario = $_POST['nombre_usuario'] ?? '';
            $contraseña = $_POST['contraseña'] ?? '';

            $modelo = new UsuarioModel();
            $usuario = $modelo->autenticar($nombre_usuario, $contraseña);

            if ($usuario) {
                $_SESSION['usuario'] = [
                    'id' => $usuario['id'],
                    'nombre_usuario' => $usuario['nombre_usuario'],
                    'rol' => $usuario['rol']
                ];
                header('Location: /ruta/listarRutas');
                exit;
            } else {
                $mensaje_error = "Credenciales incorrectas. Intenta de nuevo.";
                include 'views/login.php';
            }
        } else {
            include 'views/login.php';
        }
    }

    public function logout() {
        session_destroy();
        header('Location: /usuario/login');
        exit;
    }

    public function registro() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre_usuario = $_POST['nombre_usuario'] ?? '';
            $contraseña = $_POST['contraseña'] ?? '';

            $modelo = new UsuarioModel();
            if ($modelo->registrar($nombre_usuario, $contraseña)) {
                header('Location: /usuario/login');
                exit;
            } else {
                $mensaje_error = "Error al registrar. Intenta con un nombre de usuario diferente.";
                include 'views/registro.php';
            }
        } else {
            include 'views/registro.php';
        }
    }
}
