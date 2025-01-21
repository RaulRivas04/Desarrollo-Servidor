<h3>Listado de Productos</h3>
<div class="product-grid">
    <?php if (empty($productos)): ?>
        <p>No hay productos disponibles.</p>
    <?php else: ?>
        <?php foreach ($productos as $producto): ?>
            <div class="product-item">
                <img src="<?= BASE_URL ?>public/img/<?= htmlspecialchars($producto->getImagen()) ?>" alt="<?= htmlspecialchars($producto->getNombre()) ?>" class="product-image">
                <p><?= htmlspecialchars($producto->getNombre()) ?> - €<?= htmlspecialchars($producto->getPrecio()) ?></p>
                <form action="<?= BASE_URL ?>carrito/agregar" method="POST" class="add-to-cart-form">
                    <input type="hidden" name="producto_id" value="<?= htmlspecialchars($producto->getId()) ?>">
                    <div class="quantity-selector">
                        <button type="button" class="decrement">-</button>
                        <input type="number" name="cantidad" value="1" min="1" class="quantity-input">
                        <button type="button" class="increment">+</button>
                    </div>
                    <button type="submit" class="add-to-cart-button">Añadir al carrito</button>
                </form>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

<!-- Incluir el archivo JavaScript -->
<script src="<?= BASE_URL ?>/public/js/scripts.js"></script>