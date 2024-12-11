// RutaModel.php
class RutaModel {
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    public function obtenerTodas() {
        $stmt = $this->db->query('SELECT * FROM rutas');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerPorId($id_ruta) {
        $stmt = $this->db->prepare('SELECT * FROM rutas WHERE id = ?');
        $stmt->execute([$id_ruta]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function insertarRuta($titulo, $descripcion, $desnivel, $distancia_km) {
        $stmt = $this->db->prepare('INSERT INTO rutas (titulo, descripcion, desnivel, distancia_km) VALUES (?, ?, ?, ?)');
        $stmt->execute([$titulo, $descripcion, $desnivel, $distancia_km]);
    }
}
