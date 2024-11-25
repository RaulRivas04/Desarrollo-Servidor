<?php
class Coche {
    public $color = "Rojo";
    public $marca = "Ferrari";
    public $modelo = "Aventador";
    public $velocidad = 300;
    public $caballos = 500;
    public $plazas = 2;

    public function __construct($color = "Blanco", $marca = "Genérica", $modelo = "Estándar", $caballos = 100, $plazas = 5) {
        $this->color = $color;
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->caballos = $caballos;
        $this->plazas = $plazas;
    }

    public function acelerar() {
        $this->velocidad++;
    }

    public function frenar() {
        if ($this->velocidad > 0) {
            $this->velocidad--;
        }
    }

    public function cambiarColor($nuevoColor) {
        $this->color = $nuevoColor;
    }
}

// Crear un coche con valores por defecto
$coche1 = new Coche();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejemplo de Clase Coche</title>
</head>
<body>

<h2>Datos del coche</h2>
<ul>
    <li>Marca: <?php echo $coche1->marca; ?></li>
    <li>Modelo: <?php echo $coche1->modelo; ?></li>
    <li>Color: <?php echo $coche1->color; ?></li>
    <li>Velocidad: <?php echo $coche1->velocidad; ?></li>
    <li>Caballos: <?php echo $coche1->caballos; ?></li>
    <li>Plazas: <?php echo $coche1->plazas; ?></li>
</ul>

<h3>Cambiamos el color del coche y lo ponemos amarillo</h3>
<?php
$coche1->cambiarColor("Amarillo");
?>
<p>El nuevo color de mi coche es: <?php echo $coche1->color; ?></p>

<h3>Mi coche va a acelerar 4 veces y a frenar una vez.</h3>
<?php
for ($i = 0; $i < 4; $i++) {
    $coche1->acelerar();
}
$coche1->frenar();
?>
<p>Ésta es ahora la velocidad del coche: <?php echo $coche1->velocidad; ?></p>

<h3>Creamos un nuevo coche su color será VERDE y el modelo GALLARDO</h3>
<?php
$coche2 = new Coche("Verde", "Ferrari", "Gallardo", 500, 2);
?>

<h2>Datos del NUEVO coche</h2>
<ul>
    <li>Marca: <?php echo $coche2->marca; ?></li>
    <li>Modelo: <?php echo $coche2->modelo; ?></li>
    <li>Color: <?php echo $coche2->color; ?></li>
    <li>Velocidad: <?php echo $coche2->velocidad; ?></li>
    <li>Caballos: <?php echo $coche2->caballos; ?></li>
    <li>Plazas: <?php echo $coche2->plazas; ?></li>
</ul>

</body>
</html>
