-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 23-04-2017 a las 01:00:17
-- Versión del servidor: 5.7.17-0ubuntu1
-- Versión de PHP: 7.0.15-1ubuntu4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dirtyllas_chile`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dirtyllas_categorias`
--

CREATE TABLE `dirtyllas_categorias` (
  `categoria_id` int(11) NOT NULL,
  `categoria_nombre` varchar(100) COLLATE utf32_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish2_ci;

--
-- Volcado de datos para la tabla `dirtyllas_categorias`
--

INSERT INTO `dirtyllas_categorias` (`categoria_id`, `categoria_nombre`) VALUES
(1, 'ZAPATILLAS URBANAS'),
(2, 'ZAPATILLAS DEPORTIVAS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dirtyllas_marcas`
--

CREATE TABLE `dirtyllas_marcas` (
  `marca_id` int(11) NOT NULL,
  `marca_nombre` varchar(100) COLLATE utf32_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish2_ci;

--
-- Volcado de datos para la tabla `dirtyllas_marcas`
--

INSERT INTO `dirtyllas_marcas` (`marca_id`, `marca_nombre`) VALUES
(1, 'NIKE'),
(2, 'PUMA'),
(4, 'NEW BALANCE'),
(5, 'ASICS'),
(6, 'ADIDAS'),
(7, 'TIMBERLAND');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dirtyllas_usuarios`
--

CREATE TABLE `dirtyllas_usuarios` (
  `usuario_id` int(11) NOT NULL,
  `usuario_correo` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `usuario_contrasena` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `usuario_nombre` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `usuario_apellido` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `dirtyllas_usuarios`
--

INSERT INTO `dirtyllas_usuarios` (`usuario_id`, `usuario_correo`, `usuario_contrasena`, `usuario_nombre`, `usuario_apellido`) VALUES
(1, 'cpqm07@gmail.com', '2112Aeqdlf', 'Christopher', 'Quezada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dirtyllas_zapatillas`
--

CREATE TABLE `dirtyllas_zapatillas` (
  `zapatilla_id` int(11) NOT NULL,
  `zapatilla_genero` varchar(50) COLLATE utf32_spanish2_ci NOT NULL,
  `zapatilla_modelo` varchar(100) COLLATE utf32_spanish2_ci NOT NULL,
  `zapatilla_talla_desde` varchar(50) COLLATE utf32_spanish2_ci NOT NULL,
  `zapatilla_talla_hasta` varchar(50) COLLATE utf32_spanish2_ci NOT NULL,
  `zapatilla_descripcion` varchar(500) COLLATE utf32_spanish2_ci NOT NULL,
  `zapatilla_precio` int(11) NOT NULL,
  `zapatilla_imagen_portada` varchar(200) COLLATE utf32_spanish2_ci NOT NULL,
  `zapatilla_imagen_uno` varchar(200) COLLATE utf32_spanish2_ci NOT NULL,
  `zapatilla_imagen_dos` varchar(200) COLLATE utf32_spanish2_ci NOT NULL,
  `zapatilla_imagen_tres` varchar(200) COLLATE utf32_spanish2_ci NOT NULL,
  `zapatilla_imagen_cuatro` varchar(200) COLLATE utf32_spanish2_ci NOT NULL,
  `zapatilla_marca_id` int(11) NOT NULL,
  `zapatilla_categoria_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish2_ci;

--
-- Volcado de datos para la tabla `dirtyllas_zapatillas`
--

INSERT INTO `dirtyllas_zapatillas` (`zapatilla_id`, `zapatilla_genero`, `zapatilla_modelo`, `zapatilla_talla_desde`, `zapatilla_talla_hasta`, `zapatilla_descripcion`, `zapatilla_precio`, `zapatilla_imagen_portada`, `zapatilla_imagen_uno`, `zapatilla_imagen_dos`, `zapatilla_imagen_tres`, `zapatilla_imagen_cuatro`, `zapatilla_marca_id`, `zapatilla_categoria_id`) VALUES
(1, 'mujer', 'SUEDE CREEPER BLACK SILVER FENTY RIHANNA', 'UK 6 - EUR 39 - CM 25', 'UK 6 - EUR 39 - CM 25', 'SUEDE CREEPER BLACK SILVER FENTY RIHANNA', 55000, 'ZapatillaPortada-1', 'ZapatillaSlideUno-1', 'ZapatillaSlideDos-1', 'ZapatillaSlideTres-1', 'ZapatillaSlideCuatro-1', 2, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `dirtyllas_categorias`
--
ALTER TABLE `dirtyllas_categorias`
  ADD PRIMARY KEY (`categoria_id`);

--
-- Indices de la tabla `dirtyllas_marcas`
--
ALTER TABLE `dirtyllas_marcas`
  ADD PRIMARY KEY (`marca_id`);

--
-- Indices de la tabla `dirtyllas_usuarios`
--
ALTER TABLE `dirtyllas_usuarios`
  ADD PRIMARY KEY (`usuario_id`),
  ADD UNIQUE KEY `usuario_correo` (`usuario_correo`);

--
-- Indices de la tabla `dirtyllas_zapatillas`
--
ALTER TABLE `dirtyllas_zapatillas`
  ADD PRIMARY KEY (`zapatilla_id`),
  ADD KEY `FK_Zapatillas_Marcas` (`zapatilla_marca_id`),
  ADD KEY `FK_Zapatillas_Categorias` (`zapatilla_categoria_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `dirtyllas_categorias`
--
ALTER TABLE `dirtyllas_categorias`
  MODIFY `categoria_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `dirtyllas_marcas`
--
ALTER TABLE `dirtyllas_marcas`
  MODIFY `marca_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `dirtyllas_usuarios`
--
ALTER TABLE `dirtyllas_usuarios`
  MODIFY `usuario_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `dirtyllas_zapatillas`
--
ALTER TABLE `dirtyllas_zapatillas`
  MODIFY `zapatilla_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `dirtyllas_zapatillas`
--
ALTER TABLE `dirtyllas_zapatillas`
  ADD CONSTRAINT `FK_Zapatillas_Categorias` FOREIGN KEY (`zapatilla_categoria_id`) REFERENCES `dirtyllas_categorias` (`categoria_id`),
  ADD CONSTRAINT `FK_Zapatillas_Marcas` FOREIGN KEY (`zapatilla_marca_id`) REFERENCES `dirtyllas_marcas` (`marca_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
