<?php

namespace Services;

use Models\Pedido;
use Repositories\CarritoRepository;

class CarritoService
{
    private CarritoRepository $carritoRepository; // Repositorio para interactuar con el carrito
    private Pedido $pedido; // Modelo para gestionar pedidos

    /**
     * Constructor que inicializa el repositorio y el modelo de pedido
     */
    public function __construct()
    {
        $this->carritoRepository = new CarritoRepository();
        $this->pedido = new Pedido();
    }

    /**
     * Obtener los productos en el carrito de un usuario
     *
     * @param int $userId ID del usuario
     * @return array Lista de productos en el carrito
     */
    public function obtenerProductosEnCarrito(int $userId): array
    {
        return $this->carritoRepository->getProductosEnCarrito($userId);
    }

    /**
     * Agregar un producto al carrito de un usuario
     *
     * @param int $userId ID del usuario
     * @param int $productoId ID del producto
     * @param int $cantidad Cantidad del producto
     */
    public function agregarProductoAlCarrito(int $userId, int $productoId, int $cantidad): void
    {
        $this->carritoRepository->agregarProductoAlCarrito($userId, $productoId, $cantidad);
    }

    /**
     * Vaciar el carrito de un usuario
     *
     * @param int $userId ID del usuario
     */
    public function vaciarCarrito(int $userId): void
    {
        $this->carritoRepository->vaciarCarrito($userId);
    }

    /**
     * Crear un pedido a partir de los productos en el carrito
     *
     * @param int $userId ID del usuario
     * @param string $metodoPago Método de pago seleccionado
     * @param array $productos Lista de productos en el carrito
     * @return bool True si el pedido se creó con éxito, False en caso contrario
     */
    public function crearPedido(int $userId, string $metodoPago, array $productos): bool
    {
        // Implementación del método crearPedido
        // Aquí iría la lógica para procesar los productos, guardar el pedido,
        // y limpiar el carrito si la transacción es exitosa.
        return $this->pedido->crearPedido($userId, $metodoPago, $productos);
    }
}
