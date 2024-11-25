<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Seleccionar Carta</title>
</head>
<body>
    <h1>Selecciona una carta</h1>

    <!-- Formulario para elegir un palo y un número de carta -->
    <form method="POST" action="?controller=baraja&action=mostrarCarta">
        <label for="palo">Elige un palo:</label>
        <select name="palo" id="palo">
            <option value="bastos">Bastos</option>
            <option value="copas">Copas</option>
            <option value="espadas">Espadas</option>
            <option value="oros">Oros</option>
        </select>
        <br>

        <label for="numero">Elige un número:</label>
        <select name="numero" id="numero">
            <?php foreach (range(1, 12) as $numero): ?>
                <option value="<?= $numero ?>"><?= $numero ?></option>
            <?php endforeach; ?>
        </select>
        <br>

        <!-- Botón para enviar el formulario -->
        <button type="submit">Mostrar carta</button>
    </form>

    <a href="../cartas/">Regresar</a>
</body>
</html>
