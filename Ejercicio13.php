<?php
// Evita que la página se almacene en caché
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

// Refresca automáticamente cada 10 segundos
header("Refresh: 10");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página con actualización automática</title>
</head>
<body>
    <h1>Página con actualización automática</h1>
    <p>Esta página se refrescará cada 10 segundos.</p>
    <p>Hora actual del servidor: <?php echo date("H:i:s"); ?></p>
</body>
</html>
