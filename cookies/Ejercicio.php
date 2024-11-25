<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Inicio de Sesión</title>
    <link rel="stylesheet" href="style.css"> <!-- Enlace al archivo CSS -->
</head>
<body>
    <div class="login-container">
        <form action="login.php" method="post">
            <!-- Campo de Usuario -->
            <label for="username">Usuario</label>
            <input type="text" id="username" name="username" placeholder="Usuario" required>
<br>
<br>
<br>
            <!-- Campo de Contraseña -->
            <label for="password">Clave</label>
            <input type="password" id="password" name="password" placeholder="contraseña" required>
<br>
<br>
<br>
            <!-- Casilla de Recordarme -->
            <div class="checkbox-container">
                <input type="checkbox" id="remember" name="remember">
                <label for="remember">Recordarme en este equipo</label>
            </div>
<br>
<br>
<br>
            <!-- Enlace de Otra Cuenta -->
            <a href="#" class="other-account-link">Iniciar sesión con otra cuenta</a>
<br>
<br>
<br>
            <!-- Botón de Enviar -->
            <button type="submit">Enviar</button>
        </form>
    </div>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $remember = isset($_POST['remember']) ? 'Sí' : 'No';

    //Autenticiacion
    echo "<h3>Datos recibidos:</h3>";
    echo "<p>Usuario: $username</p>";
    echo "<p>Contraseña: $password</p>";
    echo "<p>Recordarme en este equipo: $remember</p>";
}
?>