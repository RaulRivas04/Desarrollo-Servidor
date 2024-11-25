<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Distribuir Cartas</title>
</head>
<body>
    <h1>Definir parámetros para el reparto</h1>

    <!-- Formulario para configurar el reparto de cartas -->
    <form method="POST" action="?controller=baraja&action=repartir">
        <label for="jugadores">Cantidad de jugadores:</label>
        <input type="number" id="jugadores" name="jugadores" min="2" max="10" required>
        <br>

        <label for="cartas">Cartas por jugador:</label>
        <input type="number" id="cartas" name="cartas" min="1" max="12" required>
        <br>

        <button type="submit">Distribuir cartas</button>
    </form>

    <a href="../cartas/">Regresar</a>
</body>
</html>
