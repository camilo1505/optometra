-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-04-2019 a las 02:46:08
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
  `imagen` varchar(100) NOT NULL,
  `costo` bigint(20) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `promocion` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `catalogo`
--

INSERT INTO `catalogo` (`id_catalogo`, `fk_producto`, `fk_usuario`, `referencia`, `marca`, `imagen`, `costo`, `descripcion`, `promocion`) VALUES
(1, 1, 2, 'Q1W3RT', 'Avorion', 'uploads/gafasQ1W3RT.jpg', 400000, 'Gafas de marco negro, Material de Carbonato, acabado elegante', 0),
(2, 2, 2, 'KJO789X', 'Sunshine', 'uploads/gafas solKJO789X.jpg', 800000, 'Gafas de sol negras, material policarbonato y metal, el lente tiene filtro solar grado 10', 0),
(3, 3, 2, 'HXB1345', 'Snowbrick', 'uploads/pañosHXB1345.jpg', 3000, 'Pañuelo de fibra suave para la limpieza de toda clase de lentes, los colores varia según existencia', 1),
(5, 4, 2, 'TRF45TJ', 'Gucchi', 'uploads/estucheTRF45TJ.jpg', 30000, 'Estuche con acabado metálico en exterior y forrado con fibra suave por dentro perfecto para viajes', 0);

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
(1, '4444444444', 'Carlos Andres', 'Munera', '1940-03-15', 'Pereira', 'Calle 89 #45-85', '123456', '123456789', 'carlosMunera@example.com', 1, 1),
(2, '741852963', 'Armando', 'Venedetti', '1990-10-10', 'Pereira', 'Calle 38 #52-54', '123456', '123456789', 'armandoVene@email.com', 0, 0);

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
(1, 1, 1, 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', '\r\n                        a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', '2020-10-10', 'a', '2019-04-26-02-05-50'),
(2, 1, 1, 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'a', 'a', 'a', '\r\n                        a', 'a', 'a', 'a', 'a', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', '', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', '2018-01-10', 'b', '2019-04-26-02-11-42'),
(3, 1, 2, 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', '\r\n                        c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', '2010-01-10', 'c', '2019-04-26-02-29-19');

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
(1, 'Gafas Medicadas', 0),
(2, 'Gafas de Sol', 0),
(3, 'Pañuelo', 0),
(4, 'Estuche', 0);

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
(1, 'Administrador'),
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
(1, 1, 1),
(2, 2, 1),
(3, 3, 3),
(4, 4, 2);

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
(1, 'admin', 'Administrador', 'Administrador', '$2y$10$ZZpjpvFY7DtTxtnlhRArCuu1YQy8r7TmnO2i8K/BEZZvox51zDHC.', 0),
(2, '1111111111', 'Andres', 'Hernandez', '$2y$10$JGn3bV.ElIWTT2KxZknxYuuJw5WypZtmE3JKQPos6NhyTPAW5da5q', 0),
(3, '2222222222', 'Donovan', 'Hoffman', '$2y$10$KifJNtadGIX1NYV5HjoO7uFVAuRWj3su/.mhwmw4pAFLSU6kniupS', 0),
(4, '3333333333', 'Tereza', 'Aguirre', '$2y$10$ug5rVL6eDS3NaORyExfTp.9CKQvskH2cdtGZHoq3/KsTFT2rzWkj.', 0);

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
  MODIFY `id_catalogo` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `historia_clinica`
--
ALTER TABLE `historia_clinica`
  MODIFY `id_historia_clinica` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id_rol` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_roles` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
