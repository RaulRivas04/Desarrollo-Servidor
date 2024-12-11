<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<section class="search-section">
    <form action="<?php echo BASE_URL; ?>Ruta/buscarRuta" method="GET" class="search-form">
        <div class="form-group">
            <label for="campo">Buscar por:</label>
            <select name="campo" id="campo" class="form-select">
                <option value="titulo" <?php echo (isset($_GET['campo']) && $_GET['campo'] == 'titulo') ? 'selected' : ''; ?>>Título</option>
                <option value="descripcion" <?php echo (isset($_GET['campo']) && $_GET['campo'] == 'descripcion') ? 'selected' : ''; ?>>Descripción</option>
                <option value="desnivel" <?php echo (isset($_GET['campo']) && $_GET['campo'] == 'desnivel') ? 'selected' : ''; ?>>Desnivel</option>
                <option value="distancia" <?php echo (isset($_GET['campo']) && $_GET['campo'] == 'distancia') ? 'selected' : ''; ?>>Distancia</option>
                <option value="dificultad" <?php echo (isset($_GET['campo']) && $_GET['campo'] == 'dificultad') ? 'selected' : ''; ?>>Dificultad</option>
            </select>
        </div>

        <div class="form-group">
            <input type="text" name="buscador" id="buscador" class="form-input" placeholder="Introduce el término de búsqueda" value="<?php echo isset($_GET['buscador']) ? htmlspecialchars($_GET['buscador']) : ''; ?>">
            <?php if (isset($errores['elementoABuscar'])): ?>
                <p class="error-message"><?php echo $errores['elementoABuscar']; ?></p>
            <?php endif; ?>
        </div>

        <button type="submit" class="btn btn-primary">Buscar</button>
    </form>
    <form action="<?php echo BASE_URL; ?>Ruta/listadoCompleto" class="secondary-form">
        <button type="submit" class="btn btn-secondary">Ver Todas las Rutas</button>
    </form>
</section>

<?php if (isset($_SESSION['usuario']) && $_SESSION['usuario']['rol'] === 'admin'): ?>
<section class="admin-actions">
    <form action="<?php echo BASE_URL; ?>Ruta/formularioRuta">
        <button class="btn btn-success">Nueva Ruta</button>
    </form>
    <form action="<?php echo BASE_URL; ?>Usuario/verUsuarios">
        <button class="btn btn-info">Gestionar Usuarios</button>
    </form>
    <form action="<?php echo BASE_URL; ?>Usuario/formularioRegistro">
        <button class="btn btn-warning">Registrar Usuarios</button>
    </form>
</section>
<?php endif; ?>

<section class="routes-list">
    <?php foreach ($rutas as $ruta): ?>
    <article class="route-card">
        <h3><?php echo htmlspecialchars($ruta['titulo']); ?></h3>
        <p><strong>Descripción:</strong> <?php echo htmlspecialchars($ruta['descripcion']); ?></p>
        <p><strong>Desnivel:</strong> <?php echo htmlspecialchars($ruta['desnivel']); ?> m</p>
        <p><strong>Distancia:</strong> <?php echo htmlspecialchars($ruta['distancia']); ?> Km</p>
        <p><strong>Dificultad:</strong> <?php echo htmlspecialchars($ruta['dificultad']); ?></p>
        <p><strong>Notas:</strong> <?php echo htmlspecialchars($ruta['notas']); ?></p>

        <div class="comments-section">
            <h4>Comentarios:</h4>
            <ul>
                <?php foreach ($comentarios as $comentario): ?>
                    <?php if ($comentario['id_ruta'] === $ruta['id']): ?>
                    <li>
                        <strong><?php echo htmlspecialchars($comentario['nombre']); ?>:</strong>
                        <p><?php echo htmlspecialchars($comentario['texto']); ?></p>
                        <small><?php echo htmlspecialchars($comentario['fecha']); ?></small>
                    </li>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>
        </div>

        <div class="actions">
            <?php if (!isset($_SESSION['usuario'])): ?>
                <p class="login-message">Inicia sesión para comentar.</p>
            <?php else: ?>
                <form action="<?php echo BASE_URL; ?>RutaComentario/formularioComentario" method="post">
                    <input type="hidden" name="nombreUsuario" value="<?php echo $_SESSION['usuario']['usuario']; ?>">
                    <input type="hidden" name="idUsuario" value="<?php echo $_SESSION['usuario']['id']; ?>">
                    <input type="hidden" name="idRuta" value="<?php echo htmlspecialchars($ruta['id']); ?>">
                    <button class="btn btn-comment">Comentar</button>
                </form>
            <?php endif; ?>
        </div>
    </article>
    <?php endforeach; ?>
</section>

<section class="routes-summary">
    <?php if (isset($numRutas, $rutaMasLarga)): ?>
        <p>Total de rutas: <?php echo $numRutas; ?></p>
        <p>Ruta más larga: <?php echo $rutaMasLarga; ?> Km</p>
    <?php endif; ?>
</section>

<section class="pagination">
    <?php if (isset($paginacion)) $paginacion->render(); ?>
</section>

<?php if (!isset($_SESSION['usuario'])): ?>
<section class="auth-actions">
    <form action="<?php echo BASE_URL; ?>Usuario/formularioInicioSesion">
        <button class="btn btn-login">Iniciar Sesión</button>
    </form>
    <form action="<?php echo BASE_URL; ?>Usuario/formularioRegistro">
        <button class="btn btn-register">Registrarse</button>
    </form>
</section>
<?php else: ?>
<section class="logout-action">
    <form action="<?php echo BASE_URL; ?>Usuario/logout">
        <button class="btn btn-logout">Cerrar Sesión</button>
    </form>
</section>
<?php endif; ?>
