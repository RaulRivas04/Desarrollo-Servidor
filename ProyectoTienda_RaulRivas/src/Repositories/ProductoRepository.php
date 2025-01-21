<?php

namespace Repositories;

use Models\Producto;
use PDO;

class ProductoRepository
{
    private PDO $db; // Conexión a la base de datos

    /**
     * Constructor que inicializa la conexión a la base de datos
     */
    public function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;dbname=tienda', 'root', ''); // Configuración de la base de datos
    }

    /**
     * Obtener todos los productos de la base de datos
     *
     * @return array Lista de objetos `Producto`
     */
    public function findAll(): array
    {
        // Consulta para obtener todos los productos
        $stmt = $this->db->query('SELECT * FROM productos');
        $productos = $stmt->fetchAll(PDO::FETCH_ASSOC); // Resultados como un array asociativo

        // Convertir los resultados en objetos `Producto`
        return array_map(
            fn($data) => new Producto($data['id'], $data['nombre'], $data['precio'], $data['imagen']),
            $productos
        );
    }

    /**
     * Obtener productos por categoría
     *
     * @param int $categoriaId ID de la categoría
     * @return array Lista de objetos `Producto`
     */
    public function findByCategoria(int $categoriaId): array
    {
        // Consulta preparada para productos de una categoría específica
        $stmt = $this->db->prepare('SELECT * FROM productos WHERE categoria_id = :categoria_id');
        $stmt->bindParam(':categoria_id', $categoriaId, PDO::PARAM_INT); // Vincular el parámetro de categoría
        $stmt->execute();
        $productos = $stmt->fetchAll(PDO::FETCH_ASSOC); // Resultados como un array asociativo

        // Convertir los resultados en objetos `Producto`
        return array_map(
            fn($data) => new Producto($data['id'], $data['nombre'], $data['precio'], $data['imagen']),
            $productos
        );
    }
}
