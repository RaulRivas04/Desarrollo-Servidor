<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultados del Reparto</title>
</head>
<body>
    <h1>Resultados del Reparto</h1>

    <!-- Mostrar las cartas de cada jugador -->
    <?php foreach ($reparto as $indiceJugador => $cartasDelJugador): ?>
        <section>
            <h2>Jugador <?= $indiceJugador + 1 ?></h2>
            <div style="display: flex; gap: 10px;">
                <?php foreach ($cartasDelJugador as $carta): ?>
                    <img 
                        src="assets/<?= $carta ?>.jpg" 
                        alt="Carta <?= $carta ?>" 
                        style="width: 100px; height: auto;">
                <?php endforeach; ?>
            </div>
        </section>
    <?php endforeach; ?>

    <!-- Enlace para regresar -->
    <a href="../cartas/">Regresar</a>
</body>
</html>
