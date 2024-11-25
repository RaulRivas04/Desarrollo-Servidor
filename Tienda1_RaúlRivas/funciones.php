<?php

// Obtener todos los productos (código y nombre)
function getProducts() {
    global $pdo;

    // Consulta para seleccionar código y nombre corto
    $query = "SELECT cod, nombre_corto FROM productos";
    return $pdo->query($query)->fetchAll(PDO::FETCH_ASSOC);
}

// Obtener unidades disponibles por producto en cada tienda
function getProductStockByStore($selectedProduct) {
    global $pdo;

    // Preparar la consulta con JOIN entre tiendas y stock
    $sql = "
        SELECT 
            tiendas.nombre AS tienda, 
            stock.unidades 
        FROM 
            tiendas 
        INNER JOIN stock ON tiendas.cod = stock.tienda
        WHERE 
            stock.producto = :producto
    ";
    
    // Ejecutar la consulta pasando el producto seleccionado
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['producto' => $selectedProduct]);

    // Retornar los resultados obtenidos
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>
