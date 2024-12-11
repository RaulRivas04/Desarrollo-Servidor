<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
</head>
<body>
    <h1>Iniciar Sesión</h1>
    <?php if (isset($error)): ?>
        <p style="color: red;"><?= $error ?></p>
    <?php endif; ?>
    <form method="POST" action="/usuarios/login">
        <label for="username">Usuario:</label>
        <input type="text" name="username" required>
        <label for="password">Contraseña:</label>
        <input type="password" name="password" required>
        <button type="submit">Ingresar</button>
    </form>
    <a href="/usuarios/register">Registrarse</a>
</body>
</html>
