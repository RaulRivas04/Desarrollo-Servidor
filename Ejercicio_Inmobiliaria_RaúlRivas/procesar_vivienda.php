<?php
$errores = [];

// Validaciones de campos obligatorios
foreach (['tipo', 'zona', 'direccion', 'dormitorios'] as $campo) {
    if (empty($_POST[$campo])) $errores["error_$campo"] = 1;
}

// Validaciones específicas
if (empty($_POST['precio']) || !is_numeric($_POST['precio'])) $errores['error_precio'] = 1;
if (empty($_POST['tamano']) || !is_numeric($_POST['tamano'])) $errores['error_tamano'] = 1;
if (isset($_FILES['foto']) && $_FILES['foto']['size'] > 102400) $errores['error_foto'] = 1;

if ($errores) {
    header("Location: Inmobiliaria.php?" . http_build_query($errores));
    exit;
}

// Configuración de ganancias
$ganancias = [
    "Centro" => [0.30, 0.35],
    "Zaidín" => [0.25, 0.28],
    "Chana" => [0.20, 0.25],
    "Albaicín" => [0.25, 0.30],
    "Sacromonte" => [0.22, 0.25],
    "Realejo" => [0.28, 0.30]
];

// Obtener datos
$tipo = $_POST['tipo'];
$zona = $_POST['zona'];
$direccion = $_POST['direccion'];
$dormitorios = $_POST['dormitorios'];
$precio = (float)$_POST['precio'];
$tamano = (float)$_POST['tamano'];
$extras = isset($_POST['extras']) ? implode(", ", $_POST['extras']) : "Ninguno";
$observaciones = $_POST['observaciones'] ?? '';

// Manejo de la foto
$foto_nombre = "";
if (isset($_FILES['foto']) && $_FILES['foto']['size'] <= 102400) {
    $directorio = "fotos/";
    if (!file_exists($directorio)) mkdir($directorio, 0777, true);
    $foto_nombre = $directorio . basename($_FILES['foto']['name']);
    move_uploaded_file($_FILES['foto']['tmp_name'], $foto_nombre);
}

// Calcular beneficio y guardar datos
$beneficio = $precio * $ganancias[$zona][$tamano <= 100 ? 0 : 1];
$archivo = fopen("viviendas.txt", "a");
if ($archivo) {
    $datos = "Tipo: $tipo\nZona: $zona\nDirección: $direccion\nDormitorios: $dormitorios\nPrecio: $precio €\n" .
             "Tamaño: $tamano m²\nExtras: $extras\nFoto: " . ($foto_nombre ? basename($foto_nombre) : "No hay foto") . "\n" .
             "Observaciones: $observaciones\nBeneficio: " . number_format($beneficio, 2) . " €\n\n";
    fwrite($archivo, $datos);
    fclose($archivo);
}

// Mostrar confirmación
echo "<h2>Inserción de vivienda</h2>";
echo "<p><strong>Tipo:</strong> $tipo</p>";
echo "<p><strong>Zona:</strong> $zona</p>";
echo "<p><strong>Dirección:</strong> $direccion</p>";
echo "<p><strong>Dormitorios:</strong> $dormitorios</p>";
echo "<p><strong>Precio:</strong> $precio €</p>";
echo "<p><strong>Tamaño:</strong> $tamano m²</p>";
echo "<p><strong>Extras:</strong> $extras</p>";
if ($foto_nombre) echo "<p><strong>Foto:</strong> <a href='$foto_nombre' target='_blank'>" . basename($foto_nombre) . "</a></p>";
echo "<p><strong>Observaciones:</strong> $observaciones</p>";
echo "<p><strong>Beneficio:</strong> " . number_format($beneficio, 2) . " €</p>";
echo "<p><a href='Inmobiliaria.php'>[ Insertar otra vivienda ]</a></p>";
?>
