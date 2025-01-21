<?php

namespace Repositories;

use PDO;

class CarritoRepository
{
    private PDO $db;

    public function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;dbname=tienda', 'root', '');
    }

    public function getProductosEnCarrito(int $userId): array
    {
        $stmt = $this->db->prepare('
            SELECT p.nombre, p.precio, p.imagen, c.cantidad 
            FROM carrito c 
            JOIN productos p ON c.producto_id = p.id 
            WHERE c.usuario_id = :user_id
        ');
        $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function agregarProductoAlCarrito(int $userId, int $productoId, int $cantidad): void
    {
        // Verificar si el producto ya está en el carrito
        $stmt = $this->db->prepare('SELECT cantidad FROM carrito WHERE usuario_id = :user_id AND producto_id = :producto_id');
        $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
        $stmt->bindParam(':producto_id', $productoId, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            // Si el producto ya está en el carrito, actualizar la cantidad
            $stmt = $this->db->prepare('UPDATE carrito SET cantidad = cantidad + :cantidad WHERE usuario_id = :user_id AND producto_id = :producto_id');
            $stmt->bindParam(':cantidad', $cantidad, PDO::PARAM_INT);
            $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
            $stmt->bindParam(':producto_id', $productoId, PDO::PARAM_INT);
            $stmt->execute();
        } else {
            // Si el producto no está en el carrito, insertarlo
            $stmt = $this->db->prepare('INSERT INTO carrito (usuario_id, producto_id, cantidad) VALUES (:user_id, :producto_id, :cantidad)');
            $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
            $stmt->bindParam(':producto_id', $productoId, PDO::PARAM_INT);
            $stmt->bindParam(':cantidad', $cantidad, PDO::PARAM_INT);
            $stmt->execute();
        }
    }

    public function vaciarCarrito(int $userId): void
    {
        $stmt = $this->db->prepare('DELETE FROM carrito WHERE usuario_id = :user_id');
        $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
        $stmt->execute();
    }
}