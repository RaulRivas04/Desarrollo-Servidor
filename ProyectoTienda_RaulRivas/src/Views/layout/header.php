<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Tienda</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>public/css/styles.css">
    <script src="<?= BASE_URL ?>public/js/scripts.js" defer></script>
    <meta name="user-logged-in" content="<?= isset($_SESSION['user']) ? 'true' : 'false' ?>">
</head>
<body>
    <header>
        <h1>Tienda Online Profesional</h1>
        <nav>
            <ul>
                <?php if (isset($_SESSION['user'])): ?>
                    <li><span class="welcome-message">Bienvenido, <strong><?= htmlspecialchars($_SESSION['user']['nombre']) ?></strong></span></li>
                    <li><a href="<?= BASE_URL ?>logout">Cerrar Sesión</a></li>
                    <li><a href="<?= BASE_URL ?>categoria/index">Lista de Categorías</a></li>
                    <li><a href="<?= BASE_URL ?>producto/index">Lista de Productos</a></li>
                    <li><a href="<?= BASE_URL ?>carrito/verCarrito">Carrito</a></li>
                <?php else: ?>
                    <li><a href="<?= BASE_URL ?>">Inicio</a></li>
                    <li><a href="<?= BASE_URL ?>login">Iniciar Sesión</a></li>
                    <li><a href="<?= BASE_URL ?>register">Registrarse</a></li>
                    <li><a href="<?= BASE_URL ?>categoria/index">Categorías</a></li>
                    <li><a href="<?= BASE_URL ?>producto/index">Productos</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>
    <div class="container">