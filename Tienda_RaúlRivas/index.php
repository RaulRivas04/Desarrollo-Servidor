<?php
// Configuración de la base de datos
$host = 'localhost';
$dbname = 'mistiendas';
$user = 'admin'; // Usuario de la base de datos
$pass = 'admin123'; // Contraseña de la base de datos

try {
    // Conexión a la base de datos
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Crear usuario "admin" con contraseña "admin123" (si no existe)
    $passwordHash = password_hash('admin123', PASSWORD_BCRYPT); // Cifrar la contraseña
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM usuarios WHERE username = :username");
    $stmt->execute(['username' => 'admin']);
    $usuarioExiste = $stmt->fetchColumn();

    if (!$usuarioExiste) {
        $stmt = $pdo->prepare("INSERT INTO usuarios (username, password) VALUES (:username, :password)");
        $stmt->execute(['username' => 'admin', 'password' => $passwordHash]);
    }

    // Obtener productos
    $productos = $pdo->query("SELECT cod, nombre_corto FROM productos")->fetchAll(PDO::FETCH_ASSOC);
    $stockPorTiendas = [];
    $productoSeleccionado = $_POST['producto'] ?? null;

    // Consultar stock si se selecciona un producto
    if ($productoSeleccionado) {
        $stmt = $pdo->prepare("
            SELECT tiendas.nombre AS tienda, stock.unidades 
            FROM tiendas 
            INNER JOIN stock ON tiendas.cod = stock.tienda
            WHERE stock.producto = :producto
        ");
        $stmt->execute(['producto' => $productoSeleccionado]);
        $stockPorTiendas = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

} catch (PDOException $e) {
    die("Error en la conexión: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de Productos</title>
    <link rel="stylesheet" href="estilos.css">
</head>

<body>
    <h1>Consulta de Stock por Tiendas</h1>
    
    <!-- Formulario de selección de productos -->
    <form method="POST" action="">
        <label for="producto">Selecciona un producto:</label>
        <select name="producto" id="producto">
            <option value="">--Selecciona un producto--</option>
            <?php foreach ($productos as $producto): ?>
                <option value="<?= htmlspecialchars($producto['cod']) ?>">
                    <?= htmlspecialchars($producto['nombre_corto']) ?>
                </option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Consultar</button>
    </form>

    <!-- Mostrar stock si hay selección -->
    <?php if ($productoSeleccionado): ?>
        <h2>Stock en las tiendas:</h2>
        <?php if (!empty($stockPorTiendas)): ?>
            <table border="1">
                <thead>
                    <tr>
                        <th>Tienda</th>
                        <th>Unidades</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($stockPorTiendas as $stock): ?>
                        <tr>
                            <td><?= htmlspecialchars($stock['tienda']) ?></td>
                            <td><?= htmlspecialchars($stock['unidades']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No hay stock disponible para este producto.</p>
        <?php endif; ?>
    <?php endif; ?>
</body>

</html>
