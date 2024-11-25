<?php
try {
    require_once 'Ejercicio4_perro.php'; // Incluir la clase Perro
} catch (Exception $e) {
    die("Error al cargar la clase Perro: " . $e->getMessage());
}

// Crear un objeto de la clase Perro llamado labrador
$labrador = new Perro("grande", "Labrador", "amarillo", "Max");
echo "<h2>Propiedades del primer perro (Labrador):</h2>";
$labrador->mostrar_propiedades();
$labrador->speak();

// Intentar cambiar el nombre usando el setter y verificar si fue exitoso
$perro_error_message = $labrador->set_nombre("Luna");
echo $perro_error_message ? "Nombre actualizado correctamente<br>" : "Nombre no modificado<br>";

// Crear un segundo objeto llamado caniche
$caniche = new Perro("pequeño", "Caniche", "blanco", "Coco");
echo "<h2>Propiedades del segundo perro (Caniche):</h2>";
$caniche->mostrar_propiedades();
$caniche->speak();

// Intentar asignar un nombre inválido (demasiado largo) y verificar el resultado
$perro_error_message = $caniche->set_nombre("NombreExcesivamenteLargoParaUnPerro");
echo $perro_error_message ? "Nombre actualizado correctamente<br>" : "Nombre no modificado<br>";
?>
