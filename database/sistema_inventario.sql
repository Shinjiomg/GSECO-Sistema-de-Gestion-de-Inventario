-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-11-2023 a las 18:04:13
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
-- Base de datos: `sistema_inventario`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulo`
--

CREATE TABLE `articulo` (
  `id_articulo` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `precio_venta` decimal(11,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `descripcion` varchar(45) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `categoria_id_categoria` int(10) UNSIGNED NOT NULL,
  `stock_deseado` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `articulo`
--

INSERT INTO `articulo` (`id_articulo`, `nombre`, `precio_venta`, `stock`, `descripcion`, `estado`, `categoria_id_categoria`, `stock_deseado`) VALUES
(1, 'gaseosa coca cola', 1500.00, 37, 'coca cola', 0, 3, 41),
(3, 'Fritos', 2000.00, 2, 'fritos', 0, 1, 10),
(4, 'prueba', 1.00, 10, '', 0, 5, 7),
(5, 'prueba45', 1200.00, 8, '', 0, 1, 30),
(6, 'prueba n', 1200.00, 12, '', 0, 1, 1200),
(7, 'm', 12.00, 12, '', 0, 1, 12),
(8, 'u', 12.00, 12, '', 0, 1, 12),
(9, 'mmmm', 12.00, 12, '', 0, 1, 12),
(10, 'prueba505', 123.00, 12, '', 0, 5, 2),
(11, 'prueba22323', 123.00, 4, '', 0, 2, 2),
(12, 'gaseosa coca cola', 12.00, 12, '', 0, 1, 1),
(13, 'gaseosa coca cola', 12.00, 4, '', 0, 6, 12),
(14, 'prueba505', 123.00, 6, '', 1, 6, 2),
(15, 'prueba 12345', 2.00, 6, '', 1, 6, 32),
(16, 'prueba 12345', 1.00, 3, '', 1, 6, 1),
(17, 'abc12345', 3000.00, 5, '', 0, 5, 12),
(18, 'fffff', 3000.00, 5, '', 0, 3, 12),
(19, 'mmmm', 12.00, 12, '', 1, 6, 12),
(20, 'v', 6.00, 6, '', 1, 6, 6),
(21, 'llllll', 7.00, 7, '', 1, 5, 8),
(22, 'prueba', 1212.00, 1212, '', 1, 6, 12),
(23, 'abc123', 1500.00, 12, '', 1, 6, 12),
(24, 'DXDIAG', 12.00, 12, '', 1, 6, 1),
(25, 'eeeeeeeee', 12.00, 12, '', 1, 6, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nombre`, `estado`) VALUES
(1, 'bebida lactea', 0),
(2, 'mmmmm', 0),
(3, 'gggg', 1),
(4, 'gggg', 1),
(5, 'categoria de prueba', 1),
(6, 'nueva', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_ingreso`
--

CREATE TABLE `detalle_ingreso` (
  `id_detalle_ingreso` int(10) UNSIGNED NOT NULL,
  `Ingreso_id_ingreso` int(10) UNSIGNED NOT NULL,
  `Articulo_id_articulo` int(10) UNSIGNED NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `detalle_ingreso`
--

INSERT INTO `detalle_ingreso` (`id_detalle_ingreso`, `Ingreso_id_ingreso`, `Articulo_id_articulo`, `cantidad`, `precio`) VALUES
(1, 1, 4, 5, 1.00),
(2, 2, 4, 2, 1.00),
(3, 3, 4, 3, 1.00),
(4, 4, 10, 3, 1000.00),
(5, 5, 10, 3, 1000.00),
(6, 6, 13, 1, 1500.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_venta`
--

CREATE TABLE `detalle_venta` (
  `id_detalle_venta` int(10) UNSIGNED NOT NULL,
  `Venta_id_venta` int(10) UNSIGNED NOT NULL,
  `Articulo_id_articulo` int(10) UNSIGNED NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` decimal(11,2) NOT NULL,
  `metodo_pago` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingreso`
--

CREATE TABLE `ingreso` (
  `id_ingreso` int(10) UNSIGNED NOT NULL,
  `Usuario_id_usuario` int(10) UNSIGNED NOT NULL,
  `fecha` datetime NOT NULL,
  `total` decimal(11,2) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ingreso`
--

INSERT INTO `ingreso` (`id_ingreso`, `Usuario_id_usuario`, `fecha`, `total`, `estado`) VALUES
(1, 1, '2023-11-15 16:34:34', 5.00, 1),
(2, 1, '2023-11-15 16:34:57', 2.00, 1),
(3, 1, '2023-11-15 16:35:24', 3.00, 1),
(4, 1, '2023-11-15 17:21:45', 3000.00, 1),
(5, 1, '2023-11-15 17:22:36', 3000.00, 1),
(6, 1, '2023-11-15 17:25:44', 1500.00, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `metodos_pago`
--

CREATE TABLE `metodos_pago` (
  `id_metodo_pago` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id_rol` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_rol`, `nombre`, `estado`) VALUES
(1, 'admin', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(10) UNSIGNED NOT NULL,
  `nombres` varchar(45) NOT NULL,
  `apellidos` varchar(45) NOT NULL,
  `tipo_documento` varchar(45) NOT NULL,
  `num_documento` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `user_password` varchar(45) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `rol_id_rol` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombres`, `apellidos`, `tipo_documento`, `num_documento`, `email`, `user_password`, `estado`, `rol_id_rol`) VALUES
(1, 'camilo', 'hernandez', 'CC', '1007159461', 'ah460218@gmail.com', '1234567', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `id_venta` int(10) UNSIGNED NOT NULL,
  `Usuario_id_usuario` int(10) UNSIGNED NOT NULL,
  `fecha` datetime NOT NULL,
  `total` decimal(11,2) NOT NULL,
  `tipo_pago` varchar(30) DEFAULT 'Efectivo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`id_venta`, `Usuario_id_usuario`, `fecha`, `total`, `tipo_pago`) VALUES
(1, 1, '2023-11-05 18:12:57', 20000.00, 'Efectivo'),
(2, 1, '2023-11-05 18:16:07', 1200.00, 'null'),
(3, 1, '2023-11-05 18:17:10', 1200.00, 'Efectivo'),
(4, 1, '2023-11-05 18:17:21', 1200.00, 'Efectivo'),
(5, 1, '2023-11-05 18:17:55', 4800.00, 'Nequi'),
(6, 1, '2023-11-07 17:41:53', 6000.00, 'Efectivo'),
(7, 1, '2023-11-07 23:01:12', 24000.00, 'Efectivo'),
(9, 1, '2023-11-08 21:19:55', 10000.00, 'Efectivo'),
(10, 1, '2023-11-08 21:23:28', 3200.00, 'Efectivo'),
(11, 1, '2023-11-08 21:51:10', 2400.00, 'Nequi'),
(12, 1, '2023-11-09 02:52:33', 2400.00, 'Efectivo'),
(13, 1, '2023-11-09 02:53:09', 2000.00, 'Nequi'),
(14, 1, '2023-11-10 02:20:50', 6800.00, 'Efectivo'),
(15, 1, '2023-11-10 02:51:10', 2401.00, 'Efectivo'),
(16, 1, '2023-11-10 22:18:43', 3.00, 'Efectivo'),
(17, 1, '2023-11-10 22:20:44', 2.00, 'Efectivo'),
(18, 1, '2023-11-10 22:22:49', 1200.00, 'Efectivo'),
(19, 1, '2023-11-10 22:51:09', 2400.00, 'Efectivo');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulo`
--
ALTER TABLE `articulo`
  ADD PRIMARY KEY (`id_articulo`),
  ADD KEY `categoria_id_categoria` (`categoria_id_categoria`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `detalle_ingreso`
--
ALTER TABLE `detalle_ingreso`
  ADD PRIMARY KEY (`id_detalle_ingreso`),
  ADD KEY `Ingreso_id_ingreso` (`Ingreso_id_ingreso`),
  ADD KEY `Articulo_id_articulo` (`Articulo_id_articulo`);

--
-- Indices de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD PRIMARY KEY (`id_detalle_venta`),
  ADD KEY `Venta_id_venta` (`Venta_id_venta`),
  ADD KEY `Articulo_id_articulo` (`Articulo_id_articulo`),
  ADD KEY `metodo_pago` (`metodo_pago`);

--
-- Indices de la tabla `ingreso`
--
ALTER TABLE `ingreso`
  ADD PRIMARY KEY (`id_ingreso`),
  ADD KEY `Usuario_id_usuario` (`Usuario_id_usuario`);

--
-- Indices de la tabla `metodos_pago`
--
ALTER TABLE `metodos_pago`
  ADD PRIMARY KEY (`id_metodo_pago`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `rol_id_rol` (`rol_id_rol`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`id_venta`),
  ADD KEY `Usuario_id_usuario` (`Usuario_id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulo`
--
ALTER TABLE `articulo`
  MODIFY `id_articulo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `detalle_ingreso`
--
ALTER TABLE `detalle_ingreso`
  MODIFY `id_detalle_ingreso` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  MODIFY `id_detalle_venta` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `ingreso`
--
ALTER TABLE `ingreso`
  MODIFY `id_ingreso` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `metodos_pago`
--
ALTER TABLE `metodos_pago`
  MODIFY `id_metodo_pago` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id_rol` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `id_venta` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `articulo`
--
ALTER TABLE `articulo`
  ADD CONSTRAINT `articulo_ibfk_1` FOREIGN KEY (`categoria_id_categoria`) REFERENCES `categoria` (`id_categoria`);

--
-- Filtros para la tabla `detalle_ingreso`
--
ALTER TABLE `detalle_ingreso`
  ADD CONSTRAINT `detalle_ingreso_ibfk_1` FOREIGN KEY (`Ingreso_id_ingreso`) REFERENCES `ingreso` (`id_ingreso`),
  ADD CONSTRAINT `detalle_ingreso_ibfk_2` FOREIGN KEY (`Articulo_id_articulo`) REFERENCES `articulo` (`id_articulo`);

--
-- Filtros para la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD CONSTRAINT `detalle_venta_ibfk_1` FOREIGN KEY (`Venta_id_venta`) REFERENCES `venta` (`id_venta`),
  ADD CONSTRAINT `detalle_venta_ibfk_2` FOREIGN KEY (`Articulo_id_articulo`) REFERENCES `articulo` (`id_articulo`),
  ADD CONSTRAINT `detalle_venta_ibfk_3` FOREIGN KEY (`metodo_pago`) REFERENCES `metodos_pago` (`id_metodo_pago`);

--
-- Filtros para la tabla `ingreso`
--
ALTER TABLE `ingreso`
  ADD CONSTRAINT `ingreso_ibfk_1` FOREIGN KEY (`Usuario_id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`rol_id_rol`) REFERENCES `rol` (`id_rol`);

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `venta_ibfk_1` FOREIGN KEY (`Usuario_id_usuario`) REFERENCES `usuario` (`id_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
