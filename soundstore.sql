-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-03-2024 a las 17:02:53
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

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
-- Estructura de tabla para la tabla `historial_compras`
--

CREATE TABLE `historial_compras` (
  `id_historial_compras` int(11) NOT NULL,
  `marca` varchar(100) DEFAULT NULL,
  `id_instrumento` int(11) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `precio_unitario` decimal(10,2) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `precio_total` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `apellido` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `contrasena` varchar(100) DEFAULT NULL,
  `tipo` enum('Administrador','Cliente') DEFAULT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

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
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `historial_compras`
--
ALTER TABLE `historial_compras`
  MODIFY `id_historial_compras` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `historial_pedidos_ventas`
--
ALTER TABLE `historial_pedidos_ventas`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `instrumentos`
--
ALTER TABLE `instrumentos`
  MODIFY `id_instrumento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `manteniento`
--
ALTER TABLE `manteniento`
  MODIFY `id_mantenimiento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
