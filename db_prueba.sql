-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-11-2019 a las 19:17:32
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto`
--

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
(38917478, "1", 123, 'ElSantiPiola', 50, 1),
(38297408, "2001013538297408", 121, 'ElLuchin', 50, 1),
(35796172, "3", 120, 'Leox', 51, 1);

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
(1, 1, 'MDP', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id_proveedor` int(11) NOT NULL,
  `id_municipalidad` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `categoria` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id_proveedor`, `id_municipalidad`, `nombre`, `direccion`, `categoria`) VALUES
(1, 1, 'Rfe', 'Alberti', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transacciones`
--

CREATE TABLE `transacciones` (
  `n_tarjeta` varchar(16) DEFAULT NULL,
  `id_proveedor` int(11) DEFAULT NULL,
  `n_transaccion` int(11) NOT NULL,
  `monto` double UNSIGNED DEFAULT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `transacciones`
--

INSERT INTO `transacciones` (`n_tarjeta`, `id_proveedor`, `n_transaccion`, `monto`, `fecha`) VALUES
("1", 1, 1, 1, '2019-11-22'),
("2", 1, 2, 2, '2019-11-27'),
("3", 1, 3, 3, '2019-11-25'),
("1", 1, 4, 1, '2019-11-23'),
("2", 1, 5, 2, '2019-11-20'),
("3", 1, 6, 3, '2019-11-23');

--
-- Índices para tablas volcadas
--

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
-- Restricciones para tablas volcadas
--

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
