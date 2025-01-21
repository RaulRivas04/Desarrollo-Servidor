<?php if (isset($_SESSION['user']) && $_SESSION['user']['rol'] === 'admin'): ?>
    <a href="<?= BASE_URL ?>categoria/index"><button>Mostrar Categorías</button></a>
    <a href="<?= BASE_URL ?>producto/index"><button>Mostrar Productos</button></a>
<?php endif; ?>
