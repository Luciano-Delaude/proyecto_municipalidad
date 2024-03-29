-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-01-2020 a las 13:42:03
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";
create database proyecto_muni;
use proyecto_muni;
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto_muni`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administradores`
--

CREATE TABLE `administradores` (
  `id_admin` int(11) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `password` varchar(20) NOT NULL,
  `id_municipio` int(11) DEFAULT NULL,
  `rol` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `administradores`
--

INSERT INTO `administradores` (`id_admin`, `usuario`, `password`, `id_municipio`, `rol`) VALUES
(1, 'azuladm', 'W6zuST!r9HZ8Xd!$', 1, NULL),
(2, 'olavadm', 'xZ6HmffbG!g%3zpj', 78, NULL),
(3, 'lezamadm', 'b9&vRS?s$xZbYQQX', 135, NULL),
(4, 'mardeladm', 'LrdkKG%dLT%7^_Z8', 10, NULL),
(7, 'superAdm', '5%;87hBVx:RY]NLpm', NULL, 'super');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `dni` int(11) DEFAULT NULL,
  `n_tarjeta` varchar(16) NOT NULL,
  `pin_tarjeta` smallint(6) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `saldo` double UNSIGNED DEFAULT NULL,
  `id_municipalidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`dni`, `n_tarjeta`, `pin_tarjeta`, `nombre`, `saldo`, `id_municipalidad`) VALUES
(12654789, '2001013512654789', 654, 'Sancho Panza', 2000000, 1),
(38297408, '2001013513896608', 123, 'Luciano', 5000, 1),
(15468798, '2001013515468798', 528, 'Juancho Talarga', 2000000, 1),
(25894689, '2001013525894689', 964, 'Pedro Lopez', 20000, 1),
(38297408, '2001013538297408', 121, 'ElLuchin', 50, 1),
(65489256, '2001013565489256', 573, 'Fernando Rodriguez', 20000, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipalidades`
--

CREATE TABLE `municipalidades` (
  `id_municipalidad` int(11) NOT NULL,
  `n_provincia` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `n_empleados` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `municipalidades`
--

INSERT INTO `municipalidades` (`id_municipalidad`, `n_provincia`, `nombre`, `n_empleados`) VALUES
(0, 0, '', 0),
(1, 1, 'MDP', 3),
(2, 15, 'Río Negro', 4000),
(135, 22, 'Lezama', 284567);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id_proveedor` int(11) NOT NULL,
  `id_municipalidad` int(3) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `categoria` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id_proveedor`, `id_municipalidad`, `nombre`, `direccion`, `categoria`) VALUES
(1, 1, 'Sancor', 'Las heras 2358', 3),
(2, 1, 'Toledo', 'Lamadrid 4353', 6),
(3, 1, 'Walmart', 'San Juan 5000', 12),
(4, 1, 'Carrefour', 'Gonzalez perez 4578', 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transacciones`
--

CREATE TABLE `transacciones` (
  `n_tarjeta` varchar(16) DEFAULT NULL,
  `id_proveedor` int(11) DEFAULT NULL,
  `n_transaccion` int(11) NOT NULL,
  `monto` double UNSIGNED DEFAULT NULL,
  `fecha` timestamp DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `transacciones`
--

INSERT INTO `transacciones` (`n_tarjeta`, `id_proveedor`, `n_transaccion`, `monto`, `fecha`) VALUES
('1', 1, 1, 1, '2020-11-22'),
('3', 1, 3, 3, '2020-11-25'),
('1', 1, 4, 1, '2020-11-23'),
('2001013525894689', 4, 2147483647, 200, '2020-03-24');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`id_admin`),
  ADD KEY `id_municipio` (`id_municipio`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`n_tarjeta`),
  ADD KEY `id_municipalidad` (`id_municipalidad`);

--
-- Indices de la tabla `municipalidades`
--
ALTER TABLE `municipalidades`
  ADD PRIMARY KEY (`id_municipalidad`,`n_provincia`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id_proveedor`,`id_municipalidad`),
  ADD KEY `id_municipalidad` (`id_municipalidad`);

--
-- Indices de la tabla `transacciones`
--
ALTER TABLE `transacciones`
  ADD PRIMARY KEY (`n_transaccion`),
  ADD KEY `n_tarjeta` (`n_tarjeta`),
  ADD KEY `id_proveedor` (`id_proveedor`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id_proveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `administradores`
--
ALTER TABLE `administradores`
  ADD CONSTRAINT `administradores_ibfk_1` FOREIGN KEY (`id_municipio`) REFERENCES `municipalidades` (`id_municipalidad`);

--
-- Filtros para la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD CONSTRAINT `empleados_ibfk_1` FOREIGN KEY (`id_municipalidad`) REFERENCES `municipalidades` (`id_municipalidad`);

--
-- Filtros para la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD CONSTRAINT `proveedores_ibfk_1` FOREIGN KEY (`id_municipalidad`) REFERENCES `municipalidades` (`id_municipalidad`);
--
-- Filtros para la tabla `transacciones`
--
ALTER TABLE `transacciones`
  ADD CONSTRAINT `transacciones_ibfk_1` FOREIGN KEY (`n_tarjeta`) REFERENCES `empleados` (`n_tarjeta`),
  ADD CONSTRAINT `transacciones_ibfk_2` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedores` (`id_proveedor`);

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
