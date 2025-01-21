<?php
// Incluye el encabezado
require_once __DIR__ . '/layout/header.php';
?>

<!-- Contenido principal -->
<div class="container">
    <h1>¡Bienvenido/a a ShopRivas!</h1>
    <p>
        Descubre una experiencia de compras única, donde encontrarás una amplia variedad de productos al mejor precio. 
        En ShopRivas, nuestra misión es ofrecerte calidad, confianza y una atención excepcional.
    </p>

    <!-- Sección destacada -->
    <div class="highlights">
        <h2>¿Por qué elegir ShopRivas?</h2>
        <ul>
            <li> Productos de alta calidad seleccionados para ti.</li>
            <li> Ofertas exclusivas y descuentos irresistibles.</li>
            <li> Envío rápido y seguro a cualquier parte.</li>
            <li> Soporte al cliente 24/7 para atender todas tus dudas.</li>
        </ul>
    </div>

    <!-- Llamado a la acción -->
    <div class="cta">
        <h3>¡Comienza tu experiencia de compra ahora!</h3>
        <p>Explora nuestras categorías, añade tus productos favoritos al carrito y disfruta de un proceso de pago rápido y seguro.</p>
        <a href="<?= BASE_URL ?>producto/index" class="button">Ver Productos</a>
    </div>
</div>
<link rel="stylesheet" href="<?= BASE_URL ?>public/css/styles.css">


<?php
// Incluye el pie de página
require_once __DIR__ . '/layout/footer.php';
?>
