<h1>Iniciar Sesión</h1>
<?php if (isset($mensaje_error)): ?>
    <p style="color: red;"><?= $mensaje_error ?></p>
<?php endif; ?>
<form method="post" action="/usuario/login">
    <label for="nombre_usuario">Nombre de Usuario:</label>
    <input type="text" name="nombre_usuario" id="nombre_usuario" required>
    <br>
    <label for="contraseña">Contraseña:</label>
    <input type="password" name="contraseña" id="contraseña" required>
    <br>
    <button type="submit">Iniciar Sesión</button>
</form>
<p><a href="/usuario/registro">Registrarse</a></p>
