<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>
<body>
    <h1>Registro de Usuario</h1>
    <?php if (isset($error)): ?>
        <p style="color: red;"><?= $error ?></p>
    <?php endif; ?>
    <form method="POST" action="/usuarios/register">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required>
        <label for="username">Usuario:</label>
        <input type="text" name="username" required>
        <label for="password">Contraseña:</label>
        <input type="password" name="password" required>
        <button type="submit">Registrarse</button>
    </form>
    <a href="/usuarios/login">Volver al login</a>
</body>
</html>
