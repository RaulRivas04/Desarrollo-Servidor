// 2. MODELOS
// UsuarioModel.php
class UsuarioModel {
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    public function autenticar($nombre_usuario, $contraseña) {
        $stmt = $this->db->prepare('SELECT * FROM usuarios WHERE nombre_usuario = ?');
        $stmt->execute([$nombre_usuario]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario && password_verify($contraseña, $usuario['contraseña'])) {
            return $usuario;
        }
        return false;
    }

    public function registrar($nombre_usuario, $contraseña, $rol = 'usuario') {
        try {
            $hashed_password = password_hash($contraseña, PASSWORD_DEFAULT);
            $stmt = $this->db->prepare('INSERT INTO usuarios (nombre_usuario, contraseña, rol) VALUES (?, ?, ?)');
            return $stmt->execute([$nombre_usuario, $hashed_password, $rol]);
        } catch (PDOException $e) {
            error_log("Error al registrar usuario: " . $e->getMessage());
            return false;
        }
    }
}