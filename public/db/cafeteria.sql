-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 27-10-2022 a las 00:05:47
-- Versión del servidor: 5.7.33
-- Versión de PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cafeteria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `referencia` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `nombreProducto` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `precio` int(11) NOT NULL,
  `peso` int(11) NOT NULL,
  `categoria` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `stock` int(11) NOT NULL,
  `fechaCreacion` timestamp NOT NULL,
  `fechaEdicion` timestamp NULL DEFAULT NULL,
  `fechaEliminacion` timestamp NULL DEFAULT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `referencia`, `nombreProducto`, `precio`, `peso`, `categoria`, `stock`, `fechaCreacion`, `fechaEdicion`, `fechaEliminacion`, `estado`) VALUES
(1, '123aaa', 'repollo', 200, 0, 'salchicha', 2, '2022-10-21 02:28:08', '2022-10-21 05:37:02', NULL, 0),
(2, '132bbbx', 'yuca', 200, 0, 'alimento', 0, '2022-10-21 03:16:34', '2022-10-21 05:37:26', NULL, 0),
(3, '123ccc', 'Roberto ', 300, 0, 'alimento', 0, '2022-10-21 03:18:05', '2022-10-21 03:18:05', NULL, 1),
(4, '123ddd', 'Sara ', 29, 10, 'alimento', 6, '2022-10-21 03:19:34', '2022-10-21 05:29:49', NULL, 1),
(5, '123ffff', 'Pera', 8000, 80, 'alimento', 11, '2022-10-21 03:20:41', '2022-10-21 03:20:41', NULL, 1),
(6, '1234a', 'lapiz', 200, 14, 'item', 5, '2022-10-21 04:13:12', '2022-10-21 04:13:12', NULL, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
