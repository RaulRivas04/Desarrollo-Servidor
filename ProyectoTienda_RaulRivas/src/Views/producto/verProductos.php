<?php

namespace Repositories;

use Models\Producto;
use PDO;

class ProductoRepository
{
    private PDO $db;

    public function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;dbname=tienda', 'root', '');
    }

    public function save(Producto $producto): void
    {
        $stmt = $this->db->prepare('INSERT INTO productos (nombre, precio) VALUES (:nombre, :precio)');
        $stmt->bindParam(':nombre', $producto->getNombre(), PDO::PARAM_STR);
        $stmt->bindParam(':precio', $producto->getPrecio(), PDO::PARAM_STR);
        $stmt->execute();
    }

    public function findAll(): array
    {
        $stmt = $this->db->query('SELECT * FROM productos');
        $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return array_map(fn($data) => new Producto($data['nombre'], $data['precio']), $productos);
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ver Productos</title>
</head>
<body>
    <h1>Lista de Productos</h1>
    <ul>
        <?php foreach ($productos as $producto): ?>
            <li><?= htmlspecialchars($producto->getNombre()) ?> - <?= htmlspecialchars($producto->getPrecio()) ?>€</li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
