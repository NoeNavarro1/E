-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-06-2023 a las 19:39:51
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ecovida`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicos`
--

CREATE TABLE `medicos` (
  `Id` int(100) NOT NULL,
  `Clave` int(100) NOT NULL,
  `Nombre` varchar(30) COLLATE utf8_bin NOT NULL,
  `Apellido paterno` varchar(30) COLLATE utf8_bin NOT NULL,
  `Apellido Materno` varchar(30) COLLATE utf8_bin NOT NULL,
  `Sexo` varchar(30) COLLATE utf8_bin NOT NULL,
  `Fecha nacimiento` date NOT NULL,
  `Cédula` int(11) NOT NULL,
  `Centro` varchar(30) COLLATE utf8_bin NOT NULL,
  `Especialidad` varchar(30) COLLATE utf8_bin NOT NULL,
  `Especialidad2` varchar(30) COLLATE utf8_bin NOT NULL,
  `Email` varchar(30) COLLATE utf8_bin NOT NULL,
  `Calle` varchar(30) COLLATE utf8_bin NOT NULL,
  `Numero` int(10) NOT NULL,
  `Municipio` varchar(30) COLLATE utf8_bin NOT NULL,
  `Estado` varchar(30) COLLATE utf8_bin NOT NULL,
  `Codigo potal` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `medicos`
--

INSERT INTO `medicos` (`Id`, `Clave`, `Nombre`, `Apellido paterno`, `Apellido Materno`, `Sexo`, `Fecha nacimiento`, `Cédula`, `Centro`, `Especialidad`, `Especialidad2`, `Email`, `Calle`, `Numero`, `Municipio`, `Estado`, `Codigo potal`) VALUES
(1, 0, 'Victor', 'Sanchez', 'Barrientos', 'Femenino', '2003-12-25', 123456789, 'Huamantla', 'Medico', 'Analista', 'victoralexis@gmail.com', '10 de septiembre', 0, 'Huamantla', 'Tlaxcala', 90500);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `Id` int(3) NOT NULL,
  `Nombre` varchar(20) COLLATE utf8_bin NOT NULL,
  `Apellido Paterno` varchar(20) COLLATE utf8_bin NOT NULL,
  `Apellido Materno` varchar(20) COLLATE utf8_bin NOT NULL,
  `Sexo` varchar(20) COLLATE utf8_bin NOT NULL,
  `Empresa` varchar(20) COLLATE utf8_bin NOT NULL,
  `Fecha de nacimiento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`Id`, `Nombre`, `Apellido Paterno`, `Apellido Materno`, `Sexo`, `Empresa`, `Fecha de nacimiento`) VALUES
(1, 'Arlette Stefany', 'Arenas', 'Luna', 'Femenino', 'Publico general', '2003-07-29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `Id` int(2) NOT NULL,
  `Usuario` varchar(20) COLLATE tis620_bin NOT NULL,
  `Contraseña` varchar(20) COLLATE tis620_bin NOT NULL,
  `Sucursal` varchar(20) COLLATE tis620_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=tis620 COLLATE=tis620_bin COMMENT='Tabla en proceso de creacion. puede que haya modificaciones ';

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Id`, `Usuario`, `Contraseña`, `Sucursal`) VALUES
(1, 'Vero', '123', 'Huamantla'),
(2, 'Oskar', '123', 'Huamantla'),
(3, 'Victor', '123', 'Grajales'),
(4, 'Alondra', '123', 'Cuapiaxtla');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `medicos`
--
ALTER TABLE `medicos`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `medicos`
--
ALTER TABLE `medicos`
  MODIFY `Id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `Id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `Id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
