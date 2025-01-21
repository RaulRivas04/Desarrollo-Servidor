<h3>Crear Categoría</h3>

<!-- Formulario para crear una nueva categoría -->
<form action="<?= BASE_URL ?>categoria/create" method="POST">
    <!-- Campo para el nombre de la categoría -->
    <label for="nombre">Nombre</label>
    <input type="text" id="nombre" name="data[nombre]" required>
    
    <!-- Botón para enviar el formulario -->
    <button type="submit">Crear</button>
</form>

<!-- Mostrar mensajes de error si existen -->
<?php if (isset($_SESSION['error_message'])): ?>
    <p style="color: red;"><?= htmlspecialchars($_SESSION['error_message']) ?></p>
    <?php unset($_SESSION['error_message']); // Eliminar el mensaje después de mostrarlo ?>
<?php endif; ?>

<!-- Mostrar mensajes de éxito si existen -->
<?php if (isset($_SESSION['success_message'])): ?>
    <p style="color: green;"><?= htmlspecialchars($_SESSION['success_message']) ?></p>
    <?php unset($_SESSION['success_message']); // Eliminar el mensaje después de mostrarlo ?>
<?php endif; ?>
