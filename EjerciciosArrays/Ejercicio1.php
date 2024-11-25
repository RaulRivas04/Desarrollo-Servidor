<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alta Alumno</title>
</head>
<body>
    <h1>Alta alumno:</h1>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtener valores del formulario
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $fecha_nacimiento = $_POST['fecha_nacimiento'];
        $email = $_POST['email'];
        $lenguajes = isset($_POST['lenguajes']) ? $_POST['lenguajes'] : [];
        $sabes_web = $_POST['sabes_web'];
        $comentarios = $_POST['comentarios'];
        $contrasena = $_POST['contrasena'];
        $confirmar_contrasena = $_POST['confirmar_contrasena'];

        // Verificar si las contraseñas coinciden
        if ($contrasena !== $confirmar_contrasena) {
            echo "<p style='color:red;'>Las contraseñas no coinciden.</p>";
            exit;
        }

        // Mostrar los datos recibidos
        echo "<h2>Datos recibidos:</h2>";
        echo "<p><strong>Nombre:</strong> $nombre</p>";
        echo "<p><strong>Apellidos:</strong> $apellidos</p>";
        echo "<p><strong>Fecha de Nacimiento:</strong> $fecha_nacimiento</p>";
        echo "<p><strong>Correo Electrónico:</strong> $email</p>";

        // Mostrar lenguajes seleccionados
        echo "<p><strong>Lenguajes de programación conocidos:</strong> " . implode(", ", $lenguajes) . "</p>";

        echo "<p><strong>¿Sabes crear páginas web estáticas?:</strong> $sabes_web</p>";
        echo "<p><strong>Comentarios:</strong> $comentarios</p>";

        // Por motivos de seguridad, no mostramos la contraseña.
        echo "<p><strong>Contraseña:</strong> [Oculta]</p>";
    } else {
    ?>
        <form action="" method="POST">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required><br><br>

            <label for="apellidos">Apellidos:</label>
            <input type="text" id="apellidos" name="apellidos" required><br><br>

            <label for="fecha_nacimiento">Fecha de nacimiento:</label>
            <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" required><br><br>

            <label for="email">Correo Electrónico:</label>
            <input type="email" id="email" name="email" required><br><br>

            <label>¿Qué lenguajes de programación conoces?</label><br>
            <input type="checkbox" name="lenguajes[]" value="C++"> C++<br>
            <input type="checkbox" name="lenguajes[]" value="JavaScript"> JavaScript<br>
            <input type="checkbox" name="lenguajes[]" value="Php"> Php<br>
            <input type="checkbox" name="lenguajes[]" value="Python"> Python<br><br>

            <label>¿Sabes crear páginas web estáticas?:</label><br>
            <input type="radio" name="sabes_web" value="Si" required> Sí
            <input type="radio" name="sabes_web" value="No"> No<br><br>

            <label for="comentarios">Comentarios:</label><br>
            <textarea id="comentarios" name="comentarios"></textarea><br><br>

            <label for="contrasena">Contraseña:</label>
            <input type="password" id="contrasena" name="contrasena" required><br><br>

            <label for="confirmar_contrasena">Repita la contraseña:</label>
            <input type="password" id="confirmar_contrasena" name="confirmar_contrasena" required><br><br>

            <input type="submit" value="Enviar">
        </form>
    <?php
    }
    ?>
</body>
</html>
