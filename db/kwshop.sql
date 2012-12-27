-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 24-12-2012 a las 22:26:32
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `kwshop`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `kw_colors`
--

CREATE TABLE IF NOT EXISTS `kw_colors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `kw_colors`
--

INSERT INTO `kw_colors` (`id`, `name`) VALUES
(1, 'rojo'),
(2, 'amarillo'),
(3, 'blanco'),
(4, 'azul');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `kw_flowers`
--

CREATE TABLE IF NOT EXISTS `kw_flowers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `kw_flowers`
--

INSERT INTO `kw_flowers` (`id`, `name`) VALUES
(1, 'Rosas'),
(2, 'Margaritas'),
(3, 'Claveles'),
(4, 'Orquideas'),
(5, 'Girasoles');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `kw_flowers_colors`
--

CREATE TABLE IF NOT EXISTS `kw_flowers_colors` (
  `id_kw_flowers` int(11) NOT NULL,
  `id_kw_colors` int(11) NOT NULL,
  KEY `fk_kw_flowers_colors_0` (`id_kw_flowers`),
  KEY `fk_kw_flowers_colors_1` (`id_kw_colors`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `kw_flowers_colors`
--

INSERT INTO `kw_flowers_colors` (`id_kw_flowers`, `id_kw_colors`) VALUES
(1, 1),
(1, 2),
(1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `kw_occasion`
--

CREATE TABLE IF NOT EXISTS `kw_occasion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `kw_occasion`
--

INSERT INTO `kw_occasion` (`id`, `name`, `date`) VALUES
(1, 'San Valentin', '2013-02-14'),
(2, 'Día de la Madre', '2013-05-12'),
(3, 'Aniversario', NULL),
(4, 'Cumpleaños', NULL),
(5, 'Funerario', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `kw_products`
--

CREATE TABLE IF NOT EXISTS `kw_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `availability` tinyint(1) NOT NULL,
  `type` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `kw_products_accessory`
--

CREATE TABLE IF NOT EXISTS `kw_products_accessory` (
  `id_kw_products` int(11) NOT NULL,
  `id_kw_accessory` int(11) NOT NULL,
  KEY `fk_kw_products_accessory_1` (`id_kw_accessory`),
  KEY `fk_kw_products_accessory_0` (`id_kw_products`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `kw_products_flowers`
--

CREATE TABLE IF NOT EXISTS `kw_products_flowers` (
  `id_kw_products` int(11) NOT NULL,
  `id_kw_flowers` int(11) NOT NULL,
  KEY `fk_kw_products_flowers_1` (`id_kw_flowers`),
  KEY `fk_kw_products_flowers_0` (`id_kw_products`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `kw_products_occasion`
--

CREATE TABLE IF NOT EXISTS `kw_products_occasion` (
  `id_kw_products` int(11) NOT NULL,
  `id_kw_occasion` int(11) NOT NULL,
  KEY `fk_kw_products_occasion_0` (`id_kw_products`),
  KEY `fk_kw_products_occasion_1` (`id_kw_occasion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `kw_product_size_price`
--

CREATE TABLE IF NOT EXISTS `kw_product_size_price` (
  `id_kw_products` int(11) NOT NULL,
  `id_kw_size` int(11) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `image_url` text NOT NULL,
  KEY `fk_kw_product_size_price_0` (`id_kw_products`),
  KEY `fk_kw_product_size_price_1` (`id_kw_size`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `kw_size`
--

CREATE TABLE IF NOT EXISTS `kw_size` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `kw_size`
--

INSERT INTO `kw_size` (`id`, `name`) VALUES
(1, 'Único'),
(2, 'Pequeño'),
(3, 'Mediano'),
(4, 'Grande');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `kw_top_products`
--

CREATE TABLE IF NOT EXISTS `kw_top_products` (
  `order` int(11) NOT NULL,
  `id_kw_products` int(11) NOT NULL,
  KEY `fk_kw_top_products_0` (`id_kw_products`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `kw_flowers_colors`
--
ALTER TABLE `kw_flowers_colors`
  ADD CONSTRAINT `fk_kw_flowers_colors_1` FOREIGN KEY (`id_kw_colors`) REFERENCES `kw_colors` (`id`),
  ADD CONSTRAINT `fk_kw_flowers_colors_0` FOREIGN KEY (`id_kw_flowers`) REFERENCES `kw_flowers` (`id`);

--
-- Filtros para la tabla `kw_products_accessory`
--
ALTER TABLE `kw_products_accessory`
  ADD CONSTRAINT `fk_kw_products_accessory_1` FOREIGN KEY (`id_kw_accessory`) REFERENCES `kw_products` (`id`),
  ADD CONSTRAINT `fk_kw_products_accessory` FOREIGN KEY (`id_kw_products`) REFERENCES `kw_products` (`id`);

--
-- Filtros para la tabla `kw_products_flowers`
--
ALTER TABLE `kw_products_flowers`
  ADD CONSTRAINT `fk_kw_products_flowers_0` FOREIGN KEY (`id_kw_products`) REFERENCES `kw_products` (`id`),
  ADD CONSTRAINT `fk_kw_products_flowers` FOREIGN KEY (`id_kw_products`) REFERENCES `kw_products` (`id`),
  ADD CONSTRAINT `fk_kw_products_flowers_1` FOREIGN KEY (`id_kw_flowers`) REFERENCES `kw_flowers` (`id`);

--
-- Filtros para la tabla `kw_products_occasion`
--
ALTER TABLE `kw_products_occasion`
  ADD CONSTRAINT `fk_kw_products_occasion_1` FOREIGN KEY (`id_kw_occasion`) REFERENCES `kw_occasion` (`id`),
  ADD CONSTRAINT `fk_kw_products_occasion` FOREIGN KEY (`id_kw_products`) REFERENCES `kw_products` (`id`);

--
-- Filtros para la tabla `kw_product_size_price`
--
ALTER TABLE `kw_product_size_price`
  ADD CONSTRAINT `fk_kw_product_size_price_1` FOREIGN KEY (`id_kw_size`) REFERENCES `kw_size` (`id`),
  ADD CONSTRAINT `fk_kw_product_size_price_0` FOREIGN KEY (`id_kw_products`) REFERENCES `kw_products` (`id`);

--
-- Filtros para la tabla `kw_top_products`
--
ALTER TABLE `kw_top_products`
  ADD CONSTRAINT `fk_kw_top_products_0` FOREIGN KEY (`id_kw_products`) REFERENCES `kw_products` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
