<?php
session_start();

// Comprobar si el usuario ha iniciado sesión
if (!isset($_SESSION['user'])) {
    header('Location: sesion.php');
    exit();
}
require_once 'ajustes.php';
require_once 'funciones.php';

// Inicialización de variables
$selectedProduct = null;
$availabilityResults = [];

// Obtener lista de productos
$products = getProducts();

// Manejar la solicitud del formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $selectedProduct = $_POST['producto'] ?? null;
    if ($selectedProduct) {
        $availabilityResults = getProductStockByStore($selectedProduct);
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Disponibilidad de Productos</title>
</head>
<body>
    <h1>Bienvenido, <?= htmlspecialchars($_SESSION['user']) ?></h1>
    <h2>Selecciona un Producto</h2>

    <form method="POST">
        <label for="producto">Producto:</label>
        <select name="producto" id="producto" required>
            <option value="" disabled selected>Elige un producto</option>
            <?php foreach ($products as $product): ?>
                <option value="<?= htmlspecialchars($product['cod']) ?>">
                    <?= htmlspecialchars($product['nombre_corto']) ?>
                </option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Ver Unidades</button>
    </form>

    <!-- Mostrar resultados de disponibilidad si se seleccionó un producto -->
    <?php if (!empty($availabilityResults)): ?>
        <h2>Unidades Disponibles</h2>
        <table border="1">
            <thead>
                <tr>
                    <th>Tienda</th>
                    <th>Unidades</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($availabilityResults as $row): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['tienda']) ?></td>
                        <td><?= htmlspecialchars($row['unidades']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php elseif ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
        <p>No hay unidades disponibles para este producto.</p>
    <?php endif; ?>

</body>
</html>