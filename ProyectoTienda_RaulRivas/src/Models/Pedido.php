<?php

namespace Models;

use PDO;

class Pedido
{
    private PDO $db; // Conexión a la base de datos

    /**
     * Constructor que inicializa la conexión a la base de datos
     */
    public function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;dbname=tienda', 'root', ''); // Configuración de conexión
    }

    /**
     * Crear un pedido en la base de datos
     *
     * @param int $userId ID del usuario que realiza el pedido
     * @param string $metodoPago Método de pago utilizado
     * @param array $productos Lista de productos incluidos en el pedido
     * @return bool True si el pedido se creó exitosamente, False en caso de error
     */
    public function crearPedido(int $userId, string $metodoPago, array $productos): bool
    {
        $this->db->beginTransaction(); // Inicia la transacción

        try {
            // Inserta el pedido en la tabla `pedidos`
            $stmt = $this->db->prepare(
                'INSERT INTO pedidos (usuario_id, metodo_pago, fecha) 
                 VALUES (:usuario_id, :metodo_pago, NOW())'
            );
            $stmt->bindParam(':usuario_id', $userId, PDO::PARAM_INT);
            $stmt->bindParam(':metodo_pago', $metodoPago, PDO::PARAM_STR);
            $stmt->execute();

            $pedidoId = $this->db->lastInsertId(); // Obtiene el ID del pedido recién creado

            // Inserta los productos relacionados al pedido en `pedidos_productos`
            foreach ($productos as $producto) {
                $stmt = $this->db->prepare(
                    'INSERT INTO pedidos_productos (pedido_id, producto_id, cantidad, precio) 
                     VALUES (:pedido_id, :producto_id, :cantidad, :precio)'
                );
                $stmt->bindParam(':pedido_id', $pedidoId, PDO::PARAM_INT);
                $stmt->bindParam(':producto_id', $producto['id'], PDO::PARAM_INT);
                $stmt->bindParam(':cantidad', $producto['cantidad'], PDO::PARAM_INT);
                $stmt->bindParam(':precio', $producto['precio'], PDO::PARAM_STR);
                $stmt->execute();
            }

            $this->db->commit(); // Confirma la transacción
            return true; // Retorna éxito
        } catch (\Exception $e) {
            $this->db->rollBack(); // Revierte la transacción en caso de error
            return false; // Retorna fallo
        }
    }
}
