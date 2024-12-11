<h1>Detalles de la Ruta</h1>
<p><strong>Título:</strong> <?= $ruta['titulo'] ?></p>
<p><strong>Descripción:</strong> <?= $ruta['descripcion'] ?></p>
<p><strong>Desnivel:</strong> <?= $ruta['desnivel'] ?> m</p>
<p><strong>Distancia:</strong> <?= $ruta['distancia_km'] ?> km</p>

<h2>Comentarios</h2>
<ul>
    <?php foreach ($comentarios as $comentario): ?>
        <li>
            <strong><?= $comentario['nombre_usuario'] ?>:</strong> 
            <?= $comentario['comentario'] ?> 
            <em>(<?= $comentario['fecha'] ?>)</em>
        </li>
    <?php endforeach; ?>
</ul>

<h3>Añadir un comentario</h3>
<form method="post" action="/ruta/comentar/<?= $ruta['id'] ?>">
    <textarea name="comentario" required></textarea>
    <button type="submit">Comentar</button>
</form>
