-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-05-2021 a las 15:01:00
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `traduceme`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tm_access`
--

CREATE TABLE `tm_access` (
  `id` int(11) NOT NULL,
  `admin` varchar(16) NOT NULL,
  `timestamp` datetime NOT NULL,
  `success` tinyint(1) NOT NULL,
  `pass` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tm_access`
--

INSERT INTO `tm_access` (`id`, `admin`, `timestamp`, `success`, `pass`) VALUES
(1, 'mori', '2021-05-18 12:05:25', 1, '********'),
(2, 'angel', '2021-05-18 12:05:57', 0, 'traduceme'),
(3, 'malena', '2021-05-19 12:22:27', 1, '********'),
(4, 'maroto', '2021-05-19 12:22:41', 1, 'tjuan'),
(5, 'mori', '2021-05-19 12:24:09', 1, '********'),
(6, 'mori', '2021-05-19 12:24:54', 1, '********'),
(7, 'malena', '2021-05-19 12:25:10', 1, '********'),
(8, 'maroto', '2021-05-19 12:28:21', 1, '********'),
(9, 'mori', '2021-05-19 12:29:01', 1, '********'),
(10, 'sdf', '2021-05-19 12:41:46', 0, 'fdsdaf'),
(11, 'mori', '2021-05-19 12:41:50', 0, 'sdsdfsdfsdff'),
(12, 'mori', '2021-05-19 12:42:09', 0, 'morimori'),
(13, 'mori', '2021-05-19 12:42:12', 1, '********'),
(14, 'rosa', '2021-05-19 12:42:44', 0, 'mjuan'),
(15, 'cristina', '2021-05-19 12:42:55', 0, 'tjuan'),
(16, 'cristina', '2021-05-19 12:43:04', 0, 'mjaun'),
(17, 'maroto', '2021-05-19 12:43:13', 1, '********'),
(18, 'mori', '2021-05-19 12:46:43', 1, '********'),
(19, 'malena', '2021-05-19 14:22:33', 0, 'admin'),
(20, 'malena', '2021-05-19 14:23:24', 1, '********');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tm_admin`
--

CREATE TABLE `tm_admin` (
  `user` varchar(16) NOT NULL,
  `hash` varchar(64) NOT NULL,
  `date_added` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tm_admin`
--

INSERT INTO `tm_admin` (`user`, `hash`, `date_added`) VALUES
('malena', '$2y$10$2EX7lxGNe85KjjIJE0UAUu9wNvanQg8vkTL3r4.GvYLIig9EFd6vS', '2021-05-17 09:29:27'),
('maroto', '$2y$10$8Fq5giHUIvnFphTa1Wp1B.zjcN/03RegUBILGzn2gDN0Il08YZdmC', '2021-05-17 09:29:27'),
('mori', '$2y$10$20lBDOl2uMuD6WQnEBJ2iOqz0bAZps450DONxphuUlSmt67oMWVza', '2021-05-17 09:29:27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tm_lang`
--

CREATE TABLE `tm_lang` (
  `lang` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tm_lang`
--

INSERT INTO `tm_lang` (`lang`) VALUES
('en'),
('es');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tm_page`
--

CREATE TABLE `tm_page` (
  `page_name` varchar(40) NOT NULL,
  `lang` varchar(2) NOT NULL,
  `title` varchar(70) NOT NULL,
  `content` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tm_page`
--

INSERT INTO `tm_page` (`page_name`, `lang`, `title`, `content`) VALUES
('contacto', 'en', 'Contact - TradúceMe', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<nav class=\"breadcrumb m-0 py-0  w-100 fg\">\r\n<ul class=\"breadcrumb\">\r\n<li>&nbsp;<a href=\"inicio.php\">Inicio</a></li>\r\n<li><a href=\"#\">Contacto</a></li>\r\n</ul>\r\n</nav><main class=\"flex-c\">\r\n<div id=\"tituloPagina\" class=\"m-0 w-100\">\r\n<h1 class=\"display-3 p-5 m-0\">Contact</h1>\r\n</div>\r\n<div id=\"cuerpo\" class=\"cuerpo m-4 text-center d-flex flex-wrap justify-content-center \">\r\n<div id=\"bloque-texto-contacto\" class=\"p-4 align-self-start w-50 \">\r\n<h2 class=\"\">Need More information?</h2>\r\n<p>Escr&iacute;beme un correo, ll&aacute;mame o m&aacute;ndame un mensaje de Whatsapp y te responder&eacute; lo antes posible.</p>\r\n</div>\r\n<address id=\"bloque-datos-contacto\" class=\"container p-4 w-50  align-self-start\">\r\n<h2 class=\"\">Here i Am</h2>\r\n<!-- <p class=\"my-1\">Escríbeme y te responeré lo antes posible:</p> -->\r\n<ul class=\"list-unstyled\">\r\n<li>Malena Mart&iacute;nez D&iacute;ez</li>\r\n<li><a class=\"email\" href=\"mailto:malena.traduceme@gmail.com\"> malena.traduceme@gmail.com </a></li>\r\n<li><a class=\"telefono\" href=\"https://wa.me/34646894066?text=&iexcl;Hola%21%20Estaba%20viendo%20web%2C%20me%20llamo&hellip;\" target=\"_blank\" rel=\"noopener\"> +34 646 89 40 66</a></li>\r\n<li><span class=\"chincheta\"> Burgos, Espa&ntilde;a</span></li>\r\n</ul>\r\n</address></div>\r\n</main>\r\n</body>\r\n</html>'),
('contacto', 'es', 'Contacto - TradúceMe', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<nav class=\"breadcrumb m-0 py-0  w-100 fg\">\r\n<ul class=\"breadcrumb\">\r\n<li>&nbsp;<a href=\"inicio.php\">Inicio</a></li>\r\n<li><a href=\"#\">Contacto</a></li>\r\n</ul>\r\n</nav><main class=\"flex-c\">\r\n<div id=\"tituloPagina\" class=\"m-0 w-100\">\r\n<h1 class=\"display-3 p-5 m-0\">Contacto</h1>\r\n</div>\r\n<div id=\"cuerpo\" class=\"cuerpo m-4 text-center d-flex flex-wrap justify-content-center \">\r\n<div id=\"bloque-texto-contacto\" class=\"p-4 align-self-start w-50 \">\r\n<h2 class=\"\">&iquest;Necesitas m&aacute;s informaci&oacute;n?</h2>\r\n<p>Escr&iacute;beme un correo, ll&aacute;mame o m&aacute;ndame un mensaje de Whatsapp y te responder&eacute; lo antes posible.</p>\r\n</div>\r\n<address id=\"bloque-datos-contacto\" class=\"container p-4 w-50  align-self-start\">\r\n<h2 class=\"\">Aqu&iacute; estoy</h2>\r\n<!-- <p class=\"my-1\">Escríbeme y te responeré lo antes posible:</p> -->\r\n<ul class=\"list-unstyled\">\r\n<li>Malena Mart&iacute;nez D&iacute;ez</li>\r\n<li><a class=\"email\" href=\"mailto:malena.traduceme@gmail.com\"> malena.traduceme@gmail.com </a></li>\r\n<li><a class=\"telefono\" href=\"https://wa.me/34646894066?text=&iexcl;Hola%21%20Estaba%20viendo%20web%2C%20me%20llamo&hellip;\" target=\"_blank\" rel=\"noopener\"> +34 646 89 40 66</a></li>\r\n<li><span class=\"chincheta\"> Burgos, Espa&ntilde;a</span></li>\r\n</ul>\r\n</address></div>\r\n</main>\r\n</body>\r\n</html>'),
('inicio', 'en', 'Home - TradúceMe', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<nav id=\"migas\" class=\"  \">\r\n<ul class=\"breadcrumb\">\r\n<li><a href=\"#\">Inicio</a></li>\r\n</ul>\r\n</nav><main class=\"\">\r\n<div id=\"tituloPagina\" class=\"m-0 w-100\">\r\n<div id=\"titulo-SEO-inicio\" class=\"d-none\" hidden=\"\">\r\n<h1>Inicio</h1>\r\n</div>\r\n<h2 class=\"tituloPagina\">At Trad&uacute;ceMe <span id=\"ajusteTituloInicio\"><br /></span>we tratranslate you</h2>\r\n</div>\r\n<div id=\"cuerpo\" class=\"cuerpo\">\r\n<div id=\"bloque-contador-recorrido\" class=\"container text-center my-4\" data-fuente=\"https://bootsnipp.com/snippets/4MByn\">\r\n<h3>My way</h3>\r\n<div class=\"row d-flex align-items-stretch \">\r\n<div class=\"col-md-4 col-sm-12 my-1 \">\r\n<div class=\"counter px-2 \">\r\n<p id=\"traducciones-realizadas\" class=\"heading timer count-title count-number\" data-to=\"57\" data-speed=\"2000\"></p>\r\n<p class=\"count-text \">Traducciones realizadas</p>\r\n</div>\r\n</div>\r\n<div class=\"col-md-4 col-sm-12 my-1 \">\r\n<div class=\"counter px-2 \">\r\n<p id=\"palabras-traducidas\" class=\"heading timer count-title count-number\" data-to=\"55000\" data-speed=\"2000\"></p>\r\n<p class=\"count-text \">Palabras traducidas o editadas</p>\r\n</div>\r\n</div>\r\n<div class=\"col-md-4 col-sm-12 my-1 \">\r\n<div class=\"counter px-2 \">\r\n<p id=\"clietes-satisfechos\" class=\"heading timer count-title count-number\" data-to=\"157\" data-speed=\"2000\"></p>\r\n<p class=\"count-text \">Clientes satisfechos</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n<div id=\"bloque-texto-inicio-1\" class=\"container my-4 text-center\">\r\n<h3 class=\"\">Text Header</h3>\r\n<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sequi, facere! Quos commodi eveniet distinctio sequi deleniti totam natus quae perferendis delectus quisquam, impedit atque, in molestiae saepe consequatur fugit inventore? Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic earum asperiores voluptates inventore excepturi quaerat quasi ratione laboriosam, autem illo ea at totam magni labore eius quae? Ex, culpa sequi!</p>\r\n</div>\r\n<hr />\r\n<div id=\"bloque-servicios-ofrecidos\" class=\"container my-4 \">\r\n<h3 class=\"center\">&iquest;Qu&eacute; servicios te ofrezco?</h3>\r\n<ul class=\"list-inline center \">\r\n<li class=\"list-inline-item\"><a href=\"#\">Traducci&oacute;n Jurada</a></li>\r\n<li class=\"list-inline-item\"><a href=\"#\">Traducci&oacute;n Jur&iacute;dica</a></li>\r\n<li class=\"list-inline-item\"><a href=\"#\">Traducci&oacute;n Econ&oacute;mica</a></li>\r\n<li class=\"list-inline-item\"><a href=\"#\">Traducci&oacute;n T&eacute;cnica y Especializada</a></li>\r\n<li class=\"list-inline-item\"><a href=\"#\">Traducci&oacute;n Audiovisual</a></li>\r\n<li class=\"list-inline-item\"><a href=\"#\">Traducci&oacute;n de P&aacute;ginas Web y Software</a></li>\r\n<li class=\"list-inline-item\"><a href=\"#\">Revisi&oacute;n de traducciones de terceros</a></li>\r\n<li class=\"list-inline-item\"><a href=\"#\">Correcci&oacute;n de textos</a></li>\r\n<li class=\"list-inline-item\"><a href=\"#\">Transcripci&oacute;n y subtitulaci&oacute;n</a></li>\r\n<li class=\"list-inline-item\"><a href=\"#\">Creaci&oacute;n de bases terminol&oacute;gicas</a></li>\r\n<li class=\"list-inline-item\"><a href=\"#\">Creaci&oacute;n de memorias de traducci&oacute;n</a></li>\r\n<li class=\"list-inline-item\"><a href=\"#\">Asesoramiento ling&uuml;istico</a></li>\r\n</ul>\r\n</div>\r\n<div id=\"bloque-opiniones\" class=\"container my-4 text-center carousel slide\">\r\n<h3>Opiniones</h3>\r\n<div id=\"opiniones\" class=\" container-fluid carousel-inner px-4\" data-ride=\"carousel\">\r\n<div class=\"comilla-ini \">&nbsp;</div>\r\n<div class=\"comilla-fin \">&nbsp;</div>\r\n<div class=\"carousel-item \">\r\n<p class=\"opinion\"><q> Me ha traducido los textos de mi p&aacute;gina web. Entiendo bien el ingl&eacute;s y los veo muy acertados. </q> <span class=\"autor-cita\">&Aacute;ngel Mori Mart&iacute;nez</span></p>\r\n</div>\r\n<div class=\"carousel-item active\">\r\n<p class=\"opinion\"><q> Malena ha superado mis expectativas. Realmente he quedado satisfecho con su trabajo, mis clientes del mercado internacional lo agradecer&aacute;n sin duda. </q> <span class=\"autor-cita\">Marta Gallardo</span></p>\r\n</div>\r\n<div class=\"carousel-item\">\r\n<p class=\"opinion\"><q> Muchas gracias por la revisi&oacute;n de mi documento! </q> <span class=\"autor-cita\">Ricardo Soler</span></p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</main>\r\n</body>\r\n</html>'),
('inicio', 'es', 'Inicio - TradúceMe', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<nav id=\"migas\" class=\"  \">\r\n<ul class=\"breadcrumb\">\r\n<li><a href=\"#\">Inicio</a></li>\r\n</ul>\r\n</nav><main class=\"\">\r\n<div id=\"tituloPagina\" class=\"m-0 w-100\">\r\n<div id=\"titulo-SEO-inicio\" class=\"d-none\" hidden=\"\">\r\n<h1>Inicio</h1>\r\n</div>\r\n<h2 class=\"tituloPagina\">En Trad&uacute;ceMe <span id=\"ajusteTituloInicio\"><br /></span> te traducimos a ti</h2>\r\n</div>\r\n<div id=\"cuerpo\" class=\"cuerpo\">\r\n<div id=\"bloque-contador-recorrido\" class=\"container text-center my-4\" data-fuente=\"https://bootsnipp.com/snippets/4MByn\">\r\n<h3>Mi recorrido</h3>\r\n<div class=\"row d-flex align-items-stretch \">\r\n<div class=\"col-md-4 col-sm-12 my-1 \">\r\n<div class=\"counter px-2 \">\r\n<p id=\"traducciones-realizadas\" class=\"heading timer count-title count-number\" data-to=\"57\" data-speed=\"2000\"></p>\r\n<p class=\"count-text \">Traducciones realizadas</p>\r\n</div>\r\n</div>\r\n<div class=\"col-md-4 col-sm-12 my-1 \">\r\n<div class=\"counter px-2 \">\r\n<p id=\"palabras-traducidas\" class=\"heading timer count-title count-number\" data-to=\"55000\" data-speed=\"2000\"></p>\r\n<p class=\"count-text \">Palabras traducidas o editadas</p>\r\n</div>\r\n</div>\r\n<div class=\"col-md-4 col-sm-12 my-1 \">\r\n<div class=\"counter px-2 \">\r\n<p id=\"clietes-satisfechos\" class=\"heading timer count-title count-number\" data-to=\"157\" data-speed=\"2000\"></p>\r\n<p class=\"count-text \">Clientes satisfechos</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n<div id=\"bloque-texto-inicio-1\" class=\"container my-4 text-center\">\r\n<h3 class=\"\">Titulo del texto</h3>\r\n<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sequi, facere! Quos commodi eveniet distinctio sequi deleniti totam natus quae perferendis delectus quisquam, impedit atque, in molestiae saepe consequatur fugit inventore? Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic earum asperiores voluptates inventore excepturi quaerat quasi ratione laboriosam, autem illo ea at totam magni labore eius quae? Ex, culpa sequi!</p>\r\n</div>\r\n<hr />\r\n<div id=\"bloque-servicios-ofrecidos\" class=\"container my-4 \">\r\n<h3 class=\"center\">&iquest;Qu&eacute; servicios te ofrezco?</h3>\r\n<ul class=\"list-inline center \">\r\n<li class=\"list-inline-item\"><a href=\"#\">Traducci&oacute;n Jurada</a></li>\r\n<li class=\"list-inline-item\"><a href=\"#\">Traducci&oacute;n Jur&iacute;dica</a></li>\r\n<li class=\"list-inline-item\"><a href=\"#\">Traducci&oacute;n Econ&oacute;mica</a></li>\r\n<li class=\"list-inline-item\"><a href=\"#\">Traducci&oacute;n T&eacute;cnica y Especializada</a></li>\r\n<li class=\"list-inline-item\"><a href=\"#\">Traducci&oacute;n Audiovisual</a></li>\r\n<li class=\"list-inline-item\"><a href=\"#\">Traducci&oacute;n de P&aacute;ginas Web y Software</a></li>\r\n<li class=\"list-inline-item\"><a href=\"#\">Revisi&oacute;n de traducciones de terceros</a></li>\r\n<li class=\"list-inline-item\"><a href=\"#\">Correcci&oacute;n de textos</a></li>\r\n<li class=\"list-inline-item\"><a href=\"#\">Transcripci&oacute;n y subtitulaci&oacute;n</a></li>\r\n<li class=\"list-inline-item\"><a href=\"#\">Creaci&oacute;n de bases terminol&oacute;gicas</a></li>\r\n<li class=\"list-inline-item\"><a href=\"#\">Creaci&oacute;n de memorias de traducci&oacute;n</a></li>\r\n<li class=\"list-inline-item\"><a href=\"#\">Asesoramiento ling&uuml;istico</a></li>\r\n</ul>\r\n</div>\r\n<div id=\"bloque-opiniones\" class=\"container my-4 text-center carousel slide\">\r\n<h3>Opiniones</h3>\r\n<div id=\"opiniones\" class=\" container-fluid carousel-inner px-4\" data-ride=\"carousel\">\r\n<div class=\"comilla-ini \">&nbsp;</div>\r\n<div class=\"comilla-fin \">&nbsp;</div>\r\n<div class=\"carousel-item \">\r\n<p class=\"opinion\"><q> Me ha traducido los textos de mi p&aacute;gina web. Entiendo bien el ingl&eacute;s y los veo muy acertados. </q> <span class=\"autor-cita\">&Aacute;ngel Mori Mart&iacute;nez</span></p>\r\n</div>\r\n<div class=\"carousel-item active\">\r\n<p class=\"opinion\"><q> Malena ha superado mis expectativas. Realmente he quedado satisfecho con su trabajo, mis clientes del mercado internacional lo agradecer&aacute;n sin duda. </q> <span class=\"autor-cita\">Marta Gallardo</span></p>\r\n</div>\r\n<div class=\"carousel-item\">\r\n<p class=\"opinion\"><q> Muchas gracias por la revisi&oacute;n de mi documento! </q> <span class=\"autor-cita\">Ricardo Soler</span></p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</main>\r\n</body>\r\n</html>'),
('sobremi', 'en', 'Sobre mí - TradúceMe', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<nav class=\" m-0 py-0  w-100 fg\">\r\n<ul class=\"breadcrumb\">\r\n<li><a href=\"inicio.php\">Inicio</a></li>\r\n<li><a href=\"#\">Sobre m&iacute;</a></li>\r\n</ul>\r\n</nav><!-- <textarea id=\"my-textarea\" class=\"form-control\" name=\"\" rows=\"3\"> --><main class=\"flex-c\">\r\n<div id=\"tituloPagina\" class=\"\">\r\n<h1 class=\"\">About me: Malena</h1>\r\n</div>\r\n<div id=\"cuerpo\" class=\"m-4 row d-flex  flex-wrap justify-content-center\">\r\n<div class=\"col-12 col-sm-6 col-md-6 col-lg-5 col-xl-4 center \"><img class=\"img-fluid sticky-top my-4\" src=\"../img/orla.jpeg\" alt=\"Orla\" /></div>\r\n<div id=\"textoCuerpo\" class=\"col-12 col-sm-6 col-md-6 col-lg-5 col-xl-8 my-4\">\r\n<h2 class=\" \">Hello!</h2>\r\n<p>Me llamo Malena Mart&iacute;nez D&iacute;ez y soy fil&oacute;loga, traductora y profesora de lenguas. Todo ello por vocaci&oacute;n.</p>\r\n<p>Me encantan tanto los idiomas y como la ense&ntilde;anza, desde peque&ntilde;a ya apuntaba maneras.</p>\r\n<p>Desde que acab&eacute; el instituto, no he parado de estudiar para conseguir un grado y dos m&aacute;steres universitarios:</p>\r\n<ul class=\" list pl-4 \">\r\n<li>Grado en Estudios Ingleses, Universidad de Valladolid.</li>\r\n<li>M&aacute;ster en Traducci&oacute;n Institucional, Universidad de Alicante</li>\r\n<li>M&aacute;ster en Ense&ntilde;anza de Espa&ntilde;ol como Lengua Extranjera, Universidad de Burgos.</li>\r\n</ul>\r\n<h2 class=\" \">Otros estudios</h2>\r\n<ul class=\" list-unstyled \">\r\n<li>Curso de traducci&oacute;n de contenidos audiovisuales para plataformas VOD EN-ES</li>\r\n</ul>\r\n<h2>Mas cosas...</h2>\r\n<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sequi, facere! Quos commodi eveniet distinctio sequi deleniti totam natus quae perferendis delectus quisquam, impedit atque, in molestiae saepe consequatur fugit inventore? Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic earum asperiores voluptates inventore excepturi quaerat quasi ratione laboriosam, autem illo ea at totam magni labore eius quae? Ex, culpa sequi!</p>\r\n</div>\r\n</div>\r\n</main>\r\n</body>\r\n</html>'),
('sobremi', 'es', 'Sobre mí - TradúceMe', '<nav class=\" m-0 py-0  w-100 fg\">\r\n        <ul class=\"breadcrumb\">\r\n            <li> <a href=\"inicio.php\">Inicio</a> </li>\r\n            <li> <a href=\"#\">Sobre mí</a> </li>\r\n        </ul>\r\n    </nav>\r\n\r\n    <!-- <textarea id=\"my-textarea\" class=\"form-control\" name=\"\" rows=\"3\"> -->\r\n\r\n\r\n\r\n    <main class=\"flex-c\">\r\n\r\n\r\n        <div id=\"tituloPagina\" class=\"\">\r\n\r\n            <h1 class=\"\">Sobre mí: Malena</h1>\r\n\r\n        </div>\r\n\r\n\r\n        <div id=\'cuerpo\' class=\"m-4 row d-flex  flex-wrap justify-content-center\">\r\n\r\n            <div class=\"col-12 col-sm-6 col-md-6 col-lg-5 col-xl-4 center \">\r\n                <img src=\"../img/orla.jpeg\" alt=\"Orla\" class=\'img-fluid sticky-top my-4\'>\r\n            </div>\r\n\r\n\r\n            <div id=\"textoCuerpo\" class=\"col-12 col-sm-6 col-md-6 col-lg-5 col-xl-8 my-4\">\r\n\r\n                <h2 class=\" \">¡Hola!</h2>\r\n                <p>\r\n                    Me llamo Malena Martínez Díez y soy filóloga, traductora y profesora de lenguas. Todo ello por vocación.\r\n                </p>\r\n\r\n                <p>\r\n                    Me encantan tanto los idiomas y como la enseñanza, desde pequeña ya apuntaba maneras.\r\n                </p>\r\n\r\n                <p>\r\n                    Desde que acabé el instituto, no he parado de estudiar para conseguir un grado y dos másteres universitarios:\r\n                </p>\r\n                <ul class=\" list pl-4 \">\r\n                    <li> Grado en Estudios Ingleses, Universidad de Valladolid. </li>\r\n                    <li> Máster en Traducción Institucional, Universidad de Alicante </li>\r\n                    <li> Máster en Enseñanza de Español como Lengua Extranjera, Universidad de Burgos. </li>\r\n                </ul>\r\n\r\n                <h2 class=\" \">Otros estudios</h2>\r\n                <ul class=\" list-unstyled \">\r\n                    <li> Curso de traducción de contenidos audiovisuales para plataformas VOD EN-ES </li>\r\n                </ul>\r\n            </div>\r\n\r\n\r\n        </div>\r\n    </main>'),
('traduccion', 'en', 'Translation services', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<nav class=\" m-0 py-0 w-100 fg\">\r\n<ul class=\"breadcrumb\">\r\n<li><a href=\"../../\">Inicio</a></li>\r\n<li><a href=\"http://127.0.0.1/Proyecto-final-DAW/tm_admin/\">Traducci&oacute;n</a></li>\r\n</ul>\r\n</nav><main class=\"flex-c\">\r\n<div id=\"tituloPagina\" class=\"\">\r\n<h1 class=\"\">Translation services</h1>\r\n</div>\r\n<div id=\"cuerpo-1\" class=\"cuerpo container-fluid my-4\"><!--   d-flex flex-wrap justify-content-center   -->\r\n<div id=\"tipos-traducciones\" class=\"container-fluid\">\r\n<div class=\"cuadricula row m-0  w-100 justify-content-center\">\r\n<div class=\"col-xl-3 col-lg-5 col-md-5 col-sm-9 col-12 m-4 p-4 divEnlace\">\r\n<h2>Translation jurada</h2>\r\n<ul class=\"list-unstyled mb-0\">\r\n<li>Una breve explicaci&oacute;n</li>\r\n<li>de dos</li>\r\n<li>o tres lineas no demasiado largas, por favor</li>\r\n</ul>\r\n</div>\r\n<div class=\"col-xl-3 col-lg-5 col-md-5 col-sm-9 col-12 m-4 p-4 divEnlace\">\r\n<h2>Translation</h2>\r\n<h2>jur&iacute;dica</h2>\r\n<ul class=\"list-unstyled mb-0\">\r\n<li>Lorem ipsum dolor sit amet consectetur</li>\r\n<li>adipisicing elit cupiditate .</li>\r\n<li>adipia in veniam sunt iure.</li>\r\n</ul>\r\n</div>\r\n<div class=\"col-xl-3 col-lg-5 col-md-5 col-sm-9 col-12 m-4 p-4 divEnlace\">\r\n<h2>Translation</h2>\r\n<h2>econ&oacute;mica</h2>\r\n<ul class=\"list-unstyled mb-0\">\r\n<li>Una breve explicaci&oacute;n</li>\r\n<li>de dos lineas</li>\r\n<li>&nbsp;</li>\r\n</ul>\r\n</div>\r\n<div class=\"col-xl-3 col-lg-5 col-md-5 col-sm-9 col-12 m-4 p-4 divEnlace\">\r\n<h2>Translation</h2>\r\n<h2>t&eacute;cnica y especializada</h2>\r\n<ul class=\"list-unstyled mb-0\">\r\n<li>Una breve explicaci&oacute;n</li>\r\n<li>de dos</li>\r\n<li>o tres lineas no demasiado largas, por favor</li>\r\n</ul>\r\n</div>\r\n<div class=\"col-xl-3 col-lg-5 col-md-5 col-sm-9 col-12 m-4 p-4 divEnlace\">\r\n<h2>Translation</h2>\r\n<h2>audiovisual</h2>\r\n<ul class=\"list-unstyled mb-0\">\r\n<li>Lorem ipsum dolor sit amet consectetur</li>\r\n<li>adipisicing elit cupiditate .</li>\r\n<li>adipia in veniam sunt iure.</li>\r\n</ul>\r\n</div>\r\n<div class=\"col-xl-3 col-lg-5 col-md-5 col-sm-9 col-12 m-4 p-4 divEnlace\">\r\n<h2>Translation</h2>\r\n<h2>&nbsp;web and software</h2>\r\n<ul class=\"list-unstyled mb-0\">\r\n<li>Una breve explicaci&oacute;n</li>\r\n<li>de dos lineas</li>\r\n<li>&nbsp;</li>\r\n</ul>\r\n</div>\r\n</div>\r\n<!-- fin de .row --></div>\r\n</div>\r\n<hr />\r\n<div id=\"cuerpo-2\" class=\"cuerpo container-fluid my-4\">\r\n<div id=\"otros-servicios\" class=\"container mb-4 \">\r\n<h2 class=\"center\">&iquest;Qu&eacute; otros servicios se ofrecen?</h2>\r\n<ul class=\"list-inline center \">\r\n<li class=\"list-inline-item\">Revisi&oacute;n de traducciones de terceros</li>\r\n<li class=\"list-inline-item\">Correcci&oacute;n de textos</li>\r\n<li class=\"list-inline-item\">Transcripci&oacute;n y subtitulaci&oacute;n</li>\r\n<li class=\"list-inline-item\">Creaci&oacute;n de bases terminol&oacute;gicas</li>\r\n<li class=\"list-inline-item\">Creaci&oacute;n de memorias de traducci&oacute;n</li>\r\n<li class=\"list-inline-item\">Asesoramiento ling&uuml;istico</li>\r\n</ul>\r\n</div>\r\n</div>\r\n</main>\r\n</body>\r\n</html>'),
('traduccion', 'es', 'Servicios de Traducción', '    <nav class=\" m-0 py-0 w-100 fg\">\r\n        <ul class=\"breadcrumb\">\r\n            <li>\r\n                <a href=\"../..\">Inicio</a>\r\n            </li>\r\n            <li>\r\n                <a href=\".\">Traducción</a>\r\n            </li>\r\n        </ul>\r\n    </nav>\r\n\r\n\r\n    <main class=\"flex-c\">\r\n\r\n\r\n\r\n        <div id=\"tituloPagina\" class=\"\">\r\n\r\n            <h1 class=\"\">Servicios de Traducción</h1>\r\n\r\n        </div>\r\n\r\n\r\n        <div id=\"cuerpo-1\" class=\"cuerpo container-fluid my-4\">\r\n            <!--   d-flex flex-wrap justify-content-center   -->\r\n            <div id=\"tipos-traducciones\" class=\"container-fluid\">\r\n\r\n                <div class=\"cuadricula row m-0  w-100 justify-content-center\">\r\n                    <div class=\"col-xl-3 col-lg-5 col-md-5 col-sm-9 col-12 m-4 p-4 divEnlace\">\r\n                        <a href=\"traduccion-jurada.php\" class=\"divEnlace\"></a>\r\n                        <h2>Traducción jurada</h2>\r\n                        <ul class=\"list-unstyled mb-0\">\r\n                            <li>Una breve explicación</li>\r\n                            <li>de dos</li>\r\n                            <li>o tres lineas no demasiado largas, por favor</li>\r\n                        </ul>\r\n                    </div>\r\n                    <div class=\"col-xl-3 col-lg-5 col-md-5 col-sm-9 col-12 m-4 p-4 divEnlace\">\r\n                        <a href=\"traduccion-juridica.php\" class=\"divEnlace\"></a>\r\n                        <h2>Traducción jurídica</h2>\r\n                        <ul class=\"list-unstyled mb-0\">\r\n                            <li>Lorem ipsum dolor sit amet consectetur </li>\r\n                            <li>adipisicing elit cupiditate .</li>\r\n                            <li>adipia in veniam sunt iure.</li>\r\n                        </ul>\r\n                    </div>\r\n                    <div class=\"col-xl-3 col-lg-5 col-md-5 col-sm-9 col-12 m-4 p-4 divEnlace\">\r\n                        <a href=\"traduccion-economica.php\" class=\"divEnlace\"></a>\r\n                        <h2>Traducción económica</h2>\r\n                        <ul class=\"list-unstyled mb-0\">\r\n                            <li>Una breve explicación</li>\r\n                            <li>de dos lineas</li>\r\n                            <li></li>\r\n                        </ul>\r\n                    </div>\r\n                    <div class=\"col-xl-3 col-lg-5 col-md-5 col-sm-9 col-12 m-4 p-4 divEnlace\">\r\n                        <a href=\"traduccion-tecnica-y-especializada\" class=\"divEnlace\"></a>\r\n                        <h2>Traducción técnica y especializada</h2>\r\n                        <ul class=\"list-unstyled mb-0\">\r\n                            <li>Una breve explicación</li>\r\n                            <li>de dos</li>\r\n                            <li>o tres lineas no demasiado largas, por favor</li>\r\n                        </ul>\r\n                    </div>\r\n                    <div class=\"col-xl-3 col-lg-5 col-md-5 col-sm-9 col-12 m-4 p-4 divEnlace\">\r\n                        <a href=\"traduccion-audiovisual.php\" class=\"divEnlace\"></a>\r\n                        <h2>Traducción audiovisual</h2>\r\n                        <ul class=\"list-unstyled mb-0\">\r\n                            <li>Lorem ipsum dolor sit amet consectetur </li>\r\n                            <li>adipisicing elit cupiditate .</li>\r\n                            <li>adipia in veniam sunt iure.</li>\r\n                        </ul>\r\n                    </div>\r\n                    <div class=\"col-xl-3 col-lg-5 col-md-5 col-sm-9 col-12 m-4 p-4 divEnlace\">\r\n                        <a href=\"traduccion-de-paginas-web-y-software.php\" class=\"divEnlace\"></a>\r\n                        <h2>Traducción de páginas web y software</h2>\r\n                        <ul class=\"list-unstyled mb-0\">\r\n                            <li>Una breve explicación</li>\r\n                            <li>de dos lineas</li>\r\n                            <li></li>\r\n                        </ul>\r\n                    </div>\r\n                </div>\r\n                <!-- fin de .row -->\r\n            </div>\r\n\r\n        </div>\r\n\r\n        <hr>\r\n\r\n        <div id=\"cuerpo-2\" class=\"cuerpo container-fluid my-4\">\r\n\r\n            <div id=\"otros-servicios\" class=\"container mb-4 \">\r\n                <h2 class=\"center\">¿Qué otros servicios se ofrecen?\r\n                </h2>\r\n                <ul class=\"list-inline center \">\r\n                    <li class=\"list-inline-item\">Revisión de traducciones de terceros</li>\r\n                    <li class=\"list-inline-item\">Corrección de textos</li>\r\n                    <li class=\"list-inline-item\">Transcripción y subtitulación</li>\r\n                    <li class=\"list-inline-item\">Creación de bases terminológicas</li>\r\n                    <li class=\"list-inline-item\">Creación de memorias de traducción</li>\r\n                    <li class=\"list-inline-item\">Asesoramiento lingüistico</li>\r\n\r\n                </ul>\r\n            </div>\r\n\r\n\r\n\r\n        </div>\r\n    </main>'),
('traduccion-jurada', 'en', 'Sworn Translation - TradúceMe', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<nav class=\" m-0 py-0  w-100 \">\r\n<ul class=\"breadcrumb\">\r\n<li><a href=\"../../\">Inicio</a></li>\r\n<li><a href=\"http://127.0.0.1/Proyecto-final-DAW/tm_admin/\">Traducci&oacute;n</a></li>\r\n<li><a href=\"#\">Traducci&oacute;n Sworn&nbsp;</a></li>\r\n</ul>\r\n</nav><main class=\"flex-c\">\r\n<div id=\"tituloPagina\" class=\"\">\r\n<h1 class=\"\">Traducci&oacute;n Sworn&nbsp;</h1>\r\n</div>\r\n<div id=\"cuerpo\" class=\"container my-4\">\r\n<div class=\"container\">\r\n<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore, nam nisi aliquam maiores iure temporibus delectus numquam tempora aliquid dolor? Id tenetur culpa reiciendis pariatur porro, labore debitis vel explicabo.</p>\r\n</div>\r\n<div class=\"container\">\r\n<p>Perferendis amet aperiam esse possimus fugiat ad vel, impedit minima itaque non! Ipsum facere veniam consectetur, cum velit quia vero molestiae perspiciatis similique quae aperiam expedita iure reiciendis ex adipisci?</p>\r\n</div>\r\n<div class=\"container\">\r\n<p>Facere asperiores ullam in placeat vero distinctio reprehenderit accusamus, odio consectetur doloribus maiores, cum, eos delectus ea ducimus sapiente! Perferendis quasi est eum doloremque totam ducimus voluptate, consectetur explicabo quos?&nbsp;</p>\r\n</div>\r\n<div class=\"container\">\r\n<p>Illum, voluptate hic. Perferendis incidunt voluptatum voluptate dignissimos in modi quaerat, unde quisquam iste doloremque, earum velit. Blanditiis repudiandae voluptatem fuga deleniti exercitationem accusantium! Nisi hic aliquam aperiam ratione atque.</p>\r\n</div>\r\n<div class=\"container\">\r\n<p>Ducimus beatae quos earum doloremque aspernatur ea quis molestiae eaque, officia repudiandae iusto voluptas eos fugit praesentium tempore magni odio? Iure, sunt? Ipsa nam modi ea atque, ducimus sint doloribus?</p>\r\n</div>\r\n<div class=\"container\">\r\n<p>Neque alias repellendus tempora fuga consequatur beatae eius, fugit amet animi molestias nemo exercitationem maxime quae sed ratione. Ad explicabo dolorem sint, cupiditate cum asperiores voluptas illo vero ex modi!</p>\r\n</div>\r\n<div class=\"container\">\r\n<p>Voluptatum facilis accusantium tenetur est aliquid sunt, illo, unde vero officiis libero minima id. Itaque alias quae doloremque maiores nostrum necessitatibus nulla exercitationem deserunt reiciendis a, voluptatibus magnam iure harum?</p>\r\n</div>\r\n<div class=\"container\">\r\n<p>Inventore magnam ipsa animi eveniet in excepturi, officia placeat veritatis corporis nesciunt. Incidunt asperiores sapiente, nobis qui totam nemo recusandae optio possimus tempora quos quo, at explicabo exercitationem reiciendis dignissimos?</p>\r\n</div>\r\n</div>\r\n</main>\r\n</body>\r\n</html>'),
('traduccion-jurada', 'es', 'Traduccion Jurada - TradúceMe', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<nav class=\" m-0 py-0  w-100 \">\r\n<ul class=\"breadcrumb\">\r\n<li><a href=\"../../\">Inicio</a></li>\r\n<li><a href=\"http://127.0.0.1/Proyecto-final-DAW/tm_admin/\">Traducci&oacute;n</a></li>\r\n<li><a href=\"#\">Traducci&oacute;n Jurada&nbsp;</a></li>\r\n</ul>\r\n</nav><main class=\"flex-c\">\r\n<div id=\"tituloPagina\" class=\"\">\r\n<h1 class=\"\">Traducci&oacute;n Jurada&nbsp;</h1>\r\n</div>\r\n<div id=\"cuerpo\" class=\"container my-4\">\r\n<div class=\"container\">\r\n<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore, nam nisi aliquam maiores iure temporibus delectus numquam tempora aliquid dolor? Id tenetur culpa reiciendis pariatur porro, labore debitis vel explicabo.&nbsp;</p>\r\n</div>\r\n<div class=\"container\">\r\n<p>Perferendis amet aperiam esse possimus fugiat ad vel, impedit minima itaque non! Ipsum facere veniam consectetur, cum velit quia vero molestiae perspiciatis similique quae aperiam expedita iure reiciendis ex adipisci?</p>\r\n</div>\r\n<div class=\"container\">\r\n<p>Facere asperiores ullam in placeat vero distinctio reprehenderit accusamus, odio consectetur doloribus maiores, cum, eos delectus ea ducimus sapiente! Perferendis quasi est eum doloremque totam ducimus voluptate, consectetur explicabo quos?</p>\r\n</div>\r\n<div class=\"container\">\r\n<p>Illum, voluptate hic. Perferendis incidunt voluptatum voluptate dignissimos in modi quaerat, unde quisquam iste doloremque, earum velit. Blanditiis repudiandae voluptatem fuga deleniti exercitationem accusantium! Nisi hic aliquam aperiam ratione atque.</p>\r\n</div>\r\n<div class=\"container\">\r\n<p>Ducimus beatae quos earum doloremque aspernatur ea quis molestiae eaque, officia repudiandae iusto voluptas eos fugit praesentium tempore magni odio? Iure, sunt? Ipsa nam modi ea atque, ducimus sint doloribus?</p>\r\n</div>\r\n<div class=\"container\">\r\n<p>Neque alias repellendus tempora fuga consequatur beatae eius, fugit amet animi molestias nemo exercitationem maxime quae sed ratione. Ad explicabo dolorem sint, cupiditate cum asperiores voluptas illo vero ex modi!</p>\r\n</div>\r\n<div class=\"container\">\r\n<p>Voluptatum facilis accusantium tenetur est aliquid sunt, illo, unde vero officiis libero minima id. Itaque alias quae doloremque maiores nostrum necessitatibus nulla exercitationem deserunt reiciendis a, voluptatibus magnam iure harum?</p>\r\n</div>\r\n<div class=\"container\">\r\n<p>Inventore magnam ipsa animi eveniet in excepturi, officia placeat veritatis corporis nesciunt. Incidunt asperiores sapiente, nobis qui totam nemo recusandae optio possimus tempora quos quo, at explicabo exercitationem reiciendis dignissimos?</p>\r\n</div>\r\n</div>\r\n</main>\r\n</body>\r\n</html>');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tm_partial`
--

CREATE TABLE `tm_partial` (
  `partial_name` varchar(40) NOT NULL,
  `lang` varchar(2) NOT NULL,
  `content` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tm_partial`
--

INSERT INTO `tm_partial` (`partial_name`, `lang`, `content`) VALUES
('footer', 'en', '<footer>\r\n<div class=\"container \">\r\n<div class=\"row\"><address class=\"col- text-left mb-0\">\r\n<ul class=\"list-unstyled\">\r\n<li>Malena Mart&iacute;nez D&iacute;ez&nbsp;</li>\r\n<li><a class=\"email\" href=\"mailto:malena.traduceme@gmail.com\"> malena.traduceme@gmail.com </a></li>\r\n<li><a class=\"telefono\" href=\"https://wa.me/34646894066?text=&iexcl;Hola%21%20Estaba%20viendo%20web%2C%20me%20llamo&hellip;\" target=\"_blank\" rel=\"noopener\"> +34 646 89 40 66</a></li>\r\n<li><span class=\"chincheta\"> Burgos, Spain</span></li>\r\n<!-- <p>© TradúceMe 2021</p> --></ul>\r\n</address><!-- <a href=\" presupuesto.php \" class=\" botonPresupuesto \">Pide tu presupuesto<br>sin compromiso</a> --></div>\r\n</div>\r\n</footer>'),
('footer', 'es', '<footer>\r\n<div class=\"container \">\r\n<div class=\"row\"><address class=\"col- text-left mb-0\">\r\n<ul class=\"list-unstyled\">\r\n<li>Malena Mart&iacute;nez D&iacute;ez&nbsp; &nbsp;</li>\r\n<li><a class=\"email\" href=\"mailto:malena.traduceme@gmail.com\"> malena.traduceme@gmail.com </a></li>\r\n<li><a class=\"telefono\" href=\"https://wa.me/34646894066?text=&iexcl;Hola%21%20Estaba%20viendo%20web%2C%20me%20llamo&hellip;\" target=\"_blank\" rel=\"noopener\"> +34 646 89 40 66</a></li>\r\n<li><span class=\"chincheta\"> Burgos, Espa&ntilde;a</span></li>\r\n<!-- <p>© TradúceMe 2021</p> --></ul>\r\n</address><!-- <a href=\" presupuesto.php \" class=\" botonPresupuesto \">Pide tu presupuesto<br>sin compromiso</a> --></div>\r\n</div>'),
('header', 'en', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<header>\r\n<div id=\"logoYTitulo\"><a href=\"../\"> <img id=\"logoCabecera\" class=\"logo\" src=\"../img/logo.png\" alt=\"logo\" /> </a>\r\n<p id=\"tituloWeb\" class=\"m-0\"><a href=\"../\">Trad&uacute;ceMe</a></p>\r\n<span id=\"botonMenu\" class=\"m-4\"> ☰ </span></div>\r\n<div id=\"cambioIdiomaEscritorio\"><a class=\"ES cambioIdioma\">????????</a> <a class=\"EN cambioIdioma\">????????</a></div>\r\n<ul id=\"menu\">\r\n<li><a href=\"inicio.php\">Home</a></li>\r\n<li><a href=\"sobremi.php\">About me</a></li>\r\n<li id=\"traduccion\"><a href=\"traduccion.php\">Translation</a>\r\n<ul id=\"tiposTraduccion\">\r\n<li><a href=\"traduccion-jurada.php\">Sworn</a></li>\r\n<li><a href=\"traduccion-juridica.php\">Jur&iacute;dic</a></li>\r\n<li><a href=\"traduccion-economica.php\">Economic</a></li>\r\n<li><a href=\"traduccion-tecnica-y-especializada\">Technic &amp; specialized</a></li>\r\n<li><a href=\"traduccion-audiovisual.php\">Audiovisual</a></li>\r\n<li><a href=\"traduccion-de-paginas-web-y-software.php\">Web &amp; software</a></li>\r\n</ul>\r\n</li>\r\n<li id=\"otrosServicios\"><a href=\"otros-servicios.php\">Other services</a>\r\n<ul id=\"listaServicios\">\r\n<li><a href=\"revision.php\">Third-party texts review</a></li>\r\n<li><a href=\"correccion.php\">Correcci&oacute;n de texts</a></li>\r\n<li><a href=\"transcrip&amp;subtit.php\">Transcription &amp; subtitulation</a></li>\r\n<li><a href=\"bbddterminologicas.php\">Creaci&oacute;n de bases terminol&oacute;gicas</a></li>\r\n<li><a href=\"memorias.php\">Creaci&oacute;n de memorias de traducci&oacute;n</a></li>\r\n<li><a href=\"asesoramiento.php\">Asesoramiento ling&uuml;&iacute;stico</a></li>\r\n</ul>\r\n</li>\r\n<li><a href=\"contacto.php\">Contact</a></li>\r\n<li><a id=\"cambioIdiomaMovil\" class=\"EN cambioIdioma\"></a><a id=\"cambioIdiomaMovil\" class=\"EN cambioIdioma\" href=\"#\"><span class=\"needed\">Change to English version</span> </a></li>\r\n</ul>\r\n</header>\r\n</body>\r\n</html>'),
('header', 'es', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<header>\r\n<div id=\"logoYTitulo\"><a href=\"../\"> <img id=\"logoCabecera\" class=\"logo\" src=\"../img/logo.png\" alt=\"logo\" /> </a>\r\n<p id=\"tituloWeb\" class=\"m-0\"><a href=\"../\">Trad&uacute;ceMe</a></p>\r\n<span id=\"botonMenu\" class=\"m-4\"> ☰ </span></div>\r\n<div id=\"cambioIdiomaEscritorio\"><a class=\"ES cambioIdioma\">????????</a> <a class=\"EN cambioIdioma\">????????</a></div>\r\n<ul id=\"menu\">\r\n<li><a href=\"inicio.php\">Inicio</a></li>\r\n<li><a href=\"sobremi.php\">Sobre m&iacute;</a></li>\r\n<li id=\"traduccion\"><a href=\"traduccion.php\">Traducci&oacute;n</a>\r\n<ul id=\"tiposTraduccion\">\r\n<li><a href=\"traduccion-jurada.php\">Jurada</a></li>\r\n<li><a href=\"traduccion-juridica.php\">Jur&iacute;dica</a></li>\r\n<li><a href=\"traduccion-economica.php\">Econ&oacute;mica</a></li>\r\n<li><a href=\"traduccion-tecnica-y-especializada\">T&eacute;cnica y especializada</a></li>\r\n<li><a href=\"traduccion-audiovisual.php\">Audiovisual</a></li>\r\n<li><a href=\"traduccion-de-paginas-web-y-software.php\">Web y software</a></li>\r\n</ul>\r\n</li>\r\n<li id=\"otrosServicios\"><a href=\"otros-servicios.php\">Otros servicios</a>\r\n<ul id=\"listaServicios\">\r\n<li><a href=\"revision.php\">Revisi&oacute;n de traducciones de terceros</a></li>\r\n<li><a href=\"correccion.php\">Correcci&oacute;n de textos</a></li>\r\n<li><a href=\"transcrip&amp;subtit.php\">Transcripci&oacute;n y subtitulaci&oacute;n</a></li>\r\n<li><a href=\"bbddterminologicas.php\">Creaci&oacute;n de bases terminol&oacute;gicas</a></li>\r\n<li><a href=\"memorias.php\">Creaci&oacute;n de memorias de traducci&oacute;n</a></li>\r\n<li><a href=\"asesoramiento.php\">Asesoramiento ling&uuml;&iacute;stico</a></li>\r\n</ul>\r\n</li>\r\n<li><a href=\"contacto.php\">Contacto</a></li>\r\n<li><a id=\"cambioIdiomaMovil\" class=\"EN cambioIdioma\" href=\"#\">Change to English version</a></li>\r\n</ul>\r\n</header>\r\n</body>\r\n</html>');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tm_access`
--
ALTER TABLE `tm_access`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tm_admin`
--
ALTER TABLE `tm_admin`
  ADD PRIMARY KEY (`user`);

--
-- Indices de la tabla `tm_lang`
--
ALTER TABLE `tm_lang`
  ADD PRIMARY KEY (`lang`);

--
-- Indices de la tabla `tm_page`
--
ALTER TABLE `tm_page`
  ADD PRIMARY KEY (`page_name`,`lang`),
  ADD KEY `lang` (`lang`);

--
-- Indices de la tabla `tm_partial`
--
ALTER TABLE `tm_partial`
  ADD PRIMARY KEY (`partial_name`,`lang`),
  ADD KEY `lang` (`lang`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tm_access`
--
ALTER TABLE `tm_access`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tm_page`
--
ALTER TABLE `tm_page`
  ADD CONSTRAINT `tm_page_ibfk_1` FOREIGN KEY (`lang`) REFERENCES `tm_lang` (`lang`);

--
-- Filtros para la tabla `tm_partial`
--
ALTER TABLE `tm_partial`
  ADD CONSTRAINT `tm_partial_ibfk_1` FOREIGN KEY (`lang`) REFERENCES `tm_lang` (`lang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
