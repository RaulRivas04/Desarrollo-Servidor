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
        <!-- Mostrar mensaje si no hay productos en el carrito -->
        <?php if (empty($productos)): ?>
            <p>No hay productos en el carrito.</p>
        <?php else: ?>
            <?php $total = 0; // Inicializar el total del carrito ?>
            <!-- Tabla de productos en el carrito -->
            <table class="cart-table">
                <thead>
                    <tr>
                        <th>Imagen</th>
                        <th>Producto</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($productos as $producto): ?>
                        <?php 
                        // Calcular el subtotal del producto y sumarlo al total
                        $subtotal = $producto['precio'] * $producto['cantidad']; 
                        $total += $subtotal;
                        ?>
                        <tr>
                            <td>
                                <!-- Mostrar la imagen del producto -->
                                <img src="<?= BASE_URL ?>public/img/<?= htmlspecialchars($producto['imagen']) ?>" 
                                     alt="<?= htmlspecialchars($producto['nombre']) ?>" 
                                     class="cart-product-image">
                            </td>
                            <td><?= htmlspecialchars($producto['nombre']) ?></td>
                            <td>€<?= htmlspecialchars($producto['precio']) ?></td>
                            <td><?= htmlspecialchars($producto['cantidad']) ?></td>
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
            <!-- Botón para vaciar el carrito -->
            <button id="empty-cart-button" class="empty-cart-button">Vaciar Carrito</button>
        <?php endif; ?>
    </div>

    <!-- Formulario de pago (visible si hay productos) -->
    <?php if (!empty($productos)): ?>
        <form action="<?= BASE_URL ?>carrito/confirmarPago" method="POST" class="cart-form">
            <label for="metodo_pago">Seleccione un método de pago:</label>
            <select name="metodo_pago" id="metodo_pago" required>
                <option value="tarjeta">Tarjeta de Crédito/Débito</option>
                <option value="paypal">PayPal</option>
                <option value="transferencia">Transferencia Bancaria</option>
            </select>
            <button type="submit" class="cart-button">Pagar</button>
        </form>
    <?php endif; ?>

    <!-- Mensaje de éxito -->
    <?php if (isset($_SESSION['success_message'])): ?>
        <p style="color: green;"><?= htmlspecialchars($_SESSION['success_message']) ?></p>
        <?php unset($_SESSION['success_message']); ?>
    <?php endif; ?>

    <!-- Incluir el archivo JavaScript -->
    <script src="<?= BASE_URL ?>public/js/scripts.js"></script>
    <script>
        // Manejador para vaciar el carrito
        document.getElementById('empty-cart-button').addEventListener('click', function() {
            if (confirm('¿Estás seguro de que deseas vaciar el carrito?')) {
                fetch('<?= BASE_URL ?>carrito/vaciar', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({})
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        location.reload(); // Recargar la página si el carrito se vació con éxito
                    } else {
                        alert('Hubo un problema al vaciar el carrito.');
                    }
                })
                .catch(error => console.error('Error:', error));
            }
        });
    </script>
</body>
</html>
