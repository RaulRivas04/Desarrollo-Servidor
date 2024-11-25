<?php
// Iniciar la sesión
session_start();

// Verificar si se han enviado datos de usuario y contraseña
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Aquí defines el usuario y contraseña que quieres comprobar
    $usuario_valido = "usuario";
    $contrasena_valida = "1234";

    // Comparar con los valores ingresados
    if ($_POST['usuario'] === $usuario_valido && $_POST['contrasena'] === $contrasena_valida) {
        // Si son correctos, guarda el usuario en la sesión y redirige
        $_SESSION['usuario'] = $_POST['usuario'];
        header("Location: Principal_3.4.php");
        exit();
    } else {
        // Si no son correctos, muestra un error
        $error = "Usuario o contraseña incorrectos";
    }
}
?>

<!-- Formulario de login -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario de login</title>
</head>
<body>
    <?php if (isset($error)) echo "<p>$error</p>"; ?>
    <form method="POST" action="login.php">
        <label>Usuario: <input type="text" name="usuario" required></label><br>
        <label>Contraseña: <input type="password" name="contrasena" required></label><br>
        <button type="submit">Iniciar sesión</button>
    </form>
</body>
</html>
