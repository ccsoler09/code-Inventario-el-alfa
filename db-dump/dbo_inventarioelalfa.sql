-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-03-2021 a las 05:29:46
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbo_inventarioelalfa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

CREATE TABLE `cargo` (
  `CodiCargo` int(11) NOT NULL,
  `CarDescripcion` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`CodiCargo`, `CarDescripcion`) VALUES
(1, 'Empleado'),
(2, 'Administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `idCate` int(10) UNSIGNED NOT NULL,
  `estado` int(11) NOT NULL,
  `NombCate` varchar(45) NOT NULL,
  `Descripcion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`idCate`, `estado`, `NombCate`, `Descripcion`) VALUES
(1, 1, 'Vestidos', NULL),
(2, 1, 'Camisetas', NULL),
(3, 1, 'Abrigos', ''),
(4, 1, 'Faldas', ''),
(5, 1, 'Pantalonetas', ''),
(6, 1, 'Chalecos', ''),
(7, 1, 'Bolsos de mano', ''),
(8, 1, 'Accesorios', ''),
(9, 1, 'Calcetines', ''),
(10, 1, 'Ropa interior', ''),
(11, 1, 'Chaquetas', ''),
(12, 1, 'Buzos', ''),
(13, 1, 'Camisa', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `devoluciones`
--

CREATE TABLE `devoluciones` (
  `id_devolucion` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  `persona_id` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `devoluciones`
--

INSERT INTO `devoluciones` (`id_devolucion`, `producto_id`, `total`, `descripcion`, `persona_id`, `fecha`) VALUES
(15, 7, 1, 'La talla es pequeña', 1003534663, '2021-03-06 22:52:49'),
(16, 9, 1, 'El producto está defectuoso.', 1003534664, '2021-03-06 23:51:19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

CREATE TABLE `estados` (
  `id_estado` int(11) NOT NULL,
  `nombre_estado` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estados`
--

INSERT INTO `estados` (`id_estado`, `nombre_estado`) VALUES
(1, 'Activo'),
(2, 'Inactivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

CREATE TABLE `facturas` (
  `id_factura` int(11) NOT NULL,
  `codigo_factura` varchar(250) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `fecha_factura` varchar(250) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `productos` text NOT NULL,
  `productos_esp` varchar(250) NOT NULL,
  `iva` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `facturas`
--

INSERT INTO `facturas` (`id_factura`, `codigo_factura`, `usuario_id`, `fecha_factura`, `cliente_id`, `productos`, `productos_esp`, `iva`, `subtotal`, `total`) VALUES
(9, 'IEA202103061', 3, '2021/03/06', 1, '[{\"idprod\":\"6\",\"cantidad\":\"1\",\"precio\":42000,\"nombre\":\"Falda de cuero\",\"valor_unitario\":\"42000\"}]', '[\"6\"]', 5, 42000, 44100),
(13, 'IEA2021030610', 3, '2021/03/06', 1, '[{\"idprod\":\"6\",\"cantidad\":\"2\",\"precio\":84000,\"nombre\":\"Falda de cuero\",\"valor_unitario\":\"42000\"},{\"idprod\":\"7\",\"cantidad\":\"1\",\"precio\":21000,\"nombre\":\"Camiseta Calvin Clain\",\"valor_unitario\":\"21000\"},{\"idprod\":\"4\",\"cantidad\":\"3\",\"precio\":180000,\"nombre\":\"Buzo Nike\",\"valor_unitario\":\"60000\"}]', '[\"6\",\"7\",\"4\"]', 50, 285000, 427500),
(14, 'IEA2021030624', 2, '2021/03/06', 1003534663, '[{\"idprod\":\"6\",\"cantidad\":\"2\",\"precio\":84000,\"nombre\":\"Falda de cuero\",\"valor_unitario\":\"42000\"},{\"idprod\":\"7\",\"cantidad\":\"11\",\"precio\":231000,\"nombre\":\"Camiseta Calvin Clain\",\"valor_unitario\":\"21000\"}]', '[\"6\",\"7\"]', 5, 315000, 330750),
(15, 'IEA2021030739', 2, '2021/03/07', 1003534663, '[{\"idprod\":\"8\",\"cantidad\":\"2\",\"precio\":60000,\"nombre\":\"Chaqueta nike\",\"valor_unitario\":\"30000\"},{\"idprod\":\"7\",\"cantidad\":\"3\",\"precio\":63000,\"nombre\":\"Camiseta Calvin Clain\",\"valor_unitario\":\"21000\"}]', '[\"8\",\"7\"]', 19, 123000, 146370),
(17, 'IEA2021030755', 2, '2021/03/07', 1003534663, '[{\"idprod\":\"9\",\"cantidad\":\"15\",\"precio\":178500,\"nombre\":\"Pantaloneta\",\"valor_unitario\":\"11900\"},{\"idprod\":\"7\",\"cantidad\":\"1\",\"precio\":21000,\"nombre\":\"Camiseta Calvin Clain\",\"valor_unitario\":\"21000\"}]', '[\"9\",\"7\"]', 30, 199500, 259350),
(18, 'IEA2021030773', 2, '2021/03/07', 1, '[{\"idprod\":\"10\",\"cantidad\":\"1\",\"precio\":10000,\"nombre\":\"Camiseta Peppa Pig\",\"valor_unitario\":\"10000\"},{\"idprod\":\"9\",\"cantidad\":\"1\",\"precio\":11900,\"nombre\":\"Pantaloneta\",\"valor_unitario\":\"11900\"},{\"idprod\":\"8\",\"cantidad\":\"1\",\"precio\":30000,\"nombre\":\"Chaqueta nike\",\"valor_unitario\":\"30000\"},{\"idprod\":\"7\",\"cantidad\":\"1\",\"precio\":21000,\"nombre\":\"Camiseta Calvin Clain\",\"valor_unitario\":\"21000\"},{\"idprod\":\"6\",\"cantidad\":\"1\",\"precio\":42000,\"nombre\":\"Falda de cuero\",\"valor_unitario\":\"42000\"},{\"idprod\":\"4\",\"cantidad\":\"1\",\"precio\":60000,\"nombre\":\"Buzo Nike\",\"valor_unitario\":\"60000\"}]', '[\"10\",\"9\",\"8\",\"7\",\"6\",\"4\"]', 60, 174900, 279840);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `id_inventario` int(11) NOT NULL,
  `tipomovimiento_id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `inventario`
--

INSERT INTO `inventario` (`id_inventario`, `tipomovimiento_id`, `producto_id`, `total`) VALUES
(7, 1, 4, 42),
(8, 1, 6, 30),
(9, 1, 7, 5),
(10, 1, 8, 22),
(11, 1, 9, 74),
(12, 1, 10, 14);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimientos`
--

CREATE TABLE `movimientos` (
  `id_movimiento` int(11) NOT NULL,
  `factura_id` text DEFAULT NULL,
  `tipomovimiento_id` int(11) NOT NULL,
  `producto_id` int(11) DEFAULT NULL,
  `usuario_id` int(11) NOT NULL,
  `total` int(11) DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `movimientos`
--

INSERT INTO `movimientos` (`id_movimiento`, `factura_id`, `tipomovimiento_id`, `producto_id`, `usuario_id`, `total`, `fecha`) VALUES
(27, NULL, 1, 6, 3, 53, '2021-03-05 20:36:11'),
(28, NULL, 1, 7, 3, 35, '2021-03-06 16:45:07'),
(35, NULL, 1, 4, 3, 50, '2021-03-06 18:48:05'),
(38, 'IEA202103061', 2, NULL, 3, NULL, '2021-03-06 19:19:33'),
(42, 'IEA2021030610', 2, NULL, 3, NULL, '2021-03-06 22:27:34'),
(43, 'IEA2021030624', 2, NULL, 2, NULL, '2021-03-06 22:51:48'),
(44, NULL, 3, 7, 2, 1, '2021-03-06 22:52:49'),
(45, NULL, 1, 8, 2, 25, '2021-03-06 23:13:53'),
(46, 'IEA2021030739', 2, NULL, 2, NULL, '2021-03-06 23:14:55'),
(48, NULL, 3, 9, 3, 1, '2021-03-06 23:51:20'),
(49, NULL, 1, 9, 2, 90, '2021-03-07 04:10:02'),
(50, NULL, 1, 10, 2, 15, '2021-03-07 04:10:14'),
(51, 'IEA2021030755', 2, NULL, 2, NULL, '2021-03-07 04:15:48'),
(52, 'IEA2021030773', 2, NULL, 2, NULL, '2021-03-07 04:17:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `id_persona` int(11) NOT NULL,
  `PersoNombres` varchar(75) DEFAULT NULL,
  `Correo` varchar(25) DEFAULT NULL,
  `TipoDoc` enum('Cédula de ciudadanía','Cédula de extranjería','Pasaporte MS') DEFAULT NULL,
  `documento` bigint(20) DEFAULT NULL,
  `Direccion` varchar(20) DEFAULT NULL,
  `Telefono` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`id_persona`, `PersoNombres`, `Correo`, `TipoDoc`, `documento`, `Direccion`, `Telefono`) VALUES
(1, 'Camilo Cruz', 'ccsoler0111@gmail.com', 'Cédula de ciudadanía', 1021213210, 'Cra 12 # 26 - 15', '3005678945'),
(1003534662, 'Cristian Rivera Herrera', 'cristian@gmail.com', 'Cédula de ciudadanía', 1047852310, 'Calle 03 # 25- 356', '3174523658'),
(1003534663, 'Amanda Gómez', 'amanda@gmail.com', 'Cédula de ciudadanía', 75412530, 'Edificio EL Pino', '3251420120'),
(1003534664, 'Rooney Bernal', 'rooney@gmail.com', 'Cédula de ciudadanía', 1024523620, 'Cra 26 #56-12', '3144523625');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas`
--

CREATE TABLE `preguntas` (
  `id_pregunta` int(11) NOT NULL,
  `pregunta` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `preguntas`
--

INSERT INTO `preguntas` (`id_pregunta`, `pregunta`, `fecha`) VALUES
(1, '¿Persona favorita?', '2021-02-25 21:07:50'),
(2, '¿Lugar de nacimiento?', '2021-02-25 21:07:50'),
(3, '¿Nombre de tu mascota?', '2021-02-25 21:07:50'),
(4, '¿Música favorito?', '2021-03-01 18:50:37'),
(5, '¿Deporte favorito?', '2021-03-01 18:52:54'),
(6, '¿Nombre de abuelo materno?', '2021-03-01 18:53:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `idprod` int(10) UNSIGNED NOT NULL,
  `Nombproduc` varchar(60) NOT NULL,
  `PrecCompproduc` float NOT NULL,
  `PrecVentProduc` float NOT NULL,
  `Color` varchar(10) DEFAULT NULL,
  `Iva` float DEFAULT NULL,
  `Estado` enum('Disponible','Agotado') DEFAULT NULL,
  `Material` varchar(20) DEFAULT NULL,
  `Talla` enum('XS','S','M','L','XL','XXL','Otra') DEFAULT NULL,
  `Descripcion` varchar(100) DEFAULT NULL,
  `Proveedores_CodiProve` int(10) UNSIGNED NOT NULL,
  `Categorias_idCate` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idprod`, `Nombproduc`, `PrecCompproduc`, `PrecVentProduc`, `Color`, `Iva`, `Estado`, `Material`, `Talla`, `Descripcion`, `Proveedores_CodiProve`, `Categorias_idCate`) VALUES
(1, 'Camiseta Polo', 145535, 53873, 'azul', 30000, 'Agotado', 'seda', 'XS', NULL, 6, 2),
(2, 'Camiseta Nike importada', 35000, 45000, 'negro', 5, 'Agotado', 'algodon', 'M', '', 6, 2),
(3, 'Camiseta Adidas', 35000, 96000, 'azul', 35, 'Disponible', 'algodon', 'L', NULL, 5, 1),
(4, 'Buzo Nike', 40000, 60000, '', 50, 'Disponible', 'Algodón perchado', 'XL', '', 7, 12),
(5, 'Camiseta manga larga', 10000, 11500, '', 15, 'Agotado', 'tela de seda', NULL, '', 8, 2),
(6, 'Falda de cuero', 40000, 42000, 'Negra', 5, 'Disponible', 'Cuero', 'XS', '', 8, 4),
(7, 'Camiseta Calvin Clain', 15000, 21000, 'Azul claro', 40, 'Disponible', 'Algodón perchado', 'XS', '', 6, 2),
(8, 'Chaqueta nike', 25000, 30000, 'Negra', 20, 'Disponible', 'Impermedable', 'XXL', '', 8, 11),
(9, 'Pantaloneta', 10000, 11900, 'Blanco', 19, 'Disponible', 'Tela licrada', 'L', '', 7, 5),
(10, 'Camiseta Peppa Pig', 10000, 10000, 'rosado', 0, 'Disponible', 'Algodón perchado', 'XL', '', 6, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `CodiProve` int(10) UNSIGNED NOT NULL,
  `ProveNombres` varchar(75) NOT NULL,
  `ProveNumDoc` int(10) UNSIGNED NOT NULL,
  `Correo` varchar(20) DEFAULT NULL,
  `Direccion` varchar(20) NOT NULL,
  `Telefono` varchar(20) DEFAULT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`CodiProve`, `ProveNombres`, `ProveNumDoc`, `Correo`, `Direccion`, `Telefono`, `estado`) VALUES
(6, 'Patricia Oliveros', 75482136, 'patricia_1965@hotmai', 'Cra 12 # 26 - 15', '741258963', 1),
(7, 'Juan Guillermo', 4294967295, 'juanguillermo@hotmai', '760001', '3121541230', 1),
(8, 'Jorge Rodriguez', 11341924, 'jorge@gmail.com', 'Calle 03 # 25- 356', '3133249437', 1),
(9, 'Mariana Nuñez', 524521320, 'mariana@gmail.com', 'Calle 03 # 20-35', '96584123', 1),
(10, 'Enrique López', 582365412, 'enrique@adidas.com', 'Cra 12 # 26 - 15', '1025412012', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registros`
--

CREATE TABLE `registros` (
  `id` int(10) UNSIGNED NOT NULL,
  `estado` int(11) NOT NULL,
  `cargo` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `email` text NOT NULL,
  `password` varchar(100) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `registros`
--

INSERT INTO `registros` (`id`, `estado`, `cargo`, `nombre`, `email`, `password`, `fecha`) VALUES
(2, 1, 2, 'Dairon Rodriguez', 'daironrj203@gmail.com', '$2y$10$NIDzy0vSdESz0izQgeambuN5MR5uWOUOP2ts1tCczpBELEMLGLMIW', '2021-03-04 17:58:06'),
(3, 1, 1, 'Bayron Martinez Cardona', 'bayronfabiancali1@gmail.com', '$2y$10$aQ.Xy/2twCRxoaDee64d7O.RugAdU5fAAWy2.XcTh19G61FqGBkwS', '2021-03-01 20:47:47'),
(4, 1, 1, 'Juan Perez', 'juanperez@gmail.com', '$2y$10$bm1c4TxKy817qrM69I23w.d5FSmdCYhQgC8rcyt0gzU890l85Znt2', '2021-03-07 03:52:51'),
(5, 2, 1, 'María Gómez', 'mariagomez@gmail.com', '$2y$10$wuazCtmmufJSgWh1mpi6H.HKh7nWgqkgIFc7ezgigDz1XTfqvqQH6', '2021-03-01 18:35:54'),
(6, 1, 1, 'Ferney Jimenez', 'ferney@gmail.com', '$2y$10$agl5XeAaXnWZZsu1MePBreS67VqUBUgmZ6FUh8Ga0rrYCKUmpE5qm', '2021-03-02 01:07:17'),
(7, 1, 1, 'Brandon García', 'brandon@gmail.com', '$2y$10$lH6S4o.t2chJRcim35qLMuFUQWp20mHTgPaUfX1YoGTvkvaBewkJi', '2021-03-07 03:52:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguridades`
--

CREATE TABLE `seguridades` (
  `id` int(11) NOT NULL,
  `pregunta_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `respuesta` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `seguridades`
--

INSERT INTO `seguridades` (`id`, `pregunta_id`, `usuario_id`, `respuesta`, `fecha`) VALUES
(1, 3, 1, 'tomas', '2021-02-25 22:09:11'),
(2, 2, 2, 'Bogota', '2021-02-26 01:09:42'),
(3, 1, 3, 'chestercito', '2021-03-01 15:52:03'),
(4, 1, 4, 'ceb', '2021-03-01 17:30:15'),
(5, 3, 5, 'tomas', '2021-03-01 18:35:46'),
(6, 1, 6, 'jesus', '2021-03-02 01:07:29'),
(7, 6, 7, 'José', '2021-03-07 03:52:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipomovimiento`
--

CREATE TABLE `tipomovimiento` (
  `Idmovi` int(11) NOT NULL,
  `TipoMoviDescripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipomovimiento`
--

INSERT INTO `tipomovimiento` (`Idmovi`, `TipoMoviDescripcion`) VALUES
(1, 'Entradas'),
(2, 'Salidas'),
(3, 'Devoluciones'),
(4, 'Otro');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`CodiCargo`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`idCate`);

--
-- Indices de la tabla `devoluciones`
--
ALTER TABLE `devoluciones`
  ADD PRIMARY KEY (`id_devolucion`);

--
-- Indices de la tabla `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indices de la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD PRIMARY KEY (`id_factura`),
  ADD UNIQUE KEY `codigo_factura` (`codigo_factura`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`id_inventario`);

--
-- Indices de la tabla `movimientos`
--
ALTER TABLE `movimientos`
  ADD PRIMARY KEY (`id_movimiento`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`id_persona`);

--
-- Indices de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD PRIMARY KEY (`id_pregunta`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idprod`),
  ADD KEY `Productos_FKIndex2` (`Categorias_idCate`),
  ADD KEY `Productos_FKIndex1` (`Proveedores_CodiProve`) USING BTREE;

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`CodiProve`);

--
-- Indices de la tabla `registros`
--
ALTER TABLE `registros`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`) USING HASH;

--
-- Indices de la tabla `seguridades`
--
ALTER TABLE `seguridades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipomovimiento`
--
ALTER TABLE `tipomovimiento`
  ADD PRIMARY KEY (`Idmovi`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cargo`
--
ALTER TABLE `cargo`
  MODIFY `CodiCargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `idCate` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `devoluciones`
--
ALTER TABLE `devoluciones`
  MODIFY `id_devolucion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `estados`
--
ALTER TABLE `estados`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `facturas`
--
ALTER TABLE `facturas`
  MODIFY `id_factura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
  MODIFY `id_inventario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `movimientos`
--
ALTER TABLE `movimientos`
  MODIFY `id_movimiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `id_persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1003534665;

--
-- AUTO_INCREMENT de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  MODIFY `id_pregunta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `idprod` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `CodiProve` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `registros`
--
ALTER TABLE `registros`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `seguridades`
--
ALTER TABLE `seguridades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tipomovimiento`
--
ALTER TABLE `tipomovimiento`
  MODIFY `Idmovi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
