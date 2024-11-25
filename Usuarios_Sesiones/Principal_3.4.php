<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: Actividad3.4.php?redirigido=true");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Página principal</title>
</head>
<body>
    <h1>Bienvenido, <?php echo htmlspecialchars($_SESSION['usuario']); ?></h1>
    <a href="logout.php">Salir</a>
</body>
</html>
