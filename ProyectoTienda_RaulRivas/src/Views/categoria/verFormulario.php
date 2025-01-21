<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ver Formulario</title>
</head>
<body>
    <h1>Formulario o Categorías</h1>

    <!-- Lista de categorías -->
    <ul>
        <!-- Recorrer y mostrar cada categoría -->
        <?php foreach ($categorias as $categoria): ?>
            <li><?= htmlspecialchars($categoria['nombre']) ?></li>
        <?php endforeach; ?>
    </ul>
    <link rel="stylesheet" href="<?= BASE_URL ?>public/css/styles.css">
    <script src="<?= BASE_URL ?>public/js/scripts.js" defer></script>
</body>
</html>
