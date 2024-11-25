<?php
// Variables
$name = $phone = $email = "";
$errors = "";

// Si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validar nombre
    if (empty($_POST["name"])) {
        $errors .= "Nombre requerido.<br>";
    } else {
        $name = $_POST["name"];
        if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
            $errors .= "Solo letras y espacios en el nombre.<br>";
        }
    }

    // Validar teléfono
    if (empty($_POST["phone"])) {
        $errors .= "Teléfono requerido.<br>";
    } else {
        $phone = $_POST["phone"];
        if (!preg_match("/^[0-9]{9}$/", $phone)) {
            $errors .= "El teléfono debe ser de 9 dígitos.<br>";
        }
    }

    // Validar email
    if (empty($_POST["email"])) {
        $errors .= "Correo requerido.<br>";
    } else {
        $email = $_POST["email"];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors .= "Correo inválido.<br>";
        }
    }

    // Si no hay errores, mostrar los datos
    if (empty($errors)) {
        echo "Nombre: $name<br>";
        echo "Teléfono: $phone<br>";
        echo "Correo: $email<br>";
    }
}
?>

<form method="post">
    Nombre: <input type="text" name="name"><br><br>
    Teléfono: <input type="text" name="phone"><br><br>
    Correo: <input type="text" name="email"><br><br>
    <input type="submit" value="Enviar">
</form>

<?php
// Mostrar errores
if (!empty($errors)) {
    echo "<strong>Errores:</strong><br>" . $errors;
}
?>
