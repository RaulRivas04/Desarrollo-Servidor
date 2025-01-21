<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
    <!-- Enlace a la hoja de estilos -->
    <link rel="stylesheet" href="<?= BASE_URL ?>public/css/styles.css">
</head>
<body>
    <h3>Carrito de Compras</h3>
    <div class="cart-container">
        <!-- Mostrar mensaje si el carrito está vacío -->
        <?php if (empty($carrito)): ?>
            <p>No hay productos en el carrito.</p>
        <?php else: ?>
            <!-- Tabla de productos en el carrito -->
            <table class="cart-table">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Total</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($carrito as $item): ?>
                        <tr>
                            <!-- Nombre del producto -->
                            <td><?= htmlspecialchars($item->getNombre()) ?></td>
                            <!-- Precio unitario -->
                            <td>€<?= htmlspecialchars($item->getPrecio()) ?></td>
                            <!-- Cantidad de unidades -->
                            <td><?= htmlspecialchars($item->getCantidad()) ?></td>
                            <!-- Total (precio * cantidad) -->
                            <td>€<?= htmlspecialchars($item->getTotal()) ?></td>
                            <td>
                                <!-- Formulario para eliminar el producto del carrito -->
                                <form action="<?= BASE_URL ?>carrito/eliminar" method="POST" class="remove-from-cart-form">
                                    <!-- Campo oculto con el ID del producto -->
                                    <input type="hidden" name="producto_id" value="<?= htmlspecialchars($item->getId()) ?>">
                                    <!-- Botón para eliminar -->
                                    <button type="submit" class="remove-from-cart-button">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <!-- Total general del carrito -->
            <div class="total-label">
                Total: €<?= htmlspecialchars($total) ?>
            </div>
            <!-- Botón para proceder al pago -->
            <div class="cart-form">
                <button class="cart-button">Proceder al Pago</button>
            </div>
        <?php endif; ?>
    </div>

    <!-- Enlace al archivo JavaScript -->
    <script src="<?= BASE_URL ?>public/js/scripts.js"></script>
</body>
</html>
