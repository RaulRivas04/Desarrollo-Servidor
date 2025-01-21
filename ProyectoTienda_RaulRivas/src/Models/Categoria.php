<?php

namespace Models;

class Categoria
{
    private int $id; // ID único de la categoría
    private string $nombre; // Nombre de la categoría

    /**
     * Constructor de la clase Categoria
     *
     * @param string $nombre Nombre de la categoría
     */
    public function __construct(string $nombre)
    {
        $this->nombre = $nombre; // Asigna el nombre a la categoría
    }

    /**
     * Obtener el ID de la categoría
     *
     * @return int ID de la categoría
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Obtener el nombre de la categoría
     *
     * @return string Nombre de la categoría
     */
    public function getNombre(): string
    {
        return $this->nombre;
    }

    /**
     * Establecer un nuevo nombre para la categoría
     *
     * @param string $nombre Nuevo nombre
     */
    public function setNombre(string $nombre): void
    {
        $this->nombre = $nombre;
    }
}
