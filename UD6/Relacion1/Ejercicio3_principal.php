<?php
try {
    require_once 'Ejercicio3_Animal.php';
    require_once 'Ejercicio3_perro.php'; // Carga la clase Perro, que hereda de Animal
} catch (Exception $e) {
    die("Error al cargar las clases: " . $e->getMessage());
}

// Crear el primer objeto Perro llamado labrador
$labrador = new Perro("grande", "Labrador", "amarillo", "Max");
echo "<h2>Propiedades del primer perro (Labrador):</h2>";
$labrador->mostrar_propiedades();
$labrador->speak();

// Intentar cambiar el nombre usando el setter y verificar si fue exitoso
$nombre_actualizado = $labrador->set_nombre("Luna");
echo $nombre_actualizado ? "Nombre actualizado correctamente<br>" : "Nombre no modificado<br>";

// Crear un segundo objeto Perro llamado caniche
$caniche = new Perro("pequeño", "Caniche", "blanco", "Coco");
echo "<h2>Propiedades del segundo perro (Caniche):</h2>";
$caniche->mostrar_propiedades();
$caniche->speak();

// Intentar asignar un nombre inválido (demasiado largo) y verificar el resultado
$nombre_actualizado = $caniche->set_nombre("NombreExcesivamenteLargoParaUnPerro");
echo $nombre_actualizado ? "Nombre actualizado correctamente<br>" : "Nombre no modificado<br>";
?>
