-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-03-2019 a las 01:38:59
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `optometria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catalogo`
--

CREATE TABLE `catalogo` (
  `id_catalogo` bigint(20) UNSIGNED NOT NULL,
  `fk_producto` bigint(20) UNSIGNED DEFAULT NULL,
  `fk_usuario` bigint(20) UNSIGNED DEFAULT NULL,
  `referencia` varchar(16) NOT NULL,
  `marca` varchar(16) NOT NULL,
  `tipo` varchar(16) NOT NULL,
  `imagen` varchar(100) NOT NULL,
  `costo` bigint(20) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` bigint(20) UNSIGNED NOT NULL,
  `cedula` varchar(15) NOT NULL,
  `primer_nombre` varchar(100) NOT NULL,
  `segundo_nombre` varchar(100) DEFAULT NULL,
  `primer_apellido` varchar(100) NOT NULL,
  `segundo_apellido` varchar(100) DEFAULT NULL,
  `fecha_nacimiento` date NOT NULL,
  `ciudad_vivienda` varchar(100) NOT NULL,
  `direccion_vivienda` varchar(100) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `celular` varchar(15) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `ocupacion` varchar(100) DEFAULT NULL,
  `empresa_laboral` varchar(100) DEFAULT NULL,
  `telefono_empresa` varchar(100) DEFAULT NULL,
  `disponibilidad_llamadas` tinyint(1) NOT NULL,
  `usa_gafas` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historia_clinica`
--

CREATE TABLE `historia_clinica` (
  `id_historia_clinica` bigint(20) UNSIGNED NOT NULL,
  `fk_usuario` bigint(20) UNSIGNED NOT NULL,
  `fk_cliente` bigint(20) UNSIGNED NOT NULL,
  `patologia1` varchar(100) DEFAULT NULL,
  `patologia2` varchar(100) DEFAULT NULL,
  `patologia3` varchar(100) DEFAULT NULL,
  `tratamiento1` varchar(100) DEFAULT NULL,
  `tratamiento2` varchar(100) DEFAULT NULL,
  `tratamiento3` varchar(100) DEFAULT NULL,
  `cronicidad1` varchar(100) DEFAULT NULL,
  `cronicidad2` varchar(100) DEFAULT NULL,
  `cronicidad3` varchar(100) DEFAULT NULL,
  `observacion1` varchar(100) DEFAULT NULL,
  `observacion2` varchar(100) DEFAULT NULL,
  `observacion3` varchar(100) DEFAULT NULL,
  `anamnesis` varchar(100) NOT NULL,
  `rx_uso_od_esfera` varchar(100) DEFAULT NULL,
  `rx_uso_od_cilindro` varchar(100) DEFAULT NULL,
  `rx_uso_od_eje` varchar(100) DEFAULT NULL,
  `rx_uso_od_adicion` varchar(100) DEFAULT NULL,
  `rx_uso_oi_esfera` varchar(100) DEFAULT NULL,
  `rx_uso_oi_cilindro` varchar(100) DEFAULT NULL,
  `rx_uso_oi_eje` varchar(100) DEFAULT NULL,
  `rx_uso_oi_adicion` varchar(100) DEFAULT NULL,
  `vision_lejos_od` varchar(100) DEFAULT NULL,
  `vision_lejos_oi` varchar(100) DEFAULT NULL,
  `vision_cerca_od` varchar(100) DEFAULT NULL,
  `vision_cerca_oi` varchar(100) DEFAULT NULL,
  `examen_externo_od` varchar(100) NOT NULL,
  `examen_externo_oi` varchar(100) NOT NULL,
  `reflejos_pupilares_fotomotor` varchar(100) NOT NULL,
  `reflejos_pupilares_consensual` varchar(100) NOT NULL,
  `reflejos_pupilares_acomodacion` varchar(100) NOT NULL,
  `cover_test_vision_lejos` varchar(100) DEFAULT NULL,
  `cover_test_vision_proxima` varchar(100) DEFAULT NULL,
  `cover_test_ducciones` varchar(100) DEFAULT NULL,
  `cover_test_versiones` varchar(100) DEFAULT NULL,
  `od_oftalmoloscopio` varchar(100) NOT NULL,
  `oi_oftalmoloscopio` varchar(100) NOT NULL,
  `od_queratrometra` varchar(100) NOT NULL,
  `oi_queratrometra` varchar(100) NOT NULL,
  `od_retinoscopia` varchar(100) NOT NULL,
  `oi_retinoscopia` varchar(100) NOT NULL,
  `rx_final_od_esfera` varchar(100) DEFAULT NULL,
  `rx_final_od_cilindro` varchar(100) DEFAULT NULL,
  `rx_final_od_eje` varchar(100) DEFAULT NULL,
  `rx_final_od_adicion` varchar(100) DEFAULT NULL,
  `rx_final_oi_esfera` varchar(100) DEFAULT NULL,
  `rx_final_oi_cilindro` varchar(100) DEFAULT NULL,
  `rx_final_oi_eje` varchar(100) DEFAULT NULL,
  `rx_final_oi_adicion` varchar(100) DEFAULT NULL,
  `rx_final_od_agudes_visual` varchar(100) DEFAULT NULL,
  `rx_final_oi_agudes_visual` varchar(100) DEFAULT NULL,
  `diagnostico` varchar(100) DEFAULT NULL,
  `control` varchar(100) DEFAULT NULL,
  `observacion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_producto` bigint(20) UNSIGNED NOT NULL,
  `nombre_producto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id_rol` bigint(20) UNSIGNED NOT NULL,
  `rol` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_roles` bigint(20) UNSIGNED NOT NULL,
  `fk_usuario` bigint(20) UNSIGNED DEFAULT NULL,
  `fk_rol` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` bigint(20) UNSIGNED NOT NULL,
  `cedula` varchar(15) NOT NULL,
  `nombres` varchar(60) NOT NULL,
  `apellidos` varchar(60) NOT NULL,
  `usuario_password` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `catalogo`
--
ALTER TABLE `catalogo`
  ADD PRIMARY KEY (`id_catalogo`),
  ADD KEY `fk_producto` (`fk_producto`,`fk_usuario`),
  ADD KEY `fk_usuario` (`fk_usuario`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `historia_clinica`
--
ALTER TABLE `historia_clinica`
  ADD PRIMARY KEY (`id_historia_clinica`),
  ADD KEY `fk_usuario` (`fk_usuario`,`fk_cliente`),
  ADD KEY `fk_cliente` (`fk_cliente`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_roles`),
  ADD KEY `fk_usuario` (`fk_usuario`,`fk_rol`),
  ADD KEY `fk_rol` (`fk_rol`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `catalogo`
--
ALTER TABLE `catalogo`
  MODIFY `id_catalogo` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `historia_clinica`
--
ALTER TABLE `historia_clinica`
  MODIFY `id_historia_clinica` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id_rol` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_roles` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `catalogo`
--
ALTER TABLE `catalogo`
  ADD CONSTRAINT `catalogo_ibfk_1` FOREIGN KEY (`fk_producto`) REFERENCES `producto` (`id_producto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `catalogo_ibfk_2` FOREIGN KEY (`fk_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `historia_clinica`
--
ALTER TABLE `historia_clinica`
  ADD CONSTRAINT `historia_clinica_ibfk_1` FOREIGN KEY (`fk_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `historia_clinica_ibfk_2` FOREIGN KEY (`fk_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `roles`
--
ALTER TABLE `roles`
  ADD CONSTRAINT `roles_ibfk_1` FOREIGN KEY (`fk_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `roles_ibfk_2` FOREIGN KEY (`fk_rol`) REFERENCES `rol` (`id_rol`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
