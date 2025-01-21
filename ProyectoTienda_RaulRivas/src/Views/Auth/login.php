<?php 
// Mostrar mensaje de éxito si existe en la sesión
if (isset($_SESSION['register_success'])): ?>
    <p style="color: green;"><?= htmlspecialchars($_SESSION['register_success']) ?></p>
    <?php unset($_SESSION['register_success']); // Eliminar el mensaje después de mostrarlo ?>
<?php endif; ?>

<?php 
// Mostrar mensaje de error si existe en la sesión
if (isset($_SESSION['register_error'])): ?>
    <p style="color: red;"><?= htmlspecialchars($_SESSION['register_error']) ?></p>
    <?php unset($_SESSION['register_error']); // Eliminar el mensaje después de mostrarlo ?>
<?php endif; ?>

<h3>Iniciar Sesión</h3>
<!-- Formulario para iniciar sesión -->
<form action="<?= BASE_URL ?>login" method="POST">
    <!-- Campo para el correo electrónico -->
    <label for="email">Correo Electrónico:</label>
    <input type="email" id="email" name="email" required>

    <!-- Campo para la contraseña -->
    <label for="password">Contraseña:</label>
    <input type="password" id="password" name="password" required>

    <!-- Botón para enviar el formulario -->
    <button type="submit">Iniciar Sesión</button>
</form>
