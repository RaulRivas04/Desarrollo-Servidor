<?php

namespace Services;

use Models\Categoria;
use Repositories\CategoriaRepository;

class CategoriaService
{
    private CategoriaRepository $categoriaRepository; // Repositorio para interactuar con categorías

    /**
     * Constructor que inicializa el repositorio de categorías
     */
    public function __construct()
    {
        $this->categoriaRepository = new CategoriaRepository();
    }

    /**
     * Crear una nueva categoría
     *
     * @param string $nombre Nombre de la categoría
     */
    public function createCategoria(string $nombre): void
    {
        $categoria = new Categoria($nombre); // Crea una instancia de la categoría
        $this->categoriaRepository->save($categoria); // Guarda la categoría en la base de datos
    }

    /**
     * Obtener todas las categorías
     *
     * @return array Lista de todas las categorías
     */
    public function getAllCategorias(): array
    {
        return $this->categoriaRepository->findAll(); // Recupera todas las categorías del repositorio
    }
}
