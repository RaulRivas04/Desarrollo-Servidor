<!-- Formulario para comentar una ruta -->

<h2>Detalles de la Ruta</h2>
<div class="ruta-detalles">
    <div class="ruta-item">
        <strong>Título:</strong> <?php echo $rutaActual["titulo"]; ?>
    </div>
    <div class="ruta-item">
        <strong>Descripción:</strong> <?php echo $rutaActual["descripcion"]; ?>
    </div>
    <div class="ruta-item">
        <strong>Desnivel (m):</strong> <?php echo $rutaActual["desnivel"]; ?>
    </div>
    <div class="ruta-item">
        <strong>Distancia (Km):</strong> <?php echo $rutaActual["distancia"]; ?>
    </div>
    <div class="ruta-item">
        <strong>Dificultad:</strong> <?php echo $rutaActual["dificultad"]; ?>
    </div>
    <div class="ruta-item">
        <strong>Notas:</strong> <?php echo $rutaActual["notas"]; ?>
    </div>
</div>

<h3>Comentarios sobre la Ruta</h3>
<div class="comentarios">
    <?php foreach($comentariosRutaActual as $comentarioRutaActual): ?>
        <div class="comentario">
            <div class="comentario-nombre"><strong><?php echo $comentarioRutaActual["nombre"]; ?></strong></div>
            <div class="comentario-texto"><?php echo $comentarioRutaActual["texto"]; ?></div>
            <div class="comentario-fecha"><?php echo $comentarioRutaActual["fecha"]; ?></div>
        </div>
    <?php endforeach; ?>
</div>

<h2>Deja tu Comentario</h2>
<form action="<?php echo BASE_URL; ?>RutaComentario/añadirComentarioARuta" method="post" class="comentario-form">
    <input type="hidden" name="id_ruta" value="<?php echo $idRuta; ?>">
    <?php if (isset($errores['id_ruta'])): ?>
        <p class="error"><?php echo $errores['id_ruta']; ?></p>
    <?php endif; ?>

    <input type="hidden" name="nombre" value="<?php echo $usuarioActual; ?>">
    <?php if (isset($errores['nombre'])): ?>
        <p class="error"><?php echo $errores['nombre']; ?></p>
    <?php endif; ?>

    <label for="texto">Tu Comentario:</label>
    <textarea name="texto" id="texto" required><?php echo isset($_POST['texto']) ? $_POST['texto'] : ''; ?></textarea><br><br>
    <?php if (isset($errores['texto'])): ?>
        <p class="error"><?php echo $errores['texto']; ?></p>
    <?php endif; ?>

    <input type="hidden" name="fecha" value="<?php echo date("Y-m-d"); ?>">
    <?php if (isset($errores['fecha'])): ?>
        <p class="error"><?php echo $errores['fecha']; ?></p>
    <?php endif; ?>

    <input type="hidden" name="id_usuario" value="<?php echo $idActual; ?>">
    <?php if (isset($errores['id_usuario'])): ?>
        <p class="error"><?php echo $errores['id_usuario']; ?></p>
    <?php endif; ?>

    <input type="submit" value="Comentar">
</form>

<p><a href="<?php echo BASE_URL; ?>">Volver a inicio</a></p>
