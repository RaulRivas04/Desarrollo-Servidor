<?php
class Coche {
    // Promoción de propiedades en el constructor
    public function __construct(
        public string $color,
        public string $marca,
        public string $modelo,
        public int $caballos = 500,
        public int $plazas = 4
    ) {
        // Inicializar la velocidad
        $this->velocidad = 0;
    }

    public int $velocidad;

    // Método para acelerar (incrementa la velocidad en 1)
    public function acelerar(): void {
        $this->velocidad++;
    }

    // Método para frenar (reduce la velocidad en 1)
    public function frenar(): void {
        if ($this->velocidad > 0) {
            $this->velocidad--;
        }
    }

    // Método para cambiar el color del coche
    public function cambiarColor(string $nuevoColor): void {
        $this->color = $nuevoColor;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejemplo de Clase Coche con Constructor Promovido</title>
</head>
<body>

<?php
// Crear un coche con valores de color, marca y modelo
$coche1 = new Coche("Rojo", "Ferrari", "Aventador");
?>

<h2>Datos del Coche 1</h2>
<ul>
    <li>Marca: <?= htmlspecialchars($coche1->marca) ?></li>
    <li>Modelo: <?= htmlspecialchars($coche1->modelo) ?></li>
    <li>Color: <?= htmlspecialchars($coche1->color) ?></li>
    <li>Velocidad: <?= htmlspecialchars($coche1->velocidad) ?> km/h</li>
    <li>Caballos: <?= htmlspecialchars($coche1->caballos) ?> HP</li>
    <li>Plazas: <?= htmlspecialchars($coche1->plazas) ?></li>
</ul>

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

<h3>Creamos un nuevo coche: Color VERDE y Modelo GALLARDO</h3>
<?php
$coche2 = new Coche("Verde", "Ferrari", "Gallardo");
?>

<h2>Datos del Coche 2</h2>
<ul>
    <li>Marca: <?= htmlspecialchars($coche2->marca) ?></li>
    <li>Modelo: <?= htmlspecialchars($coche2->modelo) ?></li>
    <li>Color: <?= htmlspecialchars($coche2->color) ?></li>
    <li>Velocidad: <?= htmlspecialchars($coche2->velocidad) ?> km/h</li>
    <li>Caballos: <?= htmlspecialchars($coche2->caballos) ?> HP</li>
    <li>Plazas: <?= htmlspecialchars($coche2->plazas) ?></li>
</ul>

</body>
</html>
