// ComentarioModel.php
class ComentarioModel {
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    public function obtenerPorRuta($id_ruta) {
        $stmt = $this->db->prepare('SELECT c.*, u.nombre_usuario FROM rutas_comentarios c JOIN usuarios u ON c.id_usuario = u.id WHERE c.id_ruta = ? ORDER BY c.fecha DESC');
        $stmt->execute([$id_ruta]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insertarComentario($id_ruta, $id_usuario, $comentario) {
        $fecha = date('Y-m-d');
        $stmt = $this->db->prepare('INSERT INTO rutas_comentarios (id_ruta, id_usuario, comentario, fecha) VALUES (?, ?, ?, ?)');
        $stmt->execute([$id_ruta, $id_usuario, $comentario, $fecha]);
    }
}