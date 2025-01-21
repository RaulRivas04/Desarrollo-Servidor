<h3>Crear Producto</h3>
<form action="<?= BASE_URL ?>producto/create" method="POST">
    <label for="nombre">Nombre</label>
    <input type="text" id="nombre" name="data[nombre]" required>
    <label for="precio">Precio</label>
    <input type="text" id="precio" name="data[precio]" required>
    <button type="submit">Crear</button>
</form>

<?php if (isset($_SESSION['error_message'])): ?>
    <p style="color: red;"><?= htmlspecialchars($_SESSION['error_message']) ?></p>
    <?php unset($_SESSION['error_message']); ?>
<?php endif; ?>

<?php if (isset($_SESSION['success_message'])): ?>
    <p style="color: green;"><?= htmlspecialchars($_SESSION['success_message']) ?></p>
    <?php unset($_SESSION['success_message']); ?>
<?php endif; ?>