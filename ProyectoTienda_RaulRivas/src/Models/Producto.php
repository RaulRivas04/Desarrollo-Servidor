<?php

namespace Models;

class Producto
{
    private int $id; // ID único del producto
    private string $nombre; // Nombre del producto
    private float $precio; // Precio del producto
    private string $imagen; // Ruta o URL de la imagen del producto

    /**
     * Constructor de la clase Producto
     *
     * @param int $id ID del producto
     * @param string $nombre Nombre del producto
     * @param float $precio Precio del producto
     * @param string $imagen Imagen asociada al producto
     */
    public function __construct(int $id, string $nombre, float $precio, string $imagen)
    {
        $this->id = $id; // Asigna el ID
        $this->nombre = $nombre; // Asigna el nombre
        $this->precio = $precio; // Asigna el precio
        $this->imagen = $imagen; // Asigna la imagen
    }

    /**
     * Obtener el ID del producto
     *
     * @return int ID del producto
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Obtener el nombre del producto
     *
     * @return string Nombre del producto
     */
    public function getNombre(): string
    {
        return $this->nombre;
    }

    /**
     * Obtener el precio del producto
     *
     * @return float Precio del producto
     */
    public function getPrecio(): float
    {
        return $this->precio;
    }

    /**
     * Obtener la imagen del producto
     *
     * @return string Imagen del producto
     */
    public function getImagen(): string
    {
        return $this->imagen;
    }
}
