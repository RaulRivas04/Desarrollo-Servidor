<?php
session_start();

require 'funcionesBrisca.php';

// Comprobación de formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Creación de la baraja
    $baraja = crearBaraja();

    // Repartimos cartas
    list($cartasJugador, $bazaJugador) = repartirCartas($baraja);

    // Calculamos los puntos totales de la baza
    $totalPuntos = calcularPuntos($bazaJugador);

    // Guardamos los resultados en la sesión
    $_SESSION['cartasJugadorHTML'] = mostrarCartasConImagen($cartasJugador);
    $_SESSION['bazaJugadorHTML'] = mostrarCartasConImagen($bazaJugador);
    $_SESSION['totalPuntos'] = $totalPuntos;

    // Mostrar los resultados
    header("Location: brisca.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados del Juego de Brisca</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h1 {
            color: #333;
        }
        ul {
            padding: 0;
        }
    </style>
</head>
<body>
    <h1>Resultados del Juego de Brisca</h1>

    <?php if (isset($_SESSION['cartasJugadorHTML']) && isset($_SESSION['bazaJugadorHTML']) && isset($_SESSION['totalPuntos'])): ?>
        <h2>Tus Cartas:</h2>
        <?php echo $_SESSION['cartasJugadorHTML']; ?>

        <h2>Baza del Jugador (10 cartas):</h2>
        <?php echo $_SESSION['bazaJugadorHTML']; ?>

        <h2>Puntos Totales en la Baza:</h2>
        <p><?php echo $_SESSION['totalPuntos']; ?> puntos</p>

        <?php
        // Limpiar los resultados de la sesión
        unset($_SESSION['cartasJugadorHTML']);
        unset($_SESSION['bazaJugadorHTML']);
        unset($_SESSION['totalPuntos']);
        ?>
    <?php else: ?>
        <p>No hay resultados para mostrar. Por favor, juega primero.</p>
    <?php endif; ?>

    <form action="brisca.php" method="POST">
        <button type="submit">Repartir Nuevas Cartas</button>
    </form>
</body>
</html>
