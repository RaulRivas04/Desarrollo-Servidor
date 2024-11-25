<?php
require_once 'Animal.php';

// Crear instancias de la clase Coche
$coche1 = new Coche("Ferrari Aventador", "Rojo", "Ferrari", "Aventador");
$coche2 = new Coche("Lamborghini Gallardo", "Verde", "Lamborghini", "Gallardo");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejemplo de Herencia en PHP</title>
</head>
<body>

<h2>Datos del Coche 1</h2>
<p><?= $coche1->describir() ?></p>

<h3>Cambiamos el color del coche a Amarillo</h3>
<?php
$coche1->cambiarColor("Amarillo");
?>
<p>El nuevo color de mi coche es: <?= htmlspecialchars($coche1->color) ?></p>

<h3>Mi coche va a acelerar 4 veces y a frenar una vez.</h3>
<?php
for ($i = 0; $i < 4; $i++) {
    $coche1->acelerar();
}
$coche1->frenar();
?>
<p>Esta es ahora la velocidad del coche: <?= htmlspecialchars($coche1->velocidad) ?> km/h</p>

<h2>Datos del Coche 2</h2>
<p><?= $coche2->describir() ?></p>

</body>
</html>
