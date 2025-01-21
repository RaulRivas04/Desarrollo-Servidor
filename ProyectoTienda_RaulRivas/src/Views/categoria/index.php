<h3>Listado de Categorías</h3>

<!-- Lista de categorías -->
<ul>
    <!-- Verificar si no hay categorías disponibles -->
    <?php if (empty($categorias)): ?>
        <li>No hay categorías disponibles.</li>
    <?php else: ?>
        <!-- Recorrer y mostrar cada categoría -->
        <?php foreach ($categorias as $categoria): ?>
            <li><?= htmlspecialchars($categoria->getNombre()) ?></li>
        <?php endforeach; ?>
    <?php endif; ?>
</ul>
