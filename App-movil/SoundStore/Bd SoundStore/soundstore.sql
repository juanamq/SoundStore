-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-04-2024 a las 04:47:18
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
(25, 'Pua', 'nice', 12, 'puas.png', 'Pua', 'roja', '2012', '200000.00', '0000-00-00 00:00:00', 'ACTIVO'),
(27, 'parlante', 'yim', 10, 'articlus.jpg', 'Amplificador', 'naranja', '2008', '150000.00', '0000-00-00 00:00:00', 'ACTIVO'),
(29, 'sonido', 'LG', 8, 'amplificador.png', 'Amplificador', 'azul', '2009', '1000.00', '0000-00-00 00:00:00', 'ACTIVO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_compras`
--

CREATE TABLE `historial_compras` (
  `id_historial_compras` int(11) NOT NULL,
  `marca` varchar(100) DEFAULT NULL,
  `id_usuario` int(10) NOT NULL,
  `img_instrumento` varchar(500) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `precio_unitario` varchar(200) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `precio_total` varchar(200) DEFAULT NULL,
  `estado` enum('ACTIVA','INACTIVA','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `historial_compras`
--

INSERT INTO `historial_compras` (`id_historial_compras`, `marca`, `id_usuario`, `img_instrumento`, `nombre`, `precio_unitario`, `cantidad`, `precio_total`, `estado`) VALUES
(1, 'Alguna ', 7, 'guitarra_electrica.png', 'guitarra', '2000000', 2, '4000000', 'ACTIVA'),
(3, 'yamaha', 4, 'bateria_acustica.png', 'bateria', '1500000', 1, '1500000', 'ACTIVA'),
(4, 'Fender', 7, 'http://192.168.20.160/soundstore/dist/img/bajo_electrico.png', 'Guitarra eléctrica', '2500000', 2, '5000000', 'ACTIVA'),
(5, 'yamaha', 5, 'http://192.168.20.160/soundstore/dist/img/bajo.png', 'bateria electrica', '15000000', 1, '1.5E7', 'ACTIVA'),
(6, 'nice', 5, 'http://192.168.20.160/soundstore/dist/img/puas.png', 'Pua', '200000.00', 1, '200000.0', 'ACTIVA'),
(7, 'Fender', 6, 'http://192.168.20.160/soundstore/dist/img/bajo_electrico.png', 'Guitarra eléctrica', '25000000', 1, '2.5E7', 'ACTIVA'),
(8, 'flausan', 7, 'http://192.168.20.160/soundstore/dist/img/flauta.png', 'flauta', '2500000', 1, '2500000.0', 'ACTIVA'),
(9, 'nice', 7, 'http://192.168.20.160/soundstore/dist/img/puas.png', 'Pua', '200000.00', 2, '400000.0', 'ACTIVA');

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
(1, 1, 4, 'juan', 'guitarra', 'calle 10', 2, '9000000', '2024-04-08 14:33:50', 'ACTIVO');

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
(1, 'Guitarra eléctrica', 'Fender', 5, 'bajo_electrico.png', 'Guitarra', 'madera', '2020', '25000000', '2024-04-10 21:17:07', 'ACTIVO'),
(2, 'bateria electrica', 'yamaha', 2, 'guitarra_electrica.png', 'Guitarra', 'negra', '2000', '15000000', '0000-00-00 00:00:00', 'ACTIVO'),
(5, 'flauta', 'flausan', 12, 'flauta.png', 'Viento', 'madera', '2009', '2500000', '0000-00-00 00:00:00', 'ACTIVO'),
(6, 'bateria electrica', 'yamaha', 2, 'bateria_electrica.png', 'Bateria', 'azul', '2000', '3000000', '0000-00-00 00:00:00', 'ACTIVO');

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
  `estado` enum('Pendiente','En Proceso','Terminado') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `mantenimiento`
--

INSERT INTO `mantenimiento` (`id_mantenimiento`, `id_usuario`, `tipo_instrumento`, `marca`, `modelo`, `tiempo`, `fecha`, `estado`) VALUES
(1, 7, 'Guitarra', 'Yamaha', '2003', '3 dias', '2024-04-03', 'Pendiente'),
(2, 2, 'Bateria', 'Yamaha', '2002', '1 dia', '2024-04-04', 'En Proceso'),
(3, 7, 'Piano', 'Shelby', '2003', '3 dias', '2024-04-02', 'Terminado'),
(4, 6, 'Violin', 'Boyacá', '2004', '2 dias', '2024-04-10', 'En Proceso'),
(11, 7, 'Tambor', 'hg', 'ghgh', 'gh', '2024-04-10', 'Pendiente');

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
(1002, 'Danilo', 'Angarita', '1234', '123', 'Dani@gmail.com'),
(1234, 'DFD', 'DFGF', 'ddf', 'fdf', 'gjhg'),
(10023, 'Jose', 'Danilo', '32145', 'Carrera11', 'Jose@gmail.com'),
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
  `contrasena` varchar(255) NOT NULL,
  `tipo` enum('ADMIN','CLIENTE') NOT NULL,
  `estado` enum('ACTIVO','INACTIVO') NOT NULL DEFAULT 'ACTIVO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `cedula`, `email`, `contrasena`, `tipo`, `estado`) VALUES
(4, 10047, 'esteban@mail.com', '123', 'ADMIN', 'INACTIVO'),
(5, 10785, 'marin@mail.com', '123', 'CLIENTE', 'ACTIVO'),
(6, 1002, 'Dani@gmail.com', '321', 'ADMIN', 'ACTIVO'),
(7, 10023, 'Jose@gmail.com', '0000', 'CLIENTE', 'ACTIVO'),
(8, 1234, 'gjhg', '54321', 'CLIENTE', 'ACTIVO');

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
  ADD PRIMARY KEY (`id_historial_compras`);

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
  MODIFY `id_articulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `historial_compras`
--
ALTER TABLE `historial_compras`
  MODIFY `id_historial_compras` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `historial_pedidos_ventas`
--
ALTER TABLE `historial_pedidos_ventas`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `instrumentos`
--
ALTER TABLE `instrumentos`
  MODIFY `id_instrumento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `mantenimiento`
--
ALTER TABLE `mantenimiento`
  MODIFY `id_mantenimiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

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
