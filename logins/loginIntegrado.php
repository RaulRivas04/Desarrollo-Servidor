<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Procesar el formulario enviado
    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];

    // Verificar usuario y clave correctos
    if ($usuario === "usuario" && $clave === "1234") {
        // Redirigir a la página de bienvenida
        header("Location: bienvenida.php");
        exit;
    } else {
        // Redirigir a la página de error
        header("Location: error.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Integrado</title>
</head>
<body>
    <h1>Iniciar sesión</h1>
    
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <label for="usuario">Usuario:</label>
        <input type="text" id="usuario" name="usuario" required><br><br>

        <label for="clave">Contraseña:</label>
        <input type="password" id="clave" name="clave" required><br><br>

        <input type="submit" value="Iniciar sesión">
    </form>
</body>
</html>
