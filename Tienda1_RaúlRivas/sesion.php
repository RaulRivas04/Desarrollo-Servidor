<?php
session_start();

// Cerrar sesión si hay una sesión activa
if (isset($_SESSION['user'])) {
    session_unset();
    session_destroy();
}

// Verificar si el formulario fue enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['usuario'] ?? '';
    $password = $_POST['password'] ?? '';

    // Comprobar las credenciales
    if ($username === 'admin' && $password === 'admin123') {
        $_SESSION['user'] = $username;
        header('Location: index.php');
        exit();
    } else {
        $errorMessage = "Credenciales incorrectas";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Acceso al sistema</h1>
    <?php if (isset($errorMessage)): ?>
        <p style="color: red;"><?= htmlspecialchars($errorMessage) ?></p>
    <?php endif; ?>
    <form method="POST">
        <label for="usuario">Nombre de usuario:</label>
        <input type="text" id="usuario" name="usuario" required>
        <br>
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <button type="submit">Acceder</button>
    </form>
</body>
</html>
