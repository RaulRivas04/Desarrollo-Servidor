<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ver Categorías</title>
</head>
<body>
    <h1>Lista de Categorías</h1>

    <!-- Lista de categorías -->
    <ul>
        <!-- Recorrer y mostrar cada categoría -->
        <?php foreach ($categorias as $categoria): ?>
            <li><?= htmlspecialchars($categoria->getNombre()) ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
