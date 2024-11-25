<?php

// Configuración básica de conexión
$host = 'localhost';
$dbname = 'mistiendas';
$user = 'admin';
$password = 'admin123';

try {
    // Establecer conexión
    $pdo = new PDO("mysql:host=$host", $user, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ]);
    echo "Conexión establecida.<br>";

    // Crear base de datos y seleccionarla
    $pdo->exec("CREATE DATABASE IF NOT EXISTS $dbname CHARACTER SET utf8 COLLATE utf8_unicode_ci");
    $pdo->exec("USE $dbname");

    // Crear usuario con permisos
    $pdo->exec("CREATE USER IF NOT EXISTS '$user'@'localhost' IDENTIFIED BY '$password'");
    $pdo->exec("GRANT ALL PRIVILEGES ON $dbname.* TO '$user'@'localhost'");

    // Tablas necesarias
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS tiendas (
            cod INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
            nombre VARCHAR(100) NOT NULL,
            tlf VARCHAR(13) NULL
        ) ENGINE=INNODB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
    ");
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS familias (
            cod VARCHAR(6) NOT NULL PRIMARY KEY,
            nombre VARCHAR(200) NOT NULL
        ) ENGINE=INNODB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
    ");
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS productos (
            cod VARCHAR(12) NOT NULL PRIMARY KEY,
            nombre_corto VARCHAR(50) NOT NULL UNIQUE,
            descripcion TEXT NULL,
            PVP DECIMAL(10, 2) NOT NULL,
            familia VARCHAR(6) NOT NULL,
            INDEX (familia)
        ) ENGINE=INNODB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
    ");
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS stock (
            producto VARCHAR(12) NOT NULL,
            tienda INT NOT NULL,
            unidades INT NOT NULL,
            PRIMARY KEY (producto, tienda)
        ) ENGINE=INNODB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
    ");

    // Insertar datos iniciales
    $pdo->exec("
        INSERT INTO tiendas (nombre, tlf) 
        VALUES 
        ('CENTRAL', '600100100'), 
        ('SUCURSAL1', '600100200'), 
        ('SUCURSAL2', NULL)
        ON DUPLICATE KEY UPDATE nombre=VALUES(nombre), tlf=VALUES(tlf);
    ");
    $pdo->exec("
        INSERT INTO familias (cod, nombre) 
        VALUES 
        ('CAMARA', 'Camaras digitales'), 
        ('CONSOL', 'Consolas'), 
        ('EBOOK', 'Libros electronicos'), 
        ('IMPRES', 'Impresoras'), 
        ('MEMFLA', 'Memorias flash')
        ON DUPLICATE KEY UPDATE nombre=VALUES(nombre);
    ");
    $pdo->exec("
        INSERT INTO productos (cod, nombre_corto, descripcion, PVP, familia) 
        VALUES 
        ('3DSNG', 'Nintendo 3DS negro', 'Consola portátil de Nintendo...', 270.00, 'CONSOL')
        ON DUPLICATE KEY UPDATE nombre_corto=VALUES(nombre_corto), descripcion=VALUES(descripcion), PVP=VALUES(PVP), familia=VALUES(familia);
    ");
    $pdo->exec("
        INSERT INTO stock (producto, tienda, unidades) 
        VALUES 
        ('3DSNG', 1, 2), 
        ('3DSNG', 2, 1)
        ON DUPLICATE KEY UPDATE unidades=VALUES(unidades);
    ");

    echo "Estructura y datos iniciales configurados correctamente.<br>";
} catch (PDOException $e) {
    echo "Error en la ejecución: " . $e->getMessage();
}
?>
