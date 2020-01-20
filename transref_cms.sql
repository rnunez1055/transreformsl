-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 15-04-2019 a las 14:28:01
-- Versión del servidor: 5.6.43-cll-lve
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `transref_cms`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jh_category`
--

CREATE TABLE `jh_category` (
  `categoryId` int(11) UNSIGNED NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` text,
  `status` varchar(20) DEFAULT NULL,
  `orderId` int(11) DEFAULT NULL,
  `parentId` int(11) NOT NULL,
  `allowPages` smallint(6) NOT NULL DEFAULT '1',
  `seo` mediumtext,
  `date_create` datetime NOT NULL,
  `date_update` datetime NOT NULL,
  `id_person_create` int(11) NOT NULL,
  `photo` varchar(100) DEFAULT NULL,
  `isNews` tinyint(4) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `jh_category`
--

INSERT INTO `jh_category` (`categoryId`, `title`, `description`, `status`, `orderId`, `parentId`, `allowPages`, `seo`, `date_create`, `date_update`, `id_person_create`, `photo`, `isNews`) VALUES
(2, 'GRUPO AUTONORT', '', 'Activo', 1, 1, 1, '', '2015-09-08 14:52:24', '0000-00-00 00:00:00', 0, '', 0),
(3, 'TOYOTA', '', 'Activo', 2, 1, 1, '', '2015-09-08 14:52:30', '2015-09-15 12:40:57', 0, '', 0),
(4, 'SERVICIOS', '', 'Activo', 5, 1, 1, '', '2015-09-08 14:52:35', '0000-00-00 00:00:00', 0, '', 0),
(5, 'SUCURSALES', '', 'Activo', 4, 1, 1, '', '2015-09-08 14:53:01', '0000-00-00 00:00:00', 0, '', 0),
(10, 'HINO', '', 'Activo', 3, 1, 1, '', '2015-09-15 12:41:03', '0000-00-00 00:00:00', 0, '', 0),
(9, 'REPUESTOS', '', 'Activo', 6, 1, 1, '', '2015-09-08 14:54:51', '0000-00-00 00:00:00', 0, '', 0),
(11, 'TRANS REFORM SL', '', 'Activo', NULL, 0, 1, '', '2016-04-21 06:57:49', '2016-06-08 14:50:22', 0, '', 0),
(19, 'ALMACEN GUARDAMUEBLES', '', 'Activo', 3, 11, 1, '', '2016-06-08 14:51:20', '0000-00-00 00:00:00', 0, '', 0),
(17, 'QUIENES SOMOS', '', 'Activo', 1, 11, 1, '', '2016-06-08 14:50:54', '0000-00-00 00:00:00', 0, '', 0),
(18, 'NUESTROS SERVICIOS', '', 'Activo', 2, 11, 1, '', '2016-06-08 14:51:06', '0000-00-00 00:00:00', 0, '', 0),
(20, 'COMO CONTACTARNOS', '', 'Activo', 4, 11, 1, '', '2016-06-08 14:51:33', '0000-00-00 00:00:00', 0, '', 0),
(21, 'TRABAJA CON NOSOTROS', '', 'Activo', 5, 11, 1, '', '2016-06-08 14:51:42', '0000-00-00 00:00:00', 0, '', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jh_file`
--

CREATE TABLE `jh_file` (
  `fileId` int(11) NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `description` mediumtext,
  `type` varchar(120) DEFAULT NULL,
  `target` varchar(160) DEFAULT NULL,
  `size` varchar(60) DEFAULT NULL,
  `video` varchar(100) NOT NULL DEFAULT '',
  `orderId` int(11) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `pageId` int(11) NOT NULL,
  `date_create` datetime NOT NULL,
  `date_update` datetime NOT NULL,
  `id_person_create` int(11) NOT NULL,
  `var1` varchar(50) DEFAULT NULL,
  `var2` varchar(50) DEFAULT NULL,
  `isProfile` smallint(6) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `jh_file`
--

INSERT INTO `jh_file` (`fileId`, `title`, `description`, `type`, `target`, `size`, `video`, `orderId`, `status`, `pageId`, `date_create`, `date_update`, `id_person_create`, `var1`, `var2`, `isProfile`) VALUES
(316, 'b_trabajaconnosotros', '', '', 'eivdq0t49j4bvogo.jpg', '39185', '', NULL, 'Activo', 74, '2016-06-08 16:19:11', '0000-00-00 00:00:00', 0, '', '0', 1),
(275, 'b_banner_25', '', '', 'o5i1wrm2c05jl08b.jpg', '105318', '', NULL, 'Activo', 0, '2016-04-23 13:51:00', '0000-00-00 00:00:00', 0, '', '1', 0),
(296, 'SALUD VISUAL EN ESCOLARES', '', '', 'gkhp238zuy449c2p.jpg', '36861', '', NULL, 'Activo', 70, '2016-05-19 17:42:05', '2016-05-19 17:55:47', 0, '', '0', 1),
(277, 'MONTURAS + POLICARBONATO ANTIREFLEX A TAN SOLO S/ 159.90', '', '', 'dyei2fr4s4lxskln.jpg', '105141', '', NULL, 'Activo', 62, '2016-04-23 13:57:42', '2016-04-23 13:57:55', 0, '', '0', 1),
(276, 'b_banner_26', '', '', 's63mejf9lnx6yjzi.jpg', '116320', '', NULL, 'Activo', 0, '2016-04-23 13:51:01', '0000-00-00 00:00:00', 0, '', '1', 0),
(317, 'b_contacto', '', '', 'pmnc0i84pkiubxm5.jpg', '32306', '', NULL, 'Activo', 84, '2016-06-08 16:19:35', '0000-00-00 00:00:00', 0, '', '0', 1),
(312, 'b_almacen', '', '', 'mvd3qpfdxue7n8zd.jpg', '50386', '', NULL, 'Activo', 83, '2016-06-08 15:48:49', '0000-00-00 00:00:00', 0, '', '0', 1),
(311, 'b_elevador', '', '', 'wst58hqvh71aoxga.jpg', '35990', '', NULL, 'Activo', 81, '2016-06-08 15:48:19', '0000-00-00 00:00:00', 0, '', '0', 1),
(319, 'b_traslado_oficinas', '', '', '1zoax3zzui75egx1.jpg', '33190', '', NULL, 'Activo', 79, '2016-06-08 16:20:30', '0000-00-00 00:00:00', 0, '', '0', 1),
(310, 'b_montaje_desmontaje_muebles', '', '', '98626vtjwdtd4yxq.jpg', '25674', '', NULL, 'Activo', 80, '2016-06-08 15:48:02', '0000-00-00 00:00:00', 0, '', '0', 1),
(321, 'b_mudanzas_internacionales', '', '', 'asf8wt35b5vqi6go.jpg', '28141', '', NULL, 'Activo', 78, '2016-06-08 16:21:29', '0000-00-00 00:00:00', 0, '', '0', 1),
(320, 'b_mudanzas_locales', '', '', '496hv55kvqwmsile.jpg', '32527', '', NULL, 'Activo', 77, '2016-06-08 16:20:49', '0000-00-00 00:00:00', 0, '', '0', 1),
(306, 'b_clienteideal', '', '', 'kwccjrr6y0wvj59a.jpg', '25922', '', NULL, 'Activo', 76, '2016-06-08 15:28:23', '0000-00-00 00:00:00', 0, '', '0', 1),
(305, 'b_comonosdiferenciamos', '', '', 'ha2wn6vfflryyeta.jpg', '22421', '', NULL, 'Activo', 75, '2016-06-08 15:27:53', '0000-00-00 00:00:00', 0, '', '0', 1),
(303, 'b_quienessomos', '', '', 'ersetdwp0cgs3fnd.jpg', '22198', '', NULL, 'Activo', 73, '2016-06-08 15:26:29', '0000-00-00 00:00:00', 0, '', '0', 1),
(315, 'b_mision', '', '', '6bcud7kjkgsq30p8.jpg', '31358', '', NULL, 'Activo', 72, '2016-06-08 16:18:45', '0000-00-00 00:00:00', 0, '', '0', 1),
(279, 'APROVECHA NUESTRAS GRANDES OFERTAS', '', '', 'zp9uf23k7qcxrpn6.jpg', '156098', '', NULL, 'Activo', 69, '2016-04-23 14:00:02', '2016-04-23 14:00:09', 0, '', '0', 1),
(299, 'COMPARTIR NAVIDEÃ‘O EN OPTICAS ROJAS', '', '', '7wmja6gl6vpngi43.jpg', '91076', '', 3, 'Activo', 71, '2016-05-19 17:54:50', '2016-05-19 17:55:36', 0, '', '0', 0),
(295, 'COMPARTIR NAVIDEÃ‘O EN OPTICAS ROJAS', '', '', 'bdlmosf0c8om2feq.jpg', '91076', '', 1, 'Activo', 71, '2016-05-19 17:38:48', '2016-05-19 17:41:19', 0, '', '0', 1),
(300, 'COMPARTIR NAVIDEÃ‘O EN OPTICAS ROJAS', '', '', 'daqq69xii3xuajdo.jpg', '72868', '', 2, 'Activo', 71, '2016-05-19 17:55:19', '2016-05-19 17:55:32', 0, '', '0', 0),
(301, 'SALUD VISUAL EN ESCOLARES', '', '', 'bfgo8x9cr5mrshxj.jpg', '36861', '', NULL, 'Activo', 70, '2016-05-19 17:55:52', '2016-05-19 17:56:02', 0, '', '0', 0),
(318, 'b_trabajaconnosotros', '', '', '7f8inlz9ocs7rgh7.jpg', '39185', '', NULL, 'Activo', 85, '2016-06-08 16:19:58', '0000-00-00 00:00:00', 0, '', '0', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jh_page`
--

CREATE TABLE `jh_page` (
  `pageId` int(11) UNSIGNED NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` text,
  `status` varchar(20) DEFAULT NULL,
  `orderId` int(11) DEFAULT NULL,
  `parentId` int(11) NOT NULL,
  `categoryId` int(11) DEFAULT NULL,
  `seo` mediumtext,
  `date_create` datetime NOT NULL,
  `date_update` datetime NOT NULL,
  `id_person_create` int(11) NOT NULL,
  `featured` int(11) NOT NULL DEFAULT '0',
  `isTestimonio` tinyint(4) DEFAULT NULL,
  `isNoticia` bit(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `jh_page`
--

INSERT INTO `jh_page` (`pageId`, `title`, `description`, `status`, `orderId`, `parentId`, `categoryId`, `seo`, `date_create`, `date_update`, `id_person_create`, `featured`, `isTestimonio`, `isNoticia`) VALUES
(70, 'SALUD VISUAL EN ESCOLARES', '<p style=\"text-align: justify;\">\r\n	Con la Ley N&deg; 28777 del a&ntilde;o 2006, se establece que los&nbsp;segundos jueves del mes de octubre a nivel nacional se celebra el &quot;D&iacute;a Nacional de la Visi&oacute;n&quot;, con el objetivo de prevenir y controlar las principales causas de ceguera evitable y fomentar una cultura de salud ocular para disminuir la morbimortalidad y discapacidad causadas por la ceguera.&nbsp;<br />\r\n	<br />\r\n	Bajo el lema&nbsp;&quot;Te veo bien&quot;&nbsp;se busca sensibilizar a los escolares y familias, a fin de que tomen conciencia, por un lado, del alcance, las caracter&iacute;sticas y las posibles consecuencias de las enfermedades oculares no detectadas o tratadas y, por otra parte, de los beneficios y repercusiones positivas a la salud sobre la promoci&oacute;n de estilos de vida saludables y prevenci&oacute;n en Salud Ocular.</p>\r\n<p style=\"text-align: justify;\">\r\n	Descargar Articulo Completo&nbsp;<a href=\"/ckfinder/userfiles/files/SALUD VISUAL EN ESCOLARES.pdf\" target=\"_blank\"><img alt=\"\" src=\"/ckfinder/userfiles/images/pdf_file.png\" style=\"width: 50px; height: 48px;\" /></a></p>\r\n', 'Activo', 2, 0, 0, '{\"metaTitle\":\"\",\"metaDescription\":\"\",\"metaKeyword\":\"\"}', '2016-04-23 00:00:00', '2016-04-23 14:07:32', 0, 0, NULL, b'1'),
(62, 'MONTURAS + POLICARBONATO ANTIREFLEX A TAN SOLO S/ 159.90', '<p>\r\n	MONTURAS + POLICARBONATO ANTIREFLEX A TAN SOLO S/ 159.90</p>\r\n', 'Activo', 1, 0, 0, '', '2016-04-09 17:24:10', '2016-04-23 13:57:32', 0, 1, 1, NULL),
(72, 'Nuestra Mision', '', 'Activo', NULL, 0, 17, '{\"metaTitle\":\"Nuestra Mision\",\"metaDescription\":\"Nuestra Mision\",\"metaKeyword\":\"Nuestra Mision\"}', '2016-06-08 14:52:35', '2016-06-08 15:31:14', 0, 0, NULL, NULL),
(73, 'Nuestro Lema', '', 'Activo', NULL, 0, 17, '{\"metaTitle\":\"Nuestro Lema\",\"metaDescription\":\"Nuestro Lema\",\"metaKeyword\":\"Nuestro Lema\"}', '2016-06-08 15:25:50', '2016-06-08 15:31:24', 0, 0, NULL, NULL),
(74, 'Nuestros Profesionales', '', 'Activo', NULL, 0, 17, '{\"metaTitle\":\"Nuestros Profesionales\",\"metaDescription\":\"Nuestros Profesionales\",\"metaKeyword\":\"Nuestros Profesionales\"}', '2016-06-08 15:26:47', '2016-06-08 15:31:34', 0, 0, NULL, NULL),
(75, 'Como Nos Diferenciamos', '', 'Activo', NULL, 0, 17, '{\"metaTitle\":\"Como Nos Diferenciamos\",\"metaDescription\":\"Como Nos Diferenciamos\",\"metaKeyword\":\"Como Nos Diferenciamos\"}', '2016-06-08 15:27:20', '2016-06-08 15:31:43', 0, 0, NULL, NULL),
(76, 'Nuestro Cliente Ideal', '', 'Activo', NULL, 0, 17, '{\"metaTitle\":\"Nuestro Cliente Ideal\",\"metaDescription\":\"Nuestro Cliente Ideal\",\"metaKeyword\":\"Nuestro Cliente Ideal\"}', '2016-06-08 15:28:17', '2016-06-08 15:31:55', 0, 0, NULL, NULL),
(77, 'Mudanzas Locales y Nacionales', '', 'Activo', NULL, 0, 18, '{\"metaTitle\":\"Mudanzas Locales y Nacionales\",\"metaDescription\":\"Mudanzas Locales y Nacionales\",\"metaKeyword\":\"Mudanzas Locales y Nacionales\"}', '2016-06-08 15:30:58', '2016-06-08 15:31:03', 0, 0, NULL, NULL),
(78, 'Mudanzas Internacionales', '', 'Activo', NULL, 0, 18, '{\"metaTitle\":\"Mudanzas Internacionales\",\"metaDescription\":\"Mudanzas Internacionales\",\"metaKeyword\":\"Mudanzas Internacionales\"}', '2016-06-08 15:35:30', '0000-00-00 00:00:00', 0, 0, NULL, NULL),
(79, 'Traslado de Oficinas', '', 'Activo', NULL, 0, 18, '{\"metaTitle\":\"Traslado de Oficinas\",\"metaDescription\":\"Traslado de Oficinas\",\"metaKeyword\":\"Traslado de Oficinas\"}', '2016-06-08 15:35:42', '0000-00-00 00:00:00', 0, 0, NULL, NULL),
(80, 'Desmontaje y Montaje de Muebles', '', 'Activo', NULL, 0, 18, '{\"metaTitle\":\"Desmontaje y Montaje de Muebles\",\"metaDescription\":\"Desmontaje y Montaje de Muebles\",\"metaKeyword\":\"Desmontaje y Montaje de Muebles\"}', '2016-06-08 15:36:06', '0000-00-00 00:00:00', 0, 0, NULL, NULL),
(81, 'Elevador AutomÃ¡tico de Muebles', '', 'Activo', NULL, 0, 18, '{\"metaTitle\":\"Elevador Autom\\u00e1tico de Muebles\",\"metaDescription\":\"Elevador Autom\\u00e1tico de Muebles\",\"metaKeyword\":\"Elevador Autom\\u00e1tico de Muebles\"}', '2016-06-08 15:36:28', '2016-06-08 15:38:14', 0, 0, NULL, NULL),
(83, 'Almacen Guardamuebles', '', 'Activo', NULL, 0, 19, '{\"metaTitle\":\"Almacen Guardamuebles\",\"metaDescription\":\"Almacen Guardamuebles\",\"metaKeyword\":\"Almacen Guardamuebles\"}', '2016-06-08 15:38:52', '0000-00-00 00:00:00', 0, 0, NULL, NULL),
(84, 'Como Contactarnos', '', 'Activo', NULL, 0, 20, '{\"metaTitle\":\"Como Contactarnos\",\"metaDescription\":\"Como Contactarnos\",\"metaKeyword\":\"Como Contactarnos\"}', '2016-06-08 15:39:10', '0000-00-00 00:00:00', 0, 0, NULL, NULL),
(85, 'Trabaja con Nosotros', '', 'Activo', NULL, 0, 21, '{\"metaTitle\":\"Trabaja con Nosotros\",\"metaDescription\":\"Trabaja con Nosotros\",\"metaKeyword\":\"Trabaja con Nosotros\"}', '2016-06-08 15:39:50', '0000-00-00 00:00:00', 0, 0, NULL, NULL),
(69, 'APROVECHA NUESTRAS GRANDES OFERTAS', '', 'Activo', 2, 0, 0, '', '2016-04-23 13:59:54', '0000-00-00 00:00:00', 0, 1, 1, NULL),
(71, 'COMPARTIR NAVIDEÃ‘O EN OPTICAS ROJAS', '<p>\r\n	COMPARTIR NAVIDE&Ntilde;O EN OPTICAS ROJAS.</p>', 'Activo', 1, 0, 0, '{\"metaTitle\":\"\",\"metaDescription\":\"\",\"metaKeyword\":\"\"}', '2016-05-19 00:00:00', '2016-05-19 17:30:02', 0, 0, NULL, b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jh_person`
--

CREATE TABLE `jh_person` (
  `personId` int(11) NOT NULL,
  `date_create` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `date_update` int(10) UNSIGNED NOT NULL,
  `id_person_create` smallint(5) UNSIGNED NOT NULL DEFAULT '0',
  `deleted` tinyint(2) NOT NULL DEFAULT '0',
  `username` varchar(100) CHARACTER SET utf8 NOT NULL,
  `password` varchar(40) CHARACTER SET utf8 NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `firstname` varchar(64) CHARACTER SET utf8 NOT NULL,
  `lastname` varchar(64) CHARACTER SET utf8 NOT NULL,
  `shortname` varchar(11) CHARACTER SET utf8 NOT NULL,
  `salutation` varchar(1) CHARACTER SET utf8 NOT NULL,
  `title` varchar(64) CHARACTER SET utf8 NOT NULL,
  `birthday` date NOT NULL,
  `salt` varchar(8) DEFAULT NULL,
  `autologin` tinyint(1) DEFAULT NULL,
  `timezone` smallint(6) DEFAULT NULL,
  `lastlogindate` datetime DEFAULT NULL,
  `lastloginaddress` varchar(60) DEFAULT NULL,
  `creationdate` datetime DEFAULT NULL,
  `lastchangedate` datetime DEFAULT NULL,
  `visits` mediumint(8) DEFAULT NULL,
  `badaccess` tinyint(3) DEFAULT NULL,
  `level` tinyint(3) DEFAULT NULL,
  `enabled` tinyint(16) DEFAULT NULL,
  `lastactivity` varchar(60) DEFAULT NULL,
  `mark` tinyint(1) DEFAULT NULL,
  `schedule` tinyint(1) DEFAULT NULL,
  `avatar` varchar(250) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `jh_person`
--

INSERT INTO `jh_person` (`personId`, `date_create`, `date_update`, `id_person_create`, `deleted`, `username`, `password`, `email`, `is_admin`, `active`, `firstname`, `lastname`, `shortname`, `salutation`, `title`, `birthday`, `salt`, `autologin`, `timezone`, `lastlogindate`, `lastloginaddress`, `creationdate`, `lastchangedate`, `visits`, `badaccess`, `level`, `enabled`, `lastactivity`, `mark`, `schedule`, `avatar`) VALUES
(1, 1246615200, 1279059124, 0, 0, 'admin', '53fe449f874338304d652dbb1cec217b', 'rnunez@evolucionmedia.pe', 1, 1, 'Ricardo', 'NUÑEZ ALVARADO', 'RNA', 'm', '', '0000-00-00', 'xQYSWIzL', 0, -18000, '2017-05-25 06:21:33', '190.42.87.135', '0000-00-00 00:00:00', '2017-05-25 06:21:33', 393, 0, 0, 1, '', 0, 0, '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `jh_category`
--
ALTER TABLE `jh_category`
  ADD PRIMARY KEY (`categoryId`);

--
-- Indices de la tabla `jh_file`
--
ALTER TABLE `jh_file`
  ADD PRIMARY KEY (`fileId`);

--
-- Indices de la tabla `jh_page`
--
ALTER TABLE `jh_page`
  ADD PRIMARY KEY (`pageId`);

--
-- Indices de la tabla `jh_person`
--
ALTER TABLE `jh_person`
  ADD PRIMARY KEY (`personId`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `jh_category`
--
ALTER TABLE `jh_category`
  MODIFY `categoryId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `jh_file`
--
ALTER TABLE `jh_file`
  MODIFY `fileId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=322;

--
-- AUTO_INCREMENT de la tabla `jh_page`
--
ALTER TABLE `jh_page`
  MODIFY `pageId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT de la tabla `jh_person`
--
ALTER TABLE `jh_person`
  MODIFY `personId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
