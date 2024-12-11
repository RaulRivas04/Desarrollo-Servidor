-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-12-2024 a las 10:40:09
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `senderismo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rutas`
--

CREATE TABLE `rutas` (
  `id` int(11) NOT NULL,
  `titulo` varchar(55) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `desnivel` int(10) UNSIGNED DEFAULT NULL,
  `distancia` double DEFAULT NULL,
  `notas` text DEFAULT NULL,
  `dificultad` enum('baja','media','alta') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `rutas`
--

INSERT INTO `rutas` (`id`, `titulo`, `descripcion`, `desnivel`, `distancia`, `notas`, `dificultad`) VALUES
(1, 'Ruta del Sol', 'Un recorrido tranquilo por caminos soleados.', 200, 10.5, 'Recomendado llevar protector solar.', 'baja'),
(2, 'Sendero del Bosque Encantado', 'Caminos llenos de magia y naturaleza.', 400, 12.3, 'Ideal para fotógrafos de naturaleza.', 'media'),
(3, 'Subida al Pico Alto', 'Desafiante pero con vistas espectaculares.', 1000, 8.7, 'Solo para expertos.', 'alta'),
(4, 'La Vuelta al Lago', 'Un paseo alrededor de un hermoso lago.', 50, 5.2, 'Perfecto para principiantes.', 'baja');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rutas_comentarios`
--

CREATE TABLE `rutas_comentarios` (
  `id` smallint(6) NOT NULL,
  `id_ruta` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `texto` text DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `usuarioID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `rutas_comentarios`
--

INSERT INTO `rutas_comentarios` (`id`, `id_ruta`, `nombre`, `texto`, `fecha`, `usuarioID`) VALUES
(1, 1, 'Carlos', 'Muy agradable y fácil de completar. Ideal para toda la familia.', '2024-12-05', 1),
(2, 2, 'Ana', 'Un lugar mágico. Volveré pronto.', '2024-12-06', 2),
(3, 3, 'Luis', 'Duro, pero las vistas en la cima lo valen.', '2024-12-07', 3),
(4, 4, 'Marta', 'Tranquilo y relajante, ideal para desconectar.', '2024-12-08', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `usuario` varchar(50) NOT NULL,
  `contraseña` varchar(255) NOT NULL,
  `rol` enum('admin','usur') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellidos`, `correo`, `direccion`, `telefono`, `fecha_nacimiento`, `usuario`, `contraseña`, `rol`) VALUES
(1, 'Carlos', 'Martínez López', 'carlos.martinez@example.com', 'Av. Principal 123', '123456789', '1990-05-15', 'cmartinez', '$2y$10$YFGW1rHkGcH9D4mlG8Ig6ufBjBnciT3AtKvXnT08IzvN1H6/iaQgK', 'admin'),
(2, 'Ana', 'Gómez Rodríguez', 'ana.gomez@example.com', 'Calle Secundaria 45', '987654321', '1995-10-30', 'anagomez', '$2y$10$kPjaV8E6prA8e4ysW3TnuOjrbXf6SYDlwum0RRBKN8j2P5i1bML4W', 'usur'),
(3, 'Luis', 'Pérez Torres', 'luis.perez@example.com', 'Plaza Mayor 78', '654321987', '1988-07-20', 'lperez', '$2y$10$O1zCt9KnrlQJizKw/s9npeUpqDqKj0zZXH7bmvC8XbIWGcNYzA.z6', 'usur'),
(4, 'Marta', 'Fernández García', 'marta.fernandez@example.com', 'Callejón del Sol 12', '123123123', '1992-03-10', 'mfernandez', '$2y$10$MBjltONtVCuX.nRf9H8l.u6odTVOcQzg.j8LtRWK.LT/1GJoZ15lG', 'usur');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `rutas`
--
ALTER TABLE `rutas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `rutas_comentarios`
--
ALTER TABLE `rutas_comentarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_ruta` (`id_ruta`),
  ADD KEY `usuarioID` (`usuarioID`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `correo` (`correo`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `rutas`
--
ALTER TABLE `rutas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `rutas_comentarios`
--
ALTER TABLE `rutas_comentarios`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `rutas_comentarios`
--
ALTER TABLE `rutas_comentarios`
  ADD CONSTRAINT `rutas_comentarios_ibfk_1` FOREIGN KEY (`id_ruta`) REFERENCES `rutas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `rutas_comentarios_ibfk_2` FOREIGN KEY (`usuarioID`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
