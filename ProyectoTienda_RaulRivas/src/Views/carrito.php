<?php foreach ($productos as $producto): ?>
    <div class="producto">
        <!-- Mostrar el nombre del producto -->
        <h2><?php echo htmlspecialchars($producto->getNombre()); ?></h2>
        
        <!-- Mostrar el precio del producto -->
        <p>Precio: <?php echo htmlspecialchars($producto->getPrecio()); ?> €</p>
        
        <!-- Mostrar la cantidad disponible -->
        <p>Cantidad: <?php echo htmlspecialchars($producto->getCantidad()); ?></p>
        
        <div class="acciones">
            <!-- Formulario para eliminar el producto -->
            <form action="eliminar_producto.php" method="post">
                <!-- Campo oculto para enviar el ID del producto -->
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($producto->getId()); ?>">
                <button type="submit">Eliminar</button>
            </form>
            
            <!-- Formulario para actualizar la cantidad del producto -->
            <form action="actualizar_cantidad.php" method="post">
                <!-- Campo oculto para enviar el ID del producto -->
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($producto->getId()); ?>">
                <!-- Botones para incrementar o decrementar la cantidad -->
                <button type="submit" name="accion" value="incrementar">+</button>
                <button type="submit" name="accion" value="decrementar">-</button>
            </form>
        </div>
    </div>
<?php endforeach; ?>
