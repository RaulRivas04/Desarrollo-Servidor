<?php
// Variables
$name = $surname = $email = $phone = $employment = $url = "";
$languages = [];
$errors = "";

// Si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validar nombre y apellidos
    if (empty($_POST["name"])) $errors .= "Nombre requerido.<br>";
    if (empty($_POST["surname"])) $errors .= "Apellidos requeridos.<br>";

    // Validar email
    if (empty($_POST["email"])) {
        $errors .= "Correo requerido.<br>";
    } else {
        if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) $errors .= "Correo inválido.<br>";
    }

    // Validar teléfono
    if (empty($_POST["phone"])) {
        $errors .= "Teléfono requerido.<br>";
    } else {
        if (!preg_match("/^[0-9]{9}$/", $_POST["phone"])) $errors .= "El teléfono debe ser de 9 dígitos.<br>";
    }

    // Validar empleo actual
    if (empty($_POST["employment"])) $errors .= "Selecciona empleo actual.<br>";

    // Validar lenguajes
    if (empty($_POST["languages"])) {
        $errors .= "Selecciona al menos un lenguaje.<br>";
    } else {
        $languages = $_POST["languages"];
    }

    // Validar URL
    if (empty($_POST["url"])) {
        $errors .= "URL requerida.<br>";
    } else {
        if (!filter_var($_POST["url"], FILTER_VALIDATE_URL)) $errors .= "URL inválida.<br>";
    }

    // Si no hay errores, mostrar los datos
    if (empty($errors)) {
        echo "Nombre: " . $_POST["name"] . "<br>";
        echo "Apellidos: " . $_POST["surname"] . "<br>";
        echo "Correo: " . $_POST["email"] . "<br>";
        echo "Teléfono: " . $_POST["phone"] . "<br>";
        echo "Empleo: " . $_POST["employment"] . "<br>";
        echo "Lenguajes: " . implode(", ", $languages) . "<br>";
        echo "URL: " . $_POST["url"] . "<br>";
    }
}
?>

<form method="post">
    Nombre: <input type="text" name="name"><br><br>
    Apellidos: <input type="text" name="surname"><br><br>
    Correo: <input type="text" name="email"><br><br>
    Teléfono: <input type="text" name="phone"><br><br>

    Empleo actual: <br>
    <input type="radio" name="employment" value="sin empleo"> Sin empleo<br>
    <input type="radio" name="employment" value="media jornada"> Media jornada<br>
    <input type="radio" name="employment" value="tiempo completo"> Tiempo completo<br><br>

    Lenguajes que dominas: <br>
    <input type="checkbox" name="languages[]" value="Python"> Python<br>
    <input type="checkbox" name="languages[]" value="PHP"> PHP<br>
    <input type="checkbox" name="languages[]" value="JavaScript"> JavaScript<br>
    <input type="checkbox" name="languages[]" value="Java"> Java<br>
    <input type="checkbox" name="languages[]" value="C++"> C++<br><br>

    URL de trabajos anteriores: <input type="text" name="url"><br><br>

    <input type="submit" value="Enviar">
</form>

<?php
// Mostrar errores
if (!empty($errors)) {
    echo "<strong>Errores:</strong><br>" . $errors;
}
?>
