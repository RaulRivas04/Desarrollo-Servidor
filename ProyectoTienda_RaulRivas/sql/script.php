-- Usuario admin:
-- Nombre de usuario: admin
-- Contraseña: admin
-- Correo: admin@tienda.com

CREATE DATABASE tienda;
SET NAMES UTF8;
CREATE DATABASE IF NOT EXISTS tienda;
USE tienda;

DROP TABLE IF EXISTS usuarios;
CREATE TABLE IF NOT EXISTS usuarios( 
id              int(255) auto_increment not null,
nombre          varchar(100) not null,
apellidos       varchar(255),
email           varchar(255) not null,
password        varchar(255) not null,
rol             varchar(20),
CONSTRAINT pk_usuarios PRIMARY KEY(id),
CONSTRAINT uq_email UNIQUE(email)  
)ENGINE=InnoDb DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Insertar usuario admin
INSERT INTO usuarios (nombre, apellidos, email, password, rol)
VALUES ('admin', '', 'admin@tienda.com', '$2y$10$shTwaDsCNErTPbonhiDzKw.q/gxwcnnGKomclyQGJCu9DZBJKRa6.', 'admin');

DROP TABLE IF EXISTS categorias;
CREATE TABLE IF NOT EXISTS categorias(
id              int(255) auto_increment not null,
nombre          varchar(100) not null,
CONSTRAINT pk_categorias PRIMARY KEY(id) 
)ENGINE=InnoDb DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Insertar categorías
INSERT INTO categorias (nombre) VALUES 
('Electrónica'),
('Ropa'),
('Hogar'),
('Juguetes');

DROP TABLE IF EXISTS productos;
CREATE TABLE IF NOT EXISTS productos(
id              int(255) auto_increment not null,
categoria_id    int(255) not null,
nombre          varchar(100) not null,
descripcion     text,
precio          float(100,2) not null,
stock           int(255) not null,
oferta          varchar(2),
fecha           date not null,
imagen          varchar(255),
CONSTRAINT pk_productos PRIMARY KEY(id),
CONSTRAINT fk_producto_categoria FOREIGN KEY(categoria_id) REFERENCES categorias(id)
)ENGINE=InnoDb DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Insertar productos
INSERT INTO productos (categoria_id, nombre, descripcion, precio, stock, oferta, fecha, imagen) VALUES
(1, 'Smartphone', 'Teléfono inteligente con 128GB', 699.99, 50, 'NO', '2025-01-01', 'smartphone.jpg'),
(1, 'Televisor', 'TV LED de 50 pulgadas', 499.99, 30, 'NO', '2025-01-01', 'televisor.jpg'),
(1, 'Auriculares', 'Auriculares Bluetooth', 59.99, 100, 'SI', '2025-01-01', 'auriculares.jpg'),
(1, 'Laptop', 'Laptop para juegos con 16GB RAM', 1299.99, 20, 'NO', '2025-01-01', 'laptop.jpg'),
(2, 'Camisa', 'Camisa de algodón para hombre', 19.99, 200, 'SI', '2025-01-01', 'camisa.jpg'),
(2, 'Pantalón', 'Pantalón casual para hombre', 39.99, 150, 'NO', '2025-01-01', 'pantalon.jpg'),
(2, 'Vestido', 'Vestido elegante para mujer', 49.99, 100, 'NO', '2025-01-01', 'vestido.jpg'),
(3, 'Sofá', 'Sofá de 3 plazas', 499.99, 10, 'NO', '2025-01-01', 'sofa.jpg'),
(3, 'Mesa', 'Mesa de comedor para 6 personas', 299.99, 15, 'NO', '2025-01-01', 'mesa.jpg'),
(3, 'Lámpara', 'Lámpara de pie moderna', 79.99, 25, 'SI', '2025-01-01', 'lampara.jpg'),
(4, 'Juguete A', 'Juguete educativo para niños', 24.99, 100, 'NO', '2025-01-01', 'juguete_a.jpg'),
(4, 'Juguete B', 'Pelota de plástico', 9.99, 300, 'SI', '2025-01-01', 'juguete_b.jpg'),
(4, 'Juguete C', 'Set de bloques de construcción', 34.99, 50, 'NO', '2025-01-01', 'juguete_c.jpg');

DROP TABLE IF EXISTS pedidos;
CREATE TABLE IF NOT EXISTS pedidos(
id              int(255) auto_increment not null,
usuario_id      int(255) not null,
provincia       varchar(100) not null,
localidad       varchar(100) not null,
direccion       varchar(255) not null,
coste           float(200,2) not null,
estado          varchar(20) not null,
fecha           date,
hora            time,
CONSTRAINT pk_pedidos PRIMARY KEY(id),
CONSTRAINT fk_pedido_usuario FOREIGN KEY(usuario_id) REFERENCES usuarios(id)
)ENGINE=InnoDb DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

DROP TABLE IF EXISTS lineas_pedidos;
CREATE TABLE IF NOT EXISTS lineas_pedidos(
id              int(255) auto_increment not null,
pedido_id       int(255) not null,
producto_id     int(255) not null,
unidades        int(255) not null,
CONSTRAINT pk_lineas_pedidos PRIMARY KEY(id),
CONSTRAINT fk_linea_pedido FOREIGN KEY(pedido_id) REFERENCES pedidos(id),
CONSTRAINT fk_linea_producto FOREIGN KEY(producto_id) REFERENCES productos(id)
)ENGINE=InnoDb DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

DROP TABLE IF EXISTS carrito;
CREATE TABLE IF NOT EXISTS carrito(
id              int(255) auto_increment not null,
usuario_id      int(255) not null,
producto_id     int(255) not null,
cantidad        int(255) not null,
CONSTRAINT pk_carrito PRIMARY KEY(id),
CONSTRAINT fk_carrito_usuario FOREIGN KEY(usuario_id) REFERENCES usuarios(id),
CONSTRAINT fk_carrito_producto FOREIGN KEY(producto_id) REFERENCES productos(id)
)ENGINE=InnoDb DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
