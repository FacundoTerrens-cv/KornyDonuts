-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-01-2022 a las 11:36:47
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mapas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_transaccion` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `fecha` datetime NOT NULL,
  `status` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `id_ciente` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `total_compra` decimal(10,2) NOT NULL,
  `nombre_producto` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `cantidad_productos` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `sucursal` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `nota_pedido` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `estado_entrega` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `compra`
--

INSERT INTO `compra` (`id`, `id_user`, `id_transaccion`, `fecha`, `status`, `email`, `id_ciente`, `total_compra`, `nombre_producto`, `cantidad_productos`, `sucursal`, `nota_pedido`, `estado_entrega`) VALUES
(1, 1, '42M03204L1546440G', '2021-12-16 19:58:55', 'COMPLETED', 'sb-5sun38923385@personal.example.com', 'H6366QJSPSQAG', '10.00', 'Fizzypop', '1', 'love', 'me gustaria que venga sin sal', 'PENDIENTE'),
(2, 1, '02561448542127845', '2021-12-16 20:26:52', 'COMPLETED', 'sb-5sun38923385@personal.example.com', 'H6366QJSPSQAG', '10.00', 'Fizzypop', '1', 'love', 'nose', 'PENDIENTE'),
(3, 4, '1NJ308267W633783C', '2021-12-16 22:54:54', 'COMPLETED', 'sb-5sun38923385@personal.example.com', 'H6366QJSPSQAG', '20.00', 'Sitrus', '2', 'love', 'SIN SAL POR FAOR', 'PENDIENTE'),
(4, 4, '68U58022PS215682M', '2021-12-17 06:10:52', 'COMPLETED', 'sb-5sun38923385@personal.example.com', 'H6366QJSPSQAG', '40.00', 'Sitrus', '4', 'love', 'lo quiero sin dulce de leche', 'PENDIENTE'),
(5, 4, '8EV92059WH977434R', '2021-12-17 13:12:31', 'COMPLETED', 'sb-5sun38923385@personal.example.com', 'H6366QJSPSQAG', '10.00', 'Fizzypop', '1', 'love', '', 'PENDIENTE'),
(6, 4, '71J87417714212258', '2021-12-17 13:36:43', 'COMPLETED', 'sb-5sun38923385@personal.example.com', 'H6366QJSPSQAG', '10.00', 'Fizzypop', '1', 'love', 'porfavor sin azucar de mas', 'PENDIENTE'),
(7, 4, '9J703148U9190392V', '2021-12-20 06:13:12', 'COMPLETED', 'sb-5sun38923385@personal.example.com', 'H6366QJSPSQAG', '30.00', 'Fizzypop', '3', 'love', 'lo quiero sin chocolate', 'PENDIENTE'),
(8, 4, '93F445451U7999333', '2021-12-24 04:45:03', 'COMPLETED', 'sb-5sun38923385@personal.example.com', 'H6366QJSPSQAG', '60.00', 'Fizzypop', '6', 'love', 'soy intolerante a la lactosa', 'PENDIENTE'),
(9, 4, '1FP55673T5837124V', '2021-12-24 04:48:58', 'COMPLETED', 'sb-5sun38923385@personal.example.com', 'H6366QJSPSQAG', '126.00', 'Oreoo', '9', 'love', 'soy re capo', 'PENDIENTE'),
(10, 4, '6HJ581222B839392F', '2021-12-29 19:47:07', 'COMPLETED', 'sb-5sun38923385@personal.example.com', 'H6366QJSPSQAG', '20.00', 'Fizzypop', '2', 'love', 'sin harinas', 'PENDIENTE'),
(11, 4, '32T86063EK027171N', '2022-01-05 16:43:26', 'COMPLETED', 'sb-5sun38923385@personal.example.com', 'H6366QJSPSQAG', '40.00', 'Fizzypop', '4', 'love', 'sin sal', 'PENDIENTE'),
(12, 4, '7LJ040053X2149520', '2022-01-15 18:11:10', 'COMPLETED', 'sb-5sun38923385@personal.example.com', 'H6366QJSPSQAG', '28.00', 'Oreoo', '2', 'love', '', 'PENDIENTE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_compra`
--

CREATE TABLE `detalle_compra` (
  `id` int(11) NOT NULL,
  `id_compra` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `nombre` varchar(200) COLLATE utf8mb4_spanish_ci NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direccion`
--

CREATE TABLE `direccion` (
  `id` int(11) NOT NULL,
  `direccion` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `direccion`
--

INSERT INTO `direccion` (`id`, `direccion`) VALUES
(1, '0'),
(2, 'LAS MARIAS'),
(3, 'los robles'),
(4, 'las avutardas'),
(5, 'los robles'),
(6, 'los robles'),
(7, 'los robles'),
(8, 'los robles'),
(9, 'LOS ROBLES'),
(10, 'LOS ROBLES'),
(11, 'LOS ROBLES'),
(12, 'LOS ROBLES'),
(13, 'LOS ROBLES'),
(14, 'LOS ROBLES'),
(15, 'los robles'),
(16, 'LOS ROBLES'),
(17, 'LOS ROBLES'),
(18, 'LOS ROBLES');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `faq_section`
--

CREATE TABLE `faq_section` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `texto` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `faq_section`
--

INSERT INTO `faq_section` (`id`, `titulo`, `texto`) VALUES
(3, 'Titulo de prueba ', 'texto de prueba para rami'),
(4, 'como hago para comprar?', 'se compra agregando al acrrito y pagaondo con paypal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `markers`
--

CREATE TABLE `markers` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `address` varchar(80) NOT NULL,
  `city` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  `type` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `markers`
--

INSERT INTO `markers` (`id`, `name`, `address`, `city`, `time`, `lat`, `lng`, `type`) VALUES
(14, 'casa de los abuelos', 'los robles', 'Dina Huapi', '9 a 22', -41.075848, -71.150696, ''),
(13, 'Korny Donuts', 'Bogavegen', 'Steinkjer', '10am', 64.016655, 11.495185, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `tipo_producto` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `price` decimal(20,0) NOT NULL,
  `description` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `name`, `tipo_producto`, `price`, `description`, `image`) VALUES
(34, 'Oreoo', 'volvo', '14', 'Donut Oreo  ', 'kd1.png'),
(35, 'Ostekrem m/latté', 'volvo', '15', 'Ostekrem m/latté', 'kd2.png'),
(41, 'Fizzypop', 'Donuts', '10', 'Fizzypop', 'kd13.png'),
(42, 'Sitrus', 'Donuts', '10', 'Sitrus', 'kd3(1).png'),
(43, 'Ostekrem m/daim', 'Donuts', '10', 'Ostekrem m/daim', 'kd4(1).png'),
(44, 'Sjokolade m/kinder', 'Donuts', '10', 'Sjokolade m/kinder', 'kd5.png'),
(45, 'Sjokolade m/karamell', 'Donuts', '10', 'Sjokolade m/karamell', 'kd6.png'),
(46, 'Sjokolade', 'Donuts', '10', 'Sjokolade', 'kd7.png'),
(47, 'Kvikk lunsj', 'Donuts', '10', 'Kvikk lunsj', 'kd8.png'),
(48, 'Twix', 'Donuts', '10', 'Twix', 'kd9.png'),
(49, 'Snickers m/karamelliserte nøtter', 'Donuts', '10', 'Snickers m/karamelliserte nøtter ', 'kd10.png'),
(50, 'Sour', 'Donuts', '10', 'Sour', 'kd11.png'),
(51, 'Tutti frutti', 'Donuts', '10', 'Tutti frutti', 'kd12.png'),
(52, 'Unicorn', 'Donuts', '10', 'Unicorn', 'kd14.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `roles` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `roles`) VALUES
(1, 'admin'),
(2, 'client');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbldetalleventa`
--

CREATE TABLE `tbldetalleventa` (
  `id` int(11) NOT NULL,
  `IDVenta` int(11) NOT NULL,
  `IDProducto` int(11) NOT NULL,
  `PrecioUnitario` decimal(20,2) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Entregado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblventas`
--

CREATE TABLE `tblventas` (
  `id` int(11) NOT NULL,
  `ClaveTransaccion` varchar(250) COLLATE utf8mb4_spanish_ci NOT NULL,
  `PaypalDatos` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `Fecha` datetime NOT NULL,
  `Correo` varchar(5000) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Total` decimal(60,2) NOT NULL,
  `Status` varchar(200) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `tblventas`
--

INSERT INTO `tblventas` (`id`, `ClaveTransaccion`, `PaypalDatos`, `Fecha`, `Correo`, `Total`, `Status`) VALUES
(1, '12345678910', '', '2021-11-17 11:34:58', 'terrens@gmail.com', '700.00', 'pendiente'),
(2, '12345678910', '', '2021-11-17 11:34:58', 'terrens@gmail.com', '700.00', 'pendiente'),
(3, 'l3dninhv8rmjor16khku9oshbc', '', '2021-11-17 11:45:52', 'terrens2@gmail.com', '90.00', 'pendiente'),
(4, 'l3dninhv8rmjor16khku9oshbc', '', '2021-11-17 11:48:53', 'terrens2@gmail.com', '135.00', 'pendiente'),
(5, 'l3dninhv8rmjor16khku9oshbc', '', '2021-11-17 11:49:11', 'marcos3@gmail.com', '135.00', 'pendiente'),
(6, 'l3dninhv8rmjor16khku9oshbc', '', '2021-11-17 12:04:23', 'terrens@gmail.com', '60.00', 'pendiente'),
(7, 'l3dninhv8rmjor16khku9oshbc', '', '2021-11-17 12:05:58', 'terrens@gmail.com', '70.00', 'pendiente'),
(8, 'l3dninhv8rmjor16khku9oshbc', '', '2021-11-17 12:21:07', 'luisina@gmail.com', '70.00', 'pendiente'),
(9, 'l3dninhv8rmjor16khku9oshbc', '', '2021-11-17 12:21:49', 'luisina@gmail.com', '70.00', 'pendiente'),
(10, 'l3dninhv8rmjor16khku9oshbc', '', '2021-11-17 12:22:44', 'luisina@gmail.com', '70.00', 'pendiente'),
(11, 'l3dninhv8rmjor16khku9oshbc', '', '2021-11-17 14:17:40', 'terrens@gmail.com', '70.00', 'pendiente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_data`
--

CREATE TABLE `user_data` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `pass` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `age` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `rol_id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `user_data`
--

INSERT INTO `user_data` (`id`, `username`, `pass`, `phone`, `age`, `email`, `rol_id`) VALUES
(2, 'facundoterrens', 'facuterrens123', '2944370817', 20, 'terrens@gmail.com', 1),
(3, 'facundo terrens', 'facuterrens123', '2944370817', 21, 'elterrens800@gmail.com', 2),
(4, 'Cristian', 'cristian', '2944556677', 35, 'cristian@gmail.com', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `direccion`
--
ALTER TABLE `direccion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `faq_section`
--
ALTER TABLE `faq_section`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `markers`
--
ALTER TABLE `markers`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbldetalleventa`
--
ALTER TABLE `tbldetalleventa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDVenta` (`IDVenta`),
  ADD KEY `IDProducto` (`IDProducto`);

--
-- Indices de la tabla `tblventas`
--
ALTER TABLE `tblventas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `user_data`
--
ALTER TABLE `user_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rol_id` (`rol_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `direccion`
--
ALTER TABLE `direccion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `faq_section`
--
ALTER TABLE `faq_section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `markers`
--
ALTER TABLE `markers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tbldetalleventa`
--
ALTER TABLE `tbldetalleventa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `tblventas`
--
ALTER TABLE `tblventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `user_data`
--
ALTER TABLE `user_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbldetalleventa`
--
ALTER TABLE `tbldetalleventa`
  ADD CONSTRAINT `tbldetalleventa_ibfk_1` FOREIGN KEY (`IDVenta`) REFERENCES `tblventas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbldetalleventa_ibfk_2` FOREIGN KEY (`IDProducto`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `user_data`
--
ALTER TABLE `user_data`
  ADD CONSTRAINT `user_data_ibfk_1` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
