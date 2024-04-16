-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-04-2024 a las 18:10:04
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
  `tipo` enum('Pua','Baquetas','Tecladepiano','Amplificador') NOT NULL,
  `color` varchar(100) NOT NULL,
  `modelo` varchar(100) NOT NULL,
  `precio` varchar(200) NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `estado` enum('ACTIVO','INACTIVO') NOT NULL DEFAULT 'ACTIVO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `articulos_extras`
--

INSERT INTO `articulos_extras` (`id_articulo`, `nombre`, `marca`, `stock`, `foto`, `tipo`, `color`, `modelo`, `precio`, `fecha_registro`, `estado`) VALUES
(25, 'Pua', 'nice', 12, 'puas.png', 'Pua', 'roja', '2012', '200000.00', '2024-04-12 14:30:34', 'ACTIVO'),
(27, 'parlante', 'yim', 10, 'ventas.jpg', 'Amplificador', 'naranja', '2008', '150000.00', '2024-04-12 15:25:28', 'ACTIVO'),
(29, 'sonido', 'LG', 8, 'parlante.webp', 'Pua', 'azul', '2009', '1000.00', '0000-00-00 00:00:00', 'ACTIVO'),
(30, 'parlante', 'marshall', 10, 'amplificador.png', 'Amplificador', 'negro', '2020', '100000', '2024-04-12 15:33:04', 'ACTIVO'),
(31, 'Amplificador', 'Sony', 10, 'amplificador.png', 'Amplificador', 'Negro', '2008', '2500000', '2024-04-12 15:53:09', 'INACTIVO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_compras`
--

CREATE TABLE `historial_compras` (
  `id_historial_compras` int(11) NOT NULL,
  `marca` varchar(100) DEFAULT NULL,
  `id_instrumento` int(11) DEFAULT NULL,
  `id_usuario` int(10) NOT NULL,
  `img_instrumento` varchar(500) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `precio_unitario` varchar(200) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `precio_total` varchar(200) DEFAULT NULL,
  `estado` enum('ACTIVO','INACTIVO') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `historial_compras`
--

INSERT INTO `historial_compras` (`id_historial_compras`, `marca`, `id_instrumento`, `id_usuario`, `img_instrumento`, `nombre`, `precio_unitario`, `cantidad`, `precio_total`, `estado`) VALUES
(1, 'Prueba', 1, 4, 'bajo_electrico.png', 'guitarra electrica', '1000000', 5, '5000000', ''),
(3, 'yamaha', 2, 4, 'bateria_acustica.png', 'bateria', '1500000', 2, '3000000', 'ACTIVO'),
(4, 'Fender', NULL, 4, 'guitarra_electrica.png', 'Guitarra eléctrica', '250000.00', 1, '250000.0', 'ACTIVO'),
(5, 'yamaha', NULL, 1, 'bateria_electrica.png', 'bateria electrica', '1500000.00', 3, '4500000.0', 'ACTIVO'),
(6, 'LG', NULL, 7, 'http://10.199.144.234/soundstore/dist/img/puas.png', 'sonido', '1000.00', 5, '5000.0', 'ACTIVO'),
(7, 'Fender', NULL, 2, 'http://10.199.144.234/soundstore/dist/img/guitarra_electrica.png', 'Guitarra eléctrica', '250000.00', 2, '500000.0', ''),
(8, 'yamaha', NULL, 4, 'http://10.199.144.234/soundstore/dist/img/bateria_electrica.png', 'bateria electrica', '1500000.00', 2, '3000000.0', ''),
(9, 'pian', NULL, 9, 'http://10.199.144.234/soundstore/dist/img/piano2.png', 'piano acustico', '1200000.00', 2, '2400000.0', ''),
(10, 'Sony', NULL, 9, 'http://10.199.144.234/soundstore/dist/img/amplificador.png', 'Amplificador', '2500000', 1, '2500000.0', ''),
(11, 'Fender', NULL, 9, 'http://10.199.144.234/soundstore/dist/img/guitarra_electrica.png', 'Guitarra eléctrica', '250000.00', 2, '500000.0', '');

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
  `precio_total` varchar(200) DEFAULT NULL,
  `fecha_pedido` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `estado` enum('ACTIVO','INACTIVO') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `historial_pedidos_ventas`
--

INSERT INTO `historial_pedidos_ventas` (`id_pedido`, `id_instrumento`, `id_usuario`, `cliente`, `producto`, `direccion`, `cantidad`, `precio_total`, `fecha_pedido`, `estado`) VALUES
(1, 1, 4, 'juan Esteban', 'guitarra acustica', 'calle sena', 2, '9000000', '2024-04-12 15:48:10', ''),
(2, 6, 4, 'Esteban', 'Baterias electrica', 'calle 12', 1, '1800000', '2024-04-11 18:26:45', 'ACTIVO'),
(3, 5, 5, 'Juanes', 'flauta', 'calle30', 3, '60000', '2024-04-12 13:54:20', 'INACTIVO');

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
  `precio` varchar(200) DEFAULT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `estado` enum('ACTIVO','INACTIVO') NOT NULL DEFAULT 'ACTIVO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `instrumentos`
--

INSERT INTO `instrumentos` (`id_instrumento`, `nombre`, `marca`, `stock`, `foto`, `tipo`, `color`, `modelo`, `precio`, `fecha_registro`, `estado`) VALUES
(1, 'Guitarra eléctrica', 'Fender', 5, 'guitarra_electrica.png', 'Guitarra', 'madera', '2020', '250000.00', '2024-03-21 19:13:53', 'ACTIVO'),
(2, 'bateria electrica', 'yamaha', 2, 'bateria_electrica.png', 'Bateria', 'negra', '2000', '1500000.00', '2024-04-12 15:26:06', 'ACTIVO'),
(5, 'flauta', 'flausan', 12, 'flauta.png', 'Viento', 'madera', '2009', '25000.00', '2024-04-01 19:13:47', 'ACTIVO'),
(6, 'bateria Acustica', 'yamaha', 2, 'bateria_acustica.png', 'Bateria', 'azul', '2000', '100000.00', '2024-05-28 19:13:38', 'ACTIVO'),
(7, 'piano acustico', 'pian', 5, 'piano2.png', 'Teclado', 'negro', '2010', '1200000.00', '2024-04-12 15:26:10', 'ACTIVO'),
(8, 'Guitarra', 'Fender', 10, 'Guitarra_acustica.png', 'Guitarra', 'Verde', '2013', '4000000', '2024-04-12 15:51:45', 'INACTIVO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mantenimiento`
--

CREATE TABLE `mantenimiento` (
  `id_mantenimiento` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `tipo_instrumento` varchar(100) DEFAULT NULL,
  `marca` varchar(100) DEFAULT NULL,
  `modelo` varchar(200) NOT NULL,
  `tiempo` varchar(100) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `estado` enum('Pendiente','En Proceso','Terminado') DEFAULT NULL,
  `estado_mante` enum('ACTIVO','INACTIVO') NOT NULL DEFAULT 'ACTIVO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `mantenimiento`
--

INSERT INTO `mantenimiento` (`id_mantenimiento`, `id_usuario`, `tipo_instrumento`, `marca`, `modelo`, `tiempo`, `fecha`, `estado`, `estado_mante`) VALUES
(1, 4, 'Guitarra', 'Yamaha', '2003', '3 dias', '2024-04-03', 'Terminado', 'ACTIVO'),
(2, 4, 'Bateria', 'Yamaha', '2002', '1 dia', '2024-04-04', 'Terminado', 'ACTIVO'),
(3, 4, 'Piano', 'Shelby', '2003', '3 dias', '2024-04-02', 'Pendiente', 'ACTIVO'),
(4, 4, 'Violin', 'Boyacá', '2004', '2 dias', '2024-04-10', 'En Proceso', 'ACTIVO'),
(5, 4, 'Flauta', 'Prueba', '2004', '1 Dia', '2024-04-08', 'Pendiente', 'ACTIVO'),
(6, 4, 'Tambor', 'Prueba 2', '2004', '1 Dia', '2024-04-08', 'Pendiente', 'ACTIVO'),
(7, 4, 'Flauta', 'Preuba 2', '2005', '2 dias', '2024-04-08', 'Pendiente', 'ACTIVO'),
(8, 4, 'Piano', 'Shelby', '2003', '2 Dias', '2024-04-09', 'Terminado', 'ACTIVO'),
(9, 6, 'Tambor', 'nice', '1567', '50 dias', '2024-04-12', 'En Proceso', 'ACTIVO'),
(10, 4, 'Bateria', 'nice', '2012', '2 dias', '2024-04-12', 'Terminado', 'ACTIVO'),
(11, 9, 'Viento', 'nice', '2018', '3 dias', '2024-04-12', 'Terminado', 'ACTIVO');

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
(123, 'Johan', 'Cardenas', '666', 'Dosquebradas', 'Johan@gmail.com'),
(1008, 'Argemiro', 'Segundo', '313093', 'su casa', 'tercero@gmail.com'),
(1234, 'Jose', 'Angarita', '0000', 'Sena', 'Jose@gmail.com'),
(10047, 'Esteban', 'arboleda', '333333', 'calle20', 'esteban@gmail.com'),
(10785, 'Juan', 'Marin A', '32010', 'calle 10', 'marin@gmail.com'),
(12345, 'Juana', 'Perez', '1234', 'SanraRosa', 'Juana@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `cedula` bigint(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `tipo` enum('ADMIN','CLIENTE') NOT NULL,
  `estado` enum('ACTIVO','INACTIVO') NOT NULL DEFAULT 'ACTIVO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `cedula`, `email`, `contrasena`, `tipo`, `estado`) VALUES
(4, 10047, 'esteban@gmail.com', '123', 'CLIENTE', 'ACTIVO'),
(5, 10785, 'marin@gmail.com', '123', 'CLIENTE', 'ACTIVO'),
(6, 1008, 'tercero@gmail.com', '123', 'CLIENTE', 'ACTIVO'),
(7, 1234, 'Jose@gmail.com', '123', 'ADMIN', 'ACTIVO'),
(8, 123, 'Johan@gmail.com', '123', 'CLIENTE', 'INACTIVO'),
(9, 12345, 'Juana@gmail.com', '123', 'CLIENTE', 'ACTIVO');

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
-- Indices de la tabla `mantenimiento`
--
ALTER TABLE `mantenimiento`
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
  MODIFY `id_articulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `historial_compras`
--
ALTER TABLE `historial_compras`
  MODIFY `id_historial_compras` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `historial_pedidos_ventas`
--
ALTER TABLE `historial_pedidos_ventas`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `instrumentos`
--
ALTER TABLE `instrumentos`
  MODIFY `id_instrumento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `mantenimiento`
--
ALTER TABLE `mantenimiento`
  MODIFY `id_mantenimiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
  ADD CONSTRAINT `historial_pedidos_ventas_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`cedula`) REFERENCES `personas` (`cedula`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
