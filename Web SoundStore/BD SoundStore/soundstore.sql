-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-04-2024 a las 02:49:20
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `soundstore`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos_extras`
--

CREATE TABLE `articulos_extras` (
  `id_articulo` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `marca` varchar(100) NOT NULL,
  `stock` int(11) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `color` varchar(100) NOT NULL,
  `modelo` varchar(100) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `articulos_extras`
--

INSERT INTO `articulos_extras` (`id_articulo`, `nombre`, `marca`, `stock`, `foto`, `color`, `modelo`, `precio`, `fecha_registro`) VALUES
(1, 'pua', 'nice', 15, 'default.png', 'negra', '2015', 200000.00, '2024-03-31 20:48:31'),
(2, 'tecla de piano', 'pope', 3, 'default.png', 'roja', '2002', 100000.00, '2024-03-31 20:49:38');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_compras`
--

CREATE TABLE `historial_compras` (
  `id_historial_compras` int(11) NOT NULL,
  `marca` varchar(100) DEFAULT NULL,
  `id_instrumento` int(11) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `precio_unitario` varchar(200) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `precio_total` varchar(200) DEFAULT NULL,
  `estado` enum('ACTIVA','INACTIVA','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `historial_compras`
--

INSERT INTO `historial_compras` (`id_historial_compras`, `marca`, `id_instrumento`, `nombre`, `precio_unitario`, `cantidad`, `precio_total`, `estado`) VALUES
(1, 'Fender', 1, 'guitarra', '2000000', 2, '4000000', 'ACTIVA'),
(3, 'yamaha', 2, 'bateria', '1200000.00', 1, '1200000.00', 'ACTIVA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_pedidos_ventas`
--

CREATE TABLE `historial_pedidos_ventas` (
  `id_pedido` int(11) NOT NULL,
  `id_instrumento` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `cliente` varchar(100) DEFAULT NULL,
  `producto` varchar(100) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `precio_total` decimal(10,2) DEFAULT NULL,
  `fecha_pedido` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `historial_pedidos_ventas`
--

INSERT INTO `historial_pedidos_ventas` (`id_pedido`, `id_instrumento`, `id_usuario`, `cliente`, `producto`, `direccion`, `cantidad`, `precio_total`, `fecha_pedido`) VALUES
(1, 1, 4, 'juanes', 'guitarra', 'calle 10', 2, 900000.00, '2024-03-31 19:01:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instrumentos`
--

CREATE TABLE `instrumentos` (
  `id_instrumento` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `marca` varchar(100) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `tipo` enum('Guitarra','Bajo','Bateria','Teclado','Viento') DEFAULT NULL,
  `color` varchar(100) DEFAULT NULL,
  `modelo` varchar(100) DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `instrumentos`
--

INSERT INTO `instrumentos` (`id_instrumento`, `nombre`, `marca`, `stock`, `foto`, `tipo`, `color`, `modelo`, `precio`, `fecha_registro`) VALUES
(1, 'Guitarra eléctrica', 'Fender', 5, 'default.png', 'Guitarra', 'madera', '2010', 250000.00, '2024-03-20 22:10:16'),
(2, 'bateria acustica', 'yamaha', 4, 'default.png', 'Bateria', 'azul', '2020', 1500000.00, '2024-03-16 22:15:22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `manteniento`
--

CREATE TABLE `manteniento` (
  `id_mantenimiento` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `tipo_instrumento` varchar(100) DEFAULT NULL,
  `marca` varchar(100) DEFAULT NULL,
  `tiempo` varchar(100) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `estado` enum('Pendiente','En proceso','Terminado') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `cedula` bigint(20) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`cedula`, `nombres`, `apellidos`, `telefono`, `direccion`, `email`) VALUES
(1004, 'juanes', 'marin', '3104', 'calle20', 'juanes@mail.com'),
(10047, 'Esteban', 'arboleda', '333333', 'calle32', 'esteban@mail.com'),
(10785, 'Juan', 'Marin A', '32010', 'calle 10', 'marin@mail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `cedula` bigint(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `tipo` enum('ADMIN','VENDEDOR') NOT NULL,
  `estado` enum('ACTIVO','INACTIVO') NOT NULL DEFAULT 'ACTIVO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `cedula`, `email`, `password`, `tipo`, `estado`) VALUES
(3, 1004, 'juanes@mail.com', '123', 'ADMIN', 'ACTIVO'),
(4, 10047, 'esteban@mail.com', '123', 'VENDEDOR', 'ACTIVO'),
(5, 10785, 'marin@mail.com', '123', 'VENDEDOR', 'ACTIVO');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulos_extras`
--
ALTER TABLE `articulos_extras`
  ADD PRIMARY KEY (`id_articulo`);

--
-- Indices de la tabla `historial_compras`
--
ALTER TABLE `historial_compras`
  ADD PRIMARY KEY (`id_historial_compras`),
  ADD KEY `id_instrumento` (`id_instrumento`);

--
-- Indices de la tabla `historial_pedidos_ventas`
--
ALTER TABLE `historial_pedidos_ventas`
  ADD PRIMARY KEY (`id_pedido`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_instrumento` (`id_instrumento`);

--
-- Indices de la tabla `instrumentos`
--
ALTER TABLE `instrumentos`
  ADD PRIMARY KEY (`id_instrumento`);

--
-- Indices de la tabla `manteniento`
--
ALTER TABLE `manteniento`
  ADD PRIMARY KEY (`id_mantenimiento`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`cedula`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `cedula` (`cedula`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulos_extras`
--
ALTER TABLE `articulos_extras`
  MODIFY `id_articulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `historial_compras`
--
ALTER TABLE `historial_compras`
  MODIFY `id_historial_compras` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `historial_pedidos_ventas`
--
ALTER TABLE `historial_pedidos_ventas`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `instrumentos`
--
ALTER TABLE `instrumentos`
  MODIFY `id_instrumento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `manteniento`
--
ALTER TABLE `manteniento`
  MODIFY `id_mantenimiento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `historial_compras`
--
ALTER TABLE `historial_compras`
  ADD CONSTRAINT `historial_compras_ibfk_1` FOREIGN KEY (`id_instrumento`) REFERENCES `instrumentos` (`id_instrumento`);

--
-- Filtros para la tabla `historial_pedidos_ventas`
--
ALTER TABLE `historial_pedidos_ventas`
  ADD CONSTRAINT `historial_pedidos_ventas_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `historial_pedidos_ventas_ibfk_2` FOREIGN KEY (`id_instrumento`) REFERENCES `instrumentos` (`id_instrumento`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`cedula`) REFERENCES `personas` (`cedula`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
