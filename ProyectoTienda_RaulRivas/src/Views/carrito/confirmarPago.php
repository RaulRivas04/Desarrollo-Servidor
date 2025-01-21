<h3>Confirmar Pago</h3>

<!-- Contenedor del carrito -->
<div class="cart-container">
    <table class="cart-table">
        <thead>
            <tr>
                <th>Imagen</th>
                <th>Producto</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            // Inicializar el total de la compra
            $total = 0;
            foreach ($productos as $producto): 
                // Calcular el subtotal del producto
                $subtotal = $producto['precio'] * $producto['cantidad'];
                $total += $subtotal; // Sumar al total general
            ?>
                <tr>
                    <!-- Imagen del producto -->
                    <td>
                        <img src="<?= BASE_URL ?>public/img/<?= htmlspecialchars($producto['imagen']) ?>" 
                             alt="<?= htmlspecialchars($producto['nombre']) ?>" 
                             class="cart-product-image">
                    </td>
                    <!-- Nombre del producto -->
                    <td><?= htmlspecialchars($producto['nombre']) ?></td>
                    <!-- Precio unitario del producto -->
                    <td>€<?= htmlspecialchars($producto['precio']) ?></td>
                    <!-- Cantidad de unidades -->
                    <td><?= htmlspecialchars($producto['cantidad']) ?></td>
                    <!-- Subtotal (precio * cantidad) -->
                    <td>€<?= htmlspecialchars($subtotal) ?></td>
                </tr>
            <?php endforeach; ?>
            <!-- Fila para mostrar el total general -->
            <tr>
                <td colspan="4" class="total-label"><strong>Total:</strong></td>
                <td class="total-value"><strong>€<?= htmlspecialchars($total) ?></strong></td>
            </tr>
        </tbody>
    </table>
</div>

<!-- Mostrar el método de pago seleccionado -->
<div class="payment-method">
    <p><strong>Método de Pago Seleccionado:</strong> <?= htmlspecialchars($metodoPago) ?></p>
</div>

<!-- Formulario para confirmar el pago -->
<form action="<?= BASE_URL ?>carrito/pagar" method="POST" class="cart-form">
    <!-- Enviar el método de pago como un campo oculto -->
    <input type="hidden" name="metodo_pago" value="<?= htmlspecialchars($metodoPago) ?>">
    <button type="submit" class="cart-button">Confirmar y Pagar</button>
</form>
