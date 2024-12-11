<h1>Lista de Rutas</h1>
<ul>
    <?php foreach ($rutas as $ruta): ?>
        <li><?= $ruta['titulo'] ?> - <?= $ruta['distancia_km'] ?> km</li>
    <?php endforeach; ?>
</ul>
