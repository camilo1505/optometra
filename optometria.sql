-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-04-2019 a las 02:34:48
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `imagen` varchar(100) NOT NULL,
  `costo` bigint(20) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `promocion` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `catalogo`
--

INSERT INTO `catalogo` (`id_catalogo`, `fk_producto`, `fk_usuario`, `referencia`, `marca`, `imagen`, `costo`, `descripcion`, `promocion`) VALUES
(55, 2, 3, '3', '2', '', 3, '4', 0),
(56, 37, 3, '22344', 'extraterrestre', '', 5000, 'hola soy una prueba', 1),
(57, 37, 3, '1', '2', 'Desert.jpg', 3, '4', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` bigint(20) UNSIGNED NOT NULL,
  `cedula` varchar(15) NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `nacimiento` date NOT NULL,
  `ciudad` varchar(100) NOT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `celular` varchar(15) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `disponibilidad_llamadas` tinyint(1) NOT NULL,
  `usa_gafas` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `cedula`, `nombres`, `apellidos`, `nacimiento`, `ciudad`, `direccion`, `telefono`, `celular`, `correo`, `disponibilidad_llamadas`, `usa_gafas`) VALUES
(1, '7894210220', 'Carlos', 'Mendez', '2019-03-07', 'Pereira', 'MZ 80 Cs 30 Toronjal', '584515185', '5185185151', 'correo@ejemplo.com', 1, 1),
(2, '4564867486', 'weqweqw', 'eqweqwedqwe', '2019-03-07', 'qweqwed', 'qwedqwedqwd', 'qwedqwdqwd', 'qwdqwdqwed', 'qwdqwdqwdeqa', 0, 0);

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
  `anamnesis` varchar(500) NOT NULL,
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
  `control` date DEFAULT NULL,
  `observacion` varchar(100) DEFAULT NULL,
  `fecha` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `historia_clinica`
--

INSERT INTO `historia_clinica` (`id_historia_clinica`, `fk_usuario`, `fk_cliente`, `patologia1`, `patologia2`, `patologia3`, `tratamiento1`, `tratamiento2`, `tratamiento3`, `cronicidad1`, `cronicidad2`, `cronicidad3`, `observacion1`, `observacion2`, `observacion3`, `anamnesis`, `rx_uso_od_esfera`, `rx_uso_od_cilindro`, `rx_uso_od_eje`, `rx_uso_od_adicion`, `rx_uso_oi_esfera`, `rx_uso_oi_cilindro`, `rx_uso_oi_eje`, `rx_uso_oi_adicion`, `vision_lejos_od`, `vision_lejos_oi`, `vision_cerca_od`, `vision_cerca_oi`, `examen_externo_od`, `examen_externo_oi`, `reflejos_pupilares_fotomotor`, `reflejos_pupilares_consensual`, `reflejos_pupilares_acomodacion`, `cover_test_vision_lejos`, `cover_test_vision_proxima`, `cover_test_ducciones`, `cover_test_versiones`, `od_oftalmoloscopio`, `oi_oftalmoloscopio`, `od_queratrometra`, `oi_queratrometra`, `od_retinoscopia`, `oi_retinoscopia`, `rx_final_od_esfera`, `rx_final_od_cilindro`, `rx_final_od_eje`, `rx_final_od_adicion`, `rx_final_oi_esfera`, `rx_final_oi_cilindro`, `rx_final_oi_eje`, `rx_final_oi_adicion`, `rx_final_od_agudes_visual`, `rx_final_oi_agudes_visual`, `diagnostico`, `control`, `observacion`, `fecha`) VALUES
(1, 2, 1, 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', '', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'aa', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', '', 'a', 'aa', '', 'a', 'a', 'a', 'a', 'a', '2018-03-08', 'a', '2019-04-15-04-35-09'),
(2, 2, 1, 'ed', 'd', 'd', 'rd', 'd', 'r', 'fr', 'f', 'v', 'v', 'tv', 'yf', 'vvf', 'vfv', 'yfv', 'yfv', 'yfv', 'yfv', 'yfv', 'yfv', 'yfv', 'yf', 'vyf', 'vfy', 'vyf', 'v', 'yfv', 'yv', 'yv', 'yv', 'yv', 'yfv', 'yfv', 'yfv', 'yf', 'yfv', 'vyf', 'vy', 'vy', 'v', 'yv', 'yv', 'yv', 'yv', 'yv', 'yv', 'yf', 'yfgv', 'yfv', 'yfv', 'yfv', '0000-00-00', 'y', '2019-04-15-08-33-45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_producto` bigint(20) UNSIGNED NOT NULL,
  `nombre_producto` varchar(100) NOT NULL,
  `activado` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `nombre_producto`, `activado`) VALUES
(1, 'Gafas de Sol Solaris', 0),
(2, 'Gafas Gucchi', 0),
(3, 'Liquido Aqua', 0),
(11, 'Estuche Gafas 1', 0),
(16, 'lentes de Contacto', 0),
(37, 'Pañuelo', 0),
(40, 'Gafas bien Gays', 0),
(41, 'camisas grandes', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id_rol` bigint(20) UNSIGNED NOT NULL,
  `rol` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_rol`, `rol`) VALUES
(1, 'administrador'),
(3, 'Auxiliar'),
(2, 'Optometra');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_roles` bigint(20) UNSIGNED NOT NULL,
  `fk_usuario` bigint(20) UNSIGNED DEFAULT NULL,
  `fk_rol` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_roles`, `fk_usuario`, `fk_rol`) VALUES
(4, 2, 2),
(5, 3, 1),
(6, 4, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` bigint(20) UNSIGNED NOT NULL,
  `cedula` varchar(15) NOT NULL,
  `nombres` varchar(60) NOT NULL,
  `apellidos` varchar(60) NOT NULL,
  `usuario_password` varchar(300) NOT NULL,
  `activado` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `cedula`, `nombres`, `apellidos`, `usuario_password`, `activado`) VALUES
(2, '123456789', 'asdasdasd', 'asdasdasdasd', '$2y$10$HVfP4OwpNhzUovhPR/v6hOKvoOQBfrjl.ya3WrjRYgswLuZVp5BRW', 1),
(3, 'admin', 'administrador', 'administrador', '$2y$10$7R8OLQJJ7ma6bfwEcr7z0e6nomtFJaLO6axn0FEpKaX3hFnbLKvve', 0),
(4, '42100855', 'Marisol', 'Agudelo', '$2y$10$Rcr7ROp7bjj6cUEvOVRoauZTmseHh29SfvSjkgbdn4PSsUILx6aKy', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `catalogo`
--
ALTER TABLE `catalogo`
  ADD PRIMARY KEY (`id_catalogo`),
  ADD UNIQUE KEY `referencia` (`referencia`),
  ADD KEY `fk_producto` (`fk_producto`,`fk_usuario`),
  ADD KEY `fk_usuario` (`fk_usuario`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`),
  ADD UNIQUE KEY `cedula` (`cedula`);

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
  ADD PRIMARY KEY (`id_producto`),
  ADD UNIQUE KEY `nombre_producto` (`nombre_producto`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_rol`),
  ADD UNIQUE KEY `rol` (`rol`);

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
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `cedula` (`cedula`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `catalogo`
--
ALTER TABLE `catalogo`
  MODIFY `id_catalogo` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `historia_clinica`
--
ALTER TABLE `historia_clinica`
  MODIFY `id_historia_clinica` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id_rol` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_roles` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
