<?php

namespace Repositories;

use Models\Categoria;
use PDO;

class CategoriaRepository
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
     * Guardar una categoría en la base de datos
     *
     * @param Categoria $categoria Objeto de la categoría a guardar
     */
    public function save(Categoria $categoria): void
    {
        // Inserta una nueva categoría en la tabla `categorias`
        $stmt = $this->db->prepare('INSERT INTO categorias (nombre) VALUES (:nombre)');
        $stmt->bindParam(':nombre', $categoria->getNombre(), PDO::PARAM_STR); // Asocia el nombre de la categoría
        $stmt->execute(); // Ejecuta la consulta
    }

    /**
     * Obtener todas las categorías de la base de datos
     *
     * @return array Lista de objetos `Categoria`
     */
    public function findAll(): array
    {
        // Realiza la consulta para obtener todas las categorías
        $stmt = $this->db->query('SELECT * FROM categorias');
        $categorias = $stmt->fetchAll(PDO::FETCH_ASSOC); // Obtiene los resultados como un array asociativo

        // Convierte los datos en objetos `Categoria`
        return array_map(fn($data) => new Categoria($data['nombre']), $categorias);
    }
}
