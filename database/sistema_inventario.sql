-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-11-2023 a las 17:17:20
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
  `descripcion` varchar(45) DEFAULT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `categoria_id_categoria` int(10) UNSIGNED NOT NULL,
  `stock_deseado` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `articulo`
--

INSERT INTO `articulo` (`id_articulo`, `nombre`, `precio_venta`, `stock`, `descripcion`, `estado`, `categoria_id_categoria`, `stock_deseado`) VALUES
(1, 'AGUA CRISTAL CON GAS 600 ML', 2000.00, 0, NULL, 1, 3, 20),
(2, 'AGUA CRISTAL MINI ', 700.00, 0, NULL, 1, 3, 20),
(3, 'AGUACRISTAL SIN GAS 600 ML', 1600.00, 0, NULL, 1, 3, 20),
(4, 'AGUS CRISTAL COCO', 2000.00, 0, NULL, 1, 3, 20),
(5, 'AREPA DE HUEVO', 3200.00, 0, NULL, 1, 8, 20),
(6, 'AREPA DE QUESO', 2500.00, 0, NULL, 1, 8, 20),
(7, 'ARROZ - PORCI?N', 2000.00, 0, NULL, 1, 1, 20),
(8, 'ARROZ CON LECHE', 3000.00, 0, NULL, 1, 10, 20),
(9, 'AVENA BOLSA ', 1900.00, 0, NULL, 1, 10, 20),
(10, 'AVENA VASO', 3100.00, 0, NULL, 1, 10, 20),
(11, 'BAQUEANAS ', 3000.00, 0, NULL, 1, 4, 20),
(12, 'BIANCHI BOMBONES', 500.00, 0, NULL, 1, 7, 20),
(13, 'BOLIQUESOS', 2000.00, 0, NULL, 1, 4, 20),
(14, 'BOMBON', 500.00, 0, NULL, 1, 7, 20),
(15, 'BONBONBUM', 500.00, 0, NULL, 1, 7, 20),
(16, 'BONYURT', 3700.00, 0, NULL, 1, 10, 20),
(17, 'BRAZO DE REINA ', 2000.00, 0, NULL, 1, 4, 20),
(18, 'BU?UELO', 2500.00, 0, NULL, 1, 8, 20),
(19, 'CANADA DRY - GINGER 400 ML', 2000.00, 0, NULL, 1, 3, 20),
(20, 'CANADA-DRY GINGER 1,5 LTS', 4000.00, 0, NULL, 1, 3, 20),
(21, 'CANADA-DRY GINGER PET 400 ML', 2200.00, 0, NULL, 1, 3, 20),
(22, 'CA?A', 1700.00, 0, NULL, 1, 11, 20),
(23, 'CASERITAS', 2300.00, 0, NULL, 1, 4, 20),
(24, 'CHEESE TRIS', 2000.00, 0, NULL, 1, 4, 20),
(25, 'CHICA CHIRRIN', 2600.00, 0, NULL, 1, 4, 20),
(26, 'CHICHARRON', 2000.00, 0, NULL, 1, 11, 20),
(27, 'CHITOS NATURALES', 2000.00, 0, NULL, 1, 4, 20),
(28, 'CHITOS PICANTES', 2000.00, 0, NULL, 1, 4, 20),
(29, 'CHOCLITOS LIMON', 2000.00, 0, NULL, 1, 4, 20),
(30, 'CHOCO CONO', 2000.00, 0, NULL, 1, 9, 20),
(31, 'CHOCO RAMO', 2200.00, 0, NULL, 1, 4, 20),
(32, 'CHOCO WAFFER ', 400.00, 0, NULL, 1, 7, 20),
(33, 'CHOCOLATINA ALPLER', 2500.00, 0, NULL, 1, 7, 20),
(34, 'CHOCOLATINA JET PEQUE?A', 800.00, 0, NULL, 1, 7, 20),
(35, 'CHOCOLATINA JUMBO GRANDE ', 5000.00, 0, NULL, 1, 7, 20),
(36, 'CHOCOLATINA JUMBO MINI', 900.00, 0, NULL, 1, 7, 20),
(37, 'CHOCOLATINA JUMBO PERSONAL', 2700.00, 0, NULL, 1, 7, 20),
(38, 'CHOKIS CHOCOLATE  ', 1500.00, 0, NULL, 1, 4, 20),
(39, 'CHURRASCO', 13000.00, 0, NULL, 1, 5, 20),
(40, 'CHURROS', 2000.00, 0, NULL, 1, 11, 20),
(41, 'CHURROS MI CALI', 2000.00, 0, NULL, 1, 11, 20),
(42, 'COCA-COLA 1,5 LITROS', 5000.00, 0, NULL, 1, 3, 20),
(43, 'COCA-COLA 3 LITROS', 8000.00, 0, NULL, 1, 3, 20),
(44, 'COCA-COLA 400 ML', 2500.00, 0, NULL, 1, 3, 20),
(45, 'COCA-COLA LATA', 2100.00, 0, NULL, 1, 3, 20),
(46, 'COCA-COLA LATA GRANDE', 3000.00, 0, NULL, 1, 3, 20),
(47, 'COCA-COLA PEQUE?A', 2000.00, 0, NULL, 1, 3, 20),
(48, 'CONO', 2000.00, 0, NULL, 1, 9, 20),
(49, 'DETODITO', 2500.00, 0, NULL, 1, 4, 20),
(50, 'DONUTS  CARMENZA', 2500.00, 0, NULL, 1, 11, 20),
(51, 'DORITOS', 2000.00, 0, NULL, 1, 4, 20),
(52, 'DORITOS DINAMITA', 2200.00, 0, NULL, 1, 4, 20),
(53, 'EMPANADA PAPA-CARNE', 2200.00, 0, NULL, 1, 8, 20),
(54, 'FRUTA - PORCI?N', 3000.00, 0, NULL, 1, 1, 20),
(55, 'GALLETA COCOSETTE', 1700.00, 0, NULL, 1, 7, 20),
(56, 'GALLETA FESTIVAL', 1500.00, 0, NULL, 1, 7, 20),
(57, 'GALLETA MINI CHIPS', 1500.00, 0, NULL, 1, 7, 20),
(58, 'GALLETA NUCITA', 1500.00, 0, NULL, 1, 7, 20),
(59, 'GALLETAS CLUB SOCIAL', 1500.00, 0, NULL, 1, 7, 20),
(60, 'GALLETAS TOSH', 1500.00, 0, NULL, 1, 4, 20),
(61, 'GANSITO', 1700.00, 0, NULL, 1, 7, 20),
(62, 'GASEOSA POSTOBON 1.5 LITROS', 4000.00, 0, NULL, 1, 3, 20),
(63, 'GASEOSA POSTOBON 2.5 LITROS', 6000.00, 0, NULL, 1, 3, 20),
(64, 'GASEOSA POSTOBON 250 ML', 1500.00, 0, NULL, 1, 3, 20),
(65, 'GASEOSA POSTOBON 400 ML', 2000.00, 0, NULL, 1, 3, 20),
(66, 'GATORADE', 3000.00, 0, NULL, 1, 3, 20),
(67, 'GELATINA', 3000.00, 0, NULL, 1, 4, 20),
(68, 'GOMAS TRULULU-BOLSITA', 2000.00, 0, NULL, 1, 7, 20),
(69, 'GOMITAS TROLLI', 2000.00, 0, NULL, 1, 7, 20),
(70, 'H2O POSTOBON', 2800.00, 0, NULL, 1, 3, 20),
(71, 'HALL EN BARRA', 1500.00, 0, NULL, 1, 7, 20),
(72, 'HALL EN PEPA ', 300.00, 0, NULL, 1, 7, 20),
(73, 'HAMBURGUESA', 8000.00, 0, NULL, 1, 5, 20),
(74, 'HAMBURGUESA ESPECIAL', 9000.00, 0, NULL, 1, 5, 20),
(75, 'HELADO - VASO', 3000.00, 0, NULL, 1, 9, 20),
(76, 'HELADO FRUPPYS', 3000.00, 0, NULL, 1, 9, 20),
(77, 'HUEVOS', 2500.00, 0, NULL, 1, 6, 20),
(78, 'HUEVOS PERICOS', 3000.00, 0, NULL, 1, 6, 20),
(79, 'HUEVOS RANCHEROS', 5000.00, 0, NULL, 1, 6, 20),
(80, 'JABON TOCADOR - BA?O', 2500.00, 0, NULL, 1, 2, 20),
(81, 'JUGO DEL VALLE 1,5 LITROS', 4000.00, 0, NULL, 1, 3, 20),
(82, 'JUGO DEL VALLE 400 ML', 1500.00, 0, NULL, 1, 3, 20),
(83, 'JUGO DEL VALLE CAJA', 1500.00, 0, NULL, 1, 3, 20),
(84, 'JUGO FRUTTO BOTELLA', 2600.00, 0, NULL, 1, 3, 20),
(85, 'JUGO FRUTTO CAJA', 1500.00, 0, NULL, 1, 3, 20),
(86, 'JUGO HIT 500 ML', 2400.00, 0, NULL, 1, 3, 20),
(87, 'JUGO HIT 8 ONZ', 1500.00, 0, NULL, 1, 3, 20),
(88, 'JUGO HIT CAJA GRANDE', 3500.00, 0, NULL, 1, 3, 20),
(89, 'JUGO HIT LITRO', 4000.00, 0, NULL, 1, 3, 20),
(90, 'LECHE ACHOCOLATADA ', 3000.00, 0, NULL, 1, 10, 20),
(91, 'LECHE ENTERA', 2000.00, 0, NULL, 1, 10, 20),
(92, 'LIBERAL', 1300.00, 0, NULL, 1, 11, 20),
(93, 'LIBERAL YOYO', 1500.00, 0, NULL, 1, 11, 20),
(94, 'LOKI?O - DULCE', 200.00, 0, NULL, 1, 7, 20),
(95, 'LONCHEROS ', 2500.00, 0, NULL, 1, 4, 20),
(96, 'MANI  CASERO', 1500.00, 0, NULL, 1, 7, 20),
(97, 'MANI LA ESPECIAL ', 2000.00, 0, NULL, 1, 4, 20),
(98, 'MANI MOTO AZUL', 1000.00, 0, NULL, 1, 4, 28),
(99, 'MANI MOTO VARIOS', 2000.00, 0, NULL, 1, 4, 20),
(100, 'MANI SURTIDO', 1500.00, 0, NULL, 1, 4, 20),
(101, 'MANTECADA - TORTA', 2500.00, 0, NULL, 1, 11, 20),
(102, 'MAQUINA DE AFEITAR 2 HOJAS ', 3000.00, 0, NULL, 1, 2, 20),
(103, 'MAQUINA DE AFEITAR 3 HOJAS ', 3600.00, 0, NULL, 1, 2, 20),
(104, 'MECHERAS', 1500.00, 0, NULL, 1, 2, 20),
(105, 'MENTA SURTIDA', 200.00, 0, NULL, 1, 7, 20),
(106, 'MILHOJAS ', 1700.00, 0, NULL, 1, 11, 20),
(107, 'MINI BOM', 200.00, 0, NULL, 1, 7, 20),
(108, 'MR TEA 500 ML', 2400.00, 0, NULL, 1, 3, 20),
(109, 'NATUCHIP', 2000.00, 0, NULL, 1, 4, 20),
(110, 'NUCITA', 700.00, 0, NULL, 1, 7, 20),
(111, 'PALITO DE QUESO', 2500.00, 0, NULL, 1, 11, 20),
(112, 'PAN ', 1600.00, 0, NULL, 1, 11, 20),
(113, 'PAN 70 - LIBERAL', 1500.00, 0, NULL, 1, 11, 20),
(114, 'PAN 70 LIBERAL', 1500.00, 0, NULL, 1, 11, 20),
(115, 'PAN DE BONO ESTELA', 2200.00, 0, NULL, 1, 8, 20),
(116, 'PAN LA GRAN SUIZA', 1600.00, 0, NULL, 1, 11, 20),
(117, 'PAN PIZZA', 1800.00, 0, NULL, 1, 11, 20),
(118, 'PANDEBONO', 2300.00, 0, NULL, 1, 8, 20),
(119, 'PAPA PORCI?N', 3000.00, 0, NULL, 1, 1, 20),
(120, 'PAPA RELENA', 3000.00, 0, NULL, 1, 8, 20),
(121, 'PAPAS MARGARITAS', 2000.00, 0, NULL, 1, 4, 20),
(122, 'PAPEL HIGIENICO ', 2500.00, 0, NULL, 1, 2, 20),
(123, 'PASTECLO', 1500.00, 0, NULL, 1, 11, 20),
(124, 'PASTEL DE CARNE', 3000.00, 0, NULL, 1, 8, 20),
(125, 'PASTEL DE POLLO ', 2200.00, 0, NULL, 1, 11, 20),
(126, 'PECHUGA ', 12000.00, 0, NULL, 1, 5, 20),
(127, 'PERAS', 2000.00, 0, NULL, 1, 11, 20),
(128, 'PONQUE GALA ', 2200.00, 0, NULL, 1, 11, 20),
(129, 'PONY MALTA 1,5 LTS', 4500.00, 0, NULL, 1, 3, 20),
(130, 'PONY MALTA PEQUE?A', 1500.00, 0, NULL, 1, 3, 20),
(131, 'PONY MALTA PET 330 ML', 2000.00, 0, NULL, 1, 3, 20),
(132, 'PRODUCTOS IN', 1800.00, 0, NULL, 1, 3, 20),
(133, 'QUESADILLAS ', 2500.00, 0, NULL, 1, 10, 20),
(134, 'REPOLLAS', 700.00, 0, NULL, 1, 11, 20),
(135, 'SALCHIPAPA', 7500.00, 0, NULL, 1, 5, 20),
(136, 'SALCHIPAPA ESPECIAL', 9000.00, 0, NULL, 1, 5, 20),
(137, 'SANDWICH DE POLO', 3000.00, 0, NULL, 1, 11, 20),
(138, 'SANDWICH LA CORRALEJA', 3000.00, 0, NULL, 1, 11, 20),
(139, 'SAVILOE', 2500.00, 0, NULL, 1, 3, 20),
(140, 'SODA BOTELLA GRIS', 2000.00, 0, NULL, 1, 3, 20),
(141, 'SPEED MAX', 1600.00, 0, NULL, 1, 3, 20),
(142, 'TAMAL-CHOCOLATE', 6500.00, 0, NULL, 1, 6, 20),
(143, 'TORTA DE APOLA', 2500.00, 0, NULL, 1, 11, 20),
(144, 'TORTA DE NARANJA ', 2500.00, 0, NULL, 1, 11, 20),
(145, 'TORTA DE QUESO', 2500.00, 0, NULL, 1, 11, 20),
(146, 'TORTA SURTIDAS', 2500.00, 0, NULL, 1, 11, 20),
(147, 'TRIDENT', 1500.00, 0, NULL, 1, 7, 20),
(148, 'VIVE 100', 2500.00, 0, NULL, 1, 3, 20),
(149, 'WAFFER SABORES', 1000.00, 0, NULL, 1, 4, 20),
(150, 'YOGO YOGO BOLSA', 2000.00, 0, NULL, 1, 10, 20),
(151, 'YOGURT', 3000.00, 0, NULL, 1, 10, 20);

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
(1, 'ALIMENTOS', 1),
(2, 'ASEO', 1),
(3, 'BEBIDAS', 1),
(4, 'COMESTIBLES - PAQUETE', 1),
(5, 'COMIDAS RAPIDAS', 1),
(6, 'DESAYUNOS', 1),
(7, 'DULCERIA', 1),
(8, 'FRITOS', 1),
(9, 'HELADOS', 1),
(10, 'LACTEOS', 1),
(11, 'PANADERIA-TORTAS', 1);

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
-- Estructura de tabla para la tabla `gastos`
--

CREATE TABLE `gastos` (
  `id_gasto` int(10) UNSIGNED NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `total` decimal(11,2) NOT NULL,
  `id_usuario` int(10) UNSIGNED NOT NULL
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
(2, 'camilo', 'hernánde', 'cc', '10023', 'nicollgm100@gmail.com', '123456789', 1, 1);

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
-- Indices de la tabla `gastos`
--
ALTER TABLE `gastos`
  ADD PRIMARY KEY (`id_gasto`),
  ADD KEY `id_usuario` (`id_usuario`);

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
  MODIFY `id_articulo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
-- AUTO_INCREMENT de la tabla `gastos`
--
ALTER TABLE `gastos`
  MODIFY `id_gasto` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `id_usuario` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- Filtros para la tabla `gastos`
--
ALTER TABLE `gastos`
  ADD CONSTRAINT `gastos_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

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
