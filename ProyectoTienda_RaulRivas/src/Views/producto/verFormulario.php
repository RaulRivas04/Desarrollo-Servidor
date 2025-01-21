<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ver Formulario</title>
</head>
<body>
    <h1>Formulario o Productos</h1>
    <ul>
        <?php foreach ($productos as $producto): ?>
            <li><?= htmlspecialchars($producto['nombre']) ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>