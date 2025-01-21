<?php

namespace Services;

use Models\Producto;
use Repositories\ProductoRepository;

class ProductoService
{
    private ProductoRepository $productoRepository; // Repositorio para interactuar con productos

    /**
     * Constructor que inicializa el repositorio de productos
     */
    public function __construct()
    {
        $this->productoRepository = new ProductoRepository();
    }

    /**
     * Obtener todos los productos
     *
     * @return array Lista de todos los productos
     */
    public function getAllProductos(): array
    {
        return $this->productoRepository->findAll(); // Recupera todos los productos del repositorio
    }
}
