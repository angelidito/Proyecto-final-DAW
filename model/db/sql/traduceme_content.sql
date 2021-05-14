-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-05-2021 a las 12:11:54
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
-- Estructura de tabla para la tabla `tm_pages`
--

CREATE TABLE `tm_pages` (
  `page_name` varchar(40) NOT NULL,
  `lang` varchar(2) NOT NULL,
  `title` varchar(70) NOT NULL,
  `content` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tm_pages`
--

INSERT INTO `tm_pages` (`page_name`, `lang`, `title`, `content`) VALUES
('contacto', 'en', 'Contact - TradúceMe', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<nav class=\"breadcrumb m-0 py-0  w-100 fg\">\r\n<ul class=\"breadcrumb\">\r\n<li>&nbsp;<a href=\"inicio.php\">Inicio</a></li>\r\n<li><a href=\"#\">Contacto</a></li>\r\n</ul>\r\n</nav><main class=\"flex-c\">\r\n<div id=\"tituloPagina\" class=\"m-0 w-100\">\r\n<h1 class=\"display-3 p-5 m-0\">Contact</h1>\r\n</div>\r\n<div id=\"cuerpo\" class=\"cuerpo m-4 text-center d-flex flex-wrap justify-content-center \">\r\n<div id=\"bloque-texto-contacto\" class=\"p-4 align-self-start w-50 \">\r\n<h2 class=\"\">Need More information?</h2>\r\n<p>Escr&iacute;beme un correo, ll&aacute;mame o m&aacute;ndame un mensaje de Whatsapp y te responder&eacute; lo antes posible.</p>\r\n</div>\r\n<address id=\"bloque-datos-contacto\" class=\"container p-4 w-50  align-self-start\">\r\n<h2 class=\"\">Here i Am</h2>\r\n<!-- <p class=\"my-1\">Escríbeme y te responeré lo antes posible:</p> -->\r\n<ul class=\"list-unstyled\">\r\n<li>Malena Mart&iacute;nez D&iacute;ez</li>\r\n<li><a class=\"email\" href=\"mailto:malena.traduceme@gmail.com\"> malena.traduceme@gmail.com </a></li>\r\n<li><a class=\"telefono\" href=\"https://wa.me/34646894066?text=&iexcl;Hola%21%20Estaba%20viendo%20web%2C%20me%20llamo&hellip;\" target=\"_blank\" rel=\"noopener\"> +34 646 89 40 66</a></li>\r\n<li><span class=\"chincheta\"> Burgos, Espa&ntilde;a</span></li>\r\n</ul>\r\n</address></div>\r\n</main>\r\n</body>\r\n</html>'),
('contacto', 'es', 'Contacto - TradúceMe', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<nav class=\"breadcrumb m-0 py-0  w-100 fg\">\r\n<ul class=\"breadcrumb\">\r\n<li>&nbsp;<a href=\"inicio.php\">Inicio</a></li>\r\n<li><a href=\"#\">Contacto</a></li>\r\n</ul>\r\n</nav><main class=\"flex-c\">\r\n<div id=\"tituloPagina\" class=\"m-0 w-100\">\r\n<h1 class=\"display-3 p-5 m-0\">Contacto</h1>\r\n</div>\r\n<div id=\"cuerpo\" class=\"cuerpo m-4 text-center d-flex flex-wrap justify-content-center \">\r\n<div id=\"bloque-texto-contacto\" class=\"p-4 align-self-start w-50 \">\r\n<h2 class=\"\">&iquest;Necesitas m&aacute;s informaci&oacute;n?</h2>\r\n<p>Escr&iacute;beme un correo, ll&aacute;mame o m&aacute;ndame un mensaje de Whatsapp y te responder&eacute; lo antes posible.</p>\r\n</div>\r\n<address id=\"bloque-datos-contacto\" class=\"container p-4 w-50  align-self-start\">\r\n<h2 class=\"\">Aqu&iacute; estoy</h2>\r\n<!-- <p class=\"my-1\">Escríbeme y te responeré lo antes posible:</p> -->\r\n<ul class=\"list-unstyled\">\r\n<li>Malena Mart&iacute;nez D&iacute;ez</li>\r\n<li><a class=\"email\" href=\"mailto:malena.traduceme@gmail.com\"> malena.traduceme@gmail.com </a></li>\r\n<li><a class=\"telefono\" href=\"https://wa.me/34646894066?text=&iexcl;Hola%21%20Estaba%20viendo%20web%2C%20me%20llamo&hellip;\" target=\"_blank\" rel=\"noopener\"> +34 646 89 40 66</a></li>\r\n<li><span class=\"chincheta\"> Burgos, Espa&ntilde;a</span></li>\r\n</ul>\r\n</address></div>\r\n</main>\r\n</body>\r\n</html>'),
('inicio', 'en', 'Home - TradúceMe', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<nav id=\"migas\" class=\"  \">\r\n<ul class=\"breadcrumb\">\r\n<li><a href=\"#\">Inicio</a></li>\r\n</ul>\r\n</nav><main class=\"\">\r\n<div id=\"tituloPagina\" class=\"m-0 w-100\">\r\n<div id=\"titulo-SEO-inicio\" class=\"d-none\" hidden=\"\">\r\n<h1>Inicio</h1>\r\n</div>\r\n<h2 class=\"tituloPagina\">En Trad&uacute;ceMe <span id=\"ajusteTituloInicio\"><br /></span> te traducimos a ti</h2>\r\n</div>\r\n<div id=\"cuerpo\" class=\"cuerpo\">\r\n<div id=\"bloque-contador-recorrido\" class=\"container text-center my-4\" data-fuente=\"https://bootsnipp.com/snippets/4MByn\">\r\n<h3>Mi recorrido</h3>\r\n<div class=\"row d-flex align-items-stretch \">\r\n<div class=\"col-md-4 col-sm-12 my-1 \">\r\n<div class=\"counter px-2 \">\r\n<p id=\"traducciones-realizadas\" class=\"heading timer count-title count-number\" data-to=\"57\" data-speed=\"2000\"></p>\r\n<p class=\"count-text \">Traducciones realizadas</p>\r\n</div>\r\n</div>\r\n<div class=\"col-md-4 col-sm-12 my-1 \">\r\n<div class=\"counter px-2 \">\r\n<p id=\"palabras-traducidas\" class=\"heading timer count-title count-number\" data-to=\"55000\" data-speed=\"2000\"></p>\r\n<p class=\"count-text \">Palabras traducidas o editadas</p>\r\n</div>\r\n</div>\r\n<div class=\"col-md-4 col-sm-12 my-1 \">\r\n<div class=\"counter px-2 \">\r\n<p id=\"clietes-satisfechos\" class=\"heading timer count-title count-number\" data-to=\"157\" data-speed=\"2000\"></p>\r\n<p class=\"count-text \">Clientes satisfechos</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n<div id=\"bloque-texto-inicio-1\" class=\"container my-4 text-center\">\r\n<h3 class=\"\">Titulo del texto</h3>\r\n<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sequi, facere! Quos commodi eveniet distinctio sequi deleniti totam natus quae perferendis delectus quisquam, impedit atque, in molestiae saepe consequatur fugit inventore? Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic earum asperiores voluptates inventore excepturi quaerat quasi ratione laboriosam, autem illo ea at totam magni labore eius quae? Ex, culpa sequi!</p>\r\n</div>\r\n<hr />\r\n<div id=\"bloque-servicios-ofrecidos\" class=\"container my-4 \">\r\n<h3 class=\"center\">&iquest;Qu&eacute; servicios te ofrezco?</h3>\r\n<ul class=\"list-inline center \">\r\n<li class=\"list-inline-item\"><a href=\"#\">Traducci&oacute;n Jurada</a></li>\r\n<li class=\"list-inline-item\"><a href=\"#\">Traducci&oacute;n Jur&iacute;dica</a></li>\r\n<li class=\"list-inline-item\"><a href=\"#\">Traducci&oacute;n Econ&oacute;mica</a></li>\r\n<li class=\"list-inline-item\"><a href=\"#\">Traducci&oacute;n T&eacute;cnica y Especializada</a></li>\r\n<li class=\"list-inline-item\"><a href=\"#\">Traducci&oacute;n Audiovisual</a></li>\r\n<li class=\"list-inline-item\"><a href=\"#\">Traducci&oacute;n de P&aacute;ginas Web y Software</a></li>\r\n<li class=\"list-inline-item\"><a href=\"#\">Revisi&oacute;n de traducciones de terceros</a></li>\r\n<li class=\"list-inline-item\"><a href=\"#\">Correcci&oacute;n de textos</a></li>\r\n<li class=\"list-inline-item\"><a href=\"#\">Transcripci&oacute;n y subtitulaci&oacute;n</a></li>\r\n<li class=\"list-inline-item\"><a href=\"#\">Creaci&oacute;n de bases terminol&oacute;gicas</a></li>\r\n<li class=\"list-inline-item\"><a href=\"#\">Creaci&oacute;n de memorias de traducci&oacute;n</a></li>\r\n<li class=\"list-inline-item\"><a href=\"#\">Asesoramiento ling&uuml;istico</a></li>\r\n</ul>\r\n</div>\r\n<div id=\"bloque-opiniones\" class=\"container my-4 text-center carousel slide\">\r\n<h3>Opiniones</h3>\r\n<div id=\"opiniones\" class=\" container-fluid carousel-inner px-4\" data-ride=\"carousel\">\r\n<div class=\"comilla-ini \">&nbsp;</div>\r\n<div class=\"comilla-fin \">&nbsp;</div>\r\n<div class=\"carousel-item \">\r\n<p class=\"opinion\"><q> Me ha traducido los textos de mi p&aacute;gina web. Entiendo bien el ingl&eacute;s y los veo muy acertados. </q> <span class=\"autor-cita\">&Aacute;ngel Mori Mart&iacute;nez</span></p>\r\n</div>\r\n<div class=\"carousel-item active\">\r\n<p class=\"opinion\"><q> Malena ha superado mis expectativas. Realmente he quedado satisfecho con su trabajo, mis clientes del mercado internacional lo agradecer&aacute;n sin duda. </q> <span class=\"autor-cita\">Marta Gallardo</span></p>\r\n</div>\r\n<div class=\"carousel-item\">\r\n<p class=\"opinion\"><q> Muchas gracias por la revisi&oacute;n de mi documento! </q> <span class=\"autor-cita\">Ricardo Soler</span></p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</main>\r\n</body>\r\n</html>'),
('inicio', 'es', 'Inicio - TradúceMe', '    <nav id=\"migas\" class=\"  \">\r\n        <ul class=\"breadcrumb\">\r\n            <li>\r\n                <a href=\"#\">Inicio</a>\r\n            </li>\r\n        </ul>\r\n    </nav>\r\n\r\n\r\n    <main class=\"\">\r\n\r\n\r\n\r\n        <div id=\"tituloPagina\" class=\"m-0 w-100\">\r\n\r\n            <div id=\"titulo-SEO-inicio\" class=\"d-none\" hidden>\r\n                <h1>Inicio</h1>\r\n            </div>\r\n\r\n            <h2 class=\"tituloPagina\">\r\n                En TradúceMe <span id=\"ajusteTituloInicio\"><br></span> te traducimos a ti\r\n            </h2>\r\n\r\n        </div>\r\n\r\n        <div id=\"cuerpo\" class=\"cuerpo\">\r\n\r\n            <div id=\"bloque-contador-recorrido\" data-fuente=\"https://bootsnipp.com/snippets/4MByn\" class=\"container text-center my-4\">\r\n\r\n                <script>\r\n                    (function($) {\r\n                        $.fn.countTo = function(options) {\r\n                            options = options || {};\r\n\r\n                            return $(this).each(function() {\r\n                                // set options for current element\r\n                                var settings = $.extend({}, $.fn.countTo.defaults, {\r\n                                    from: $(this).data(\'from\'),\r\n                                    to: $(this).data(\'to\'),\r\n                                    speed: $(this).data(\'speed\'),\r\n                                    refreshInterval: $(this).data(\'refresh-interval\'),\r\n                                    decimals: $(this).data(\'decimals\')\r\n                                }, options);\r\n\r\n                                // how many times to update the value, and how much to increment the value on each update\r\n                                var loops = Math.ceil(settings.speed / settings.refreshInterval),\r\n                                    increment = (settings.to - settings.from) / loops;\r\n\r\n                                // references & variables that will change with each update\r\n                                var self = this,\r\n                                    $self = $(this),\r\n                                    loopCount = 0,\r\n                                    value = settings.from,\r\n                                    data = $self.data(\'countTo\') || {};\r\n\r\n                                $self.data(\'countTo\', data);\r\n\r\n                                // if an existing interval can be found, clear it first\r\n                                if (data.interval) {\r\n                                    clearInterval(data.interval);\r\n                                }\r\n                                data.interval = setInterval(updateTimer, settings.refreshInterval);\r\n\r\n                                // initialize the element with the starting value\r\n                                render(value);\r\n\r\n                                function updateTimer() {\r\n                                    value += increment;\r\n                                    loopCount++;\r\n\r\n                                    render(value);\r\n\r\n                                    if (typeof(settings.onUpdate) == \'function\') {\r\n                                        settings.onUpdate.call(self, value);\r\n                                    }\r\n\r\n                                    if (loopCount >= loops) {\r\n                                        // remove the interval\r\n                                        $self.removeData(\'countTo\');\r\n                                        clearInterval(data.interval);\r\n                                        value = settings.to;\r\n\r\n                                        if (typeof(settings.onComplete) == \'function\') {\r\n                                            settings.onComplete.call(self, value);\r\n                                        }\r\n                                    }\r\n                                }\r\n\r\n                                function render(value) {\r\n                                    var formattedValue = settings.formatter.call(self, value, settings);\r\n                                    $self.html(formattedValue);\r\n                                }\r\n                            });\r\n                        };\r\n\r\n\r\n                        $.fn.countTo.defaults = {\r\n                            from: 0, // the number the element should start at\r\n                            to: 0, // the number the element should end at\r\n                            speed: 1000, // how long it should take to count between the target numbers\r\n                            refreshInterval: 100, // how often the element should be updated\r\n                            decimals: 0, // the number of decimal places to show\r\n                            formatter: formatter, // handler for formatting the value before rendering\r\n                            onUpdate: null, // callback method for every time the element is updated\r\n                            onComplete: null // callback method for when the element finishes updating\r\n                        };\r\n\r\n\r\n                        function formatter(value, settings) {\r\n                            return value.toFixed(settings.decimals);\r\n                        }\r\n\r\n                    }(jQuery));\r\n\r\n\r\n\r\n                    jQuery(function($) {\r\n                        // custom formatting example\r\n                        $(\'.count-number\').data(\'countToOptions\', {\r\n                            formatter: function(value, options) {\r\n                                return value.toFixed(options.decimals).replace(\r\n                                    /\\B(?=(?:\\d{3})+(?!\\d))/g, \',\');\r\n                            }\r\n                        });\r\n\r\n                        // start all the timers\r\n                        $(\'.timer\').each(count);\r\n\r\n                        function count(options) {\r\n                            var $this = $(this);\r\n                            options = $.extend({}, options || {}, $this.data(\'countToOptions\') || {});\r\n                            $this.countTo(options);\r\n                        }\r\n                    });\r\n                </script>\r\n\r\n                <h3>Mi recorrido</h3>\r\n\r\n                <div class=\"row d-flex align-items-stretch \">\r\n                    <div class=\"col-md-4 col-sm-12 my-1 \">\r\n                        <div class=\"counter px-2 \">\r\n                            <p id=\"traducciones-realizadas\" class=\"heading timer count-title count-number\" data-to=57 data-speed=\"2000\"></p>\r\n                            <p class=\"count-text \">Traducciones realizadas</p>\r\n                        </div>\r\n                    </div>\r\n                    <div class=\"col-md-4 col-sm-12 my-1 \">\r\n                        <div class=\"counter px-2 \">\r\n                            <p id=\"palabras-traducidas\" class=\"heading timer count-title count-number\" data-to=55000 data-speed=\"2000\">\r\n                            </p>\r\n                            <p class=\"count-text \">Palabras traducidas o editadas</p>\r\n                        </div>\r\n                    </div>\r\n                    <div class=\"col-md-4 col-sm-12 my-1 \">\r\n                        <div class=\"counter px-2 \">\r\n                            <p id=\"clietes-satisfechos\" class=\"heading timer count-title count-number\" data-to=157 data-speed=\"2000\"></p>\r\n                            <p class=\"count-text \">Clientes satisfechos</p>\r\n                        </div>\r\n                    </div>\r\n                </div>\r\n            </div>\r\n\r\n            <div id=\"bloque-texto-inicio-1\" class=\"container my-4 text-center\">\r\n                <h3 class=\"\">Titulo del texto</h3>\r\n                <p>\r\n                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sequi, facere! Quos commodi eveniet distinctio sequi deleniti totam natus quae perferendis delectus quisquam, impedit atque, in molestiae saepe consequatur fugit inventore? Lorem ipsum dolor sit\r\n                    amet consectetur adipisicing elit. Hic earum asperiores voluptates inventore excepturi quaerat quasi ratione laboriosam, autem illo ea at totam magni labore eius quae? Ex, culpa sequi!\r\n                </p>\r\n            </div>\r\n\r\n            <hr>\r\n\r\n\r\n\r\n            <div id=\"bloque-servicios-ofrecidos\" class=\"container my-4 \">\r\n                <h3 class=\"center\">¿Qué servicios te ofrezco?</h3>\r\n                <ul class=\"list-inline center \">\r\n\r\n                    <li class=\"list-inline-item\"><a href=\"#\">Traducción Jurada</a></li>\r\n                    <li class=\"list-inline-item\"><a href=\"#\">Traducción Jurídica</a></li>\r\n                    <li class=\"list-inline-item\"><a href=\"#\">Traducción Económica</a></li>\r\n                    <li class=\"list-inline-item\"><a href=\"#\">Traducción Técnica y Especializada</a></li>\r\n                    <li class=\"list-inline-item\"><a href=\"#\">Traducción Audiovisual</a></li>\r\n                    <li class=\"list-inline-item\"><a href=\"#\">Traducción de Páginas Web y Software</a></li>\r\n                    <li class=\"list-inline-item\"><a href=\"#\">Revisión de traducciones de terceros</a></li>\r\n                    <li class=\"list-inline-item\"><a href=\"#\">Corrección de textos</a></li>\r\n                    <li class=\"list-inline-item\"><a href=\"#\">Transcripción y subtitulación</a></li>\r\n                    <li class=\"list-inline-item\"><a href=\"#\">Creación de bases terminológicas</a></li>\r\n                    <li class=\"list-inline-item\"><a href=\"#\">Creación de memorias de traducción</a></li>\r\n                    <li class=\"list-inline-item\"><a href=\"#\">Asesoramiento lingüistico</a></li>\r\n\r\n                </ul>\r\n            </div>\r\n\r\n            <div id=\"bloque-opiniones\" class=\"container my-4 text-center carousel slide\">\r\n\r\n                <h3>Opiniones</h3>\r\n\r\n                <div id=\"opiniones\" class=\" container-fluid carousel-inner px-4\" data-ride=\"carousel\">\r\n\r\n                    <div class=\"comilla-ini \"></div>\r\n                    <div class=\"comilla-fin \"></div>\r\n\r\n                    <div class=\"carousel-item \">\r\n                        <p class=\"opinion\">\r\n                            <q>\r\n                                Me ha traducido los textos de mi página web. Entiendo bien el inglés y los veo\r\n                                muy acertados.\r\n                            </q>\r\n                            <span class=\"autor-cita\">Ángel Mori Martínez</span>\r\n                        </p>\r\n                    </div>\r\n\r\n                    <div class=\"carousel-item active\">\r\n                        <p class=\"opinion\">\r\n                            <q>\r\n                                Malena ha superado mis expectativas. Realmente he quedado satisfecho con su\r\n                                trabajo, mis clientes del mercado internacional lo agradecerán sin duda.\r\n                            </q>\r\n                            <span class=\"autor-cita\">Marta Gallardo</span>\r\n                        </p>\r\n                    </div>\r\n\r\n                    <div class=\"carousel-item\">\r\n                        <p class=\"opinion\">\r\n                            <q>\r\n                                Muchas gracias por la revisión de mi documento!\r\n                            </q>\r\n                            <span class=\"autor-cita\">Ricardo Soler</span>\r\n                        </p>\r\n                    </div>\r\n                </div>\r\n            </div>\r\n        </div>\r\n\r\n    </main>'),
('sobremi', 'en', 'Sobre mí - TradúceMe', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<nav class=\" m-0 py-0  w-100 fg\">\r\n<ul class=\"breadcrumb\">\r\n<li><a href=\"inicio.php\">Inicio</a></li>\r\n<li><a href=\"#\">Sobre m&iacute;</a></li>\r\n</ul>\r\n</nav><!-- <textarea id=\"my-textarea\" class=\"form-control\" name=\"\" rows=\"3\"> --><main class=\"flex-c\">\r\n<div id=\"tituloPagina\" class=\"\">\r\n<h1 class=\"\">About me: Malena</h1>\r\n</div>\r\n<div id=\"cuerpo\" class=\"m-4 row d-flex  flex-wrap justify-content-center\">\r\n<div class=\"col-12 col-sm-6 col-md-6 col-lg-5 col-xl-4 center \"><img class=\"img-fluid sticky-top my-4\" src=\"../img/orla.jpeg\" alt=\"Orla\" /></div>\r\n<div id=\"textoCuerpo\" class=\"col-12 col-sm-6 col-md-6 col-lg-5 col-xl-8 my-4\">\r\n<h2 class=\" \">Hello!</h2>\r\n<p>Me llamo Malena Mart&iacute;nez D&iacute;ez y soy fil&oacute;loga, traductora y profesora de lenguas. Todo ello por vocaci&oacute;n.</p>\r\n<p>Me encantan tanto los idiomas y como la ense&ntilde;anza, desde peque&ntilde;a ya apuntaba maneras.</p>\r\n<p>Desde que acab&eacute; el instituto, no he parado de estudiar para conseguir un grado y dos m&aacute;steres universitarios:</p>\r\n<ul class=\" list pl-4 \">\r\n<li>Grado en Estudios Ingleses, Universidad de Valladolid.</li>\r\n<li>M&aacute;ster en Traducci&oacute;n Institucional, Universidad de Alicante</li>\r\n<li>M&aacute;ster en Ense&ntilde;anza de Espa&ntilde;ol como Lengua Extranjera, Universidad de Burgos.</li>\r\n</ul>\r\n<h2 class=\" \">Otros estudios</h2>\r\n<ul class=\" list-unstyled \">\r\n<li>Curso de traducci&oacute;n de contenidos audiovisuales para plataformas VOD EN-ES</li>\r\n</ul>\r\n<h2>Mas cosas...</h2>\r\n<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sequi, facere! Quos commodi eveniet distinctio sequi deleniti totam natus quae perferendis delectus quisquam, impedit atque, in molestiae saepe consequatur fugit inventore? Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic earum asperiores voluptates inventore excepturi quaerat quasi ratione laboriosam, autem illo ea at totam magni labore eius quae? Ex, culpa sequi!</p>\r\n</div>\r\n</div>\r\n</main>\r\n</body>\r\n</html>'),
('sobremi', 'es', 'Sobre mí - TradúceMe', '<nav class=\" m-0 py-0  w-100 fg\">\r\n        <ul class=\"breadcrumb\">\r\n            <li> <a href=\"inicio.php\">Inicio</a> </li>\r\n            <li> <a href=\"#\">Sobre mí</a> </li>\r\n        </ul>\r\n    </nav>\r\n\r\n    <!-- <textarea id=\"my-textarea\" class=\"form-control\" name=\"\" rows=\"3\"> -->\r\n\r\n\r\n\r\n    <main class=\"flex-c\">\r\n\r\n\r\n        <div id=\"tituloPagina\" class=\"\">\r\n\r\n            <h1 class=\"\">Sobre mí: Malena</h1>\r\n\r\n        </div>\r\n\r\n\r\n        <div id=\'cuerpo\' class=\"m-4 row d-flex  flex-wrap justify-content-center\">\r\n\r\n            <div class=\"col-12 col-sm-6 col-md-6 col-lg-5 col-xl-4 center \">\r\n                <img src=\"../img/orla.jpeg\" alt=\"Orla\" class=\'img-fluid sticky-top my-4\'>\r\n            </div>\r\n\r\n\r\n            <div id=\"textoCuerpo\" class=\"col-12 col-sm-6 col-md-6 col-lg-5 col-xl-8 my-4\">\r\n\r\n                <h2 class=\" \">¡Hola!</h2>\r\n                <p>\r\n                    Me llamo Malena Martínez Díez y soy filóloga, traductora y profesora de lenguas. Todo ello por vocación.\r\n                </p>\r\n\r\n                <p>\r\n                    Me encantan tanto los idiomas y como la enseñanza, desde pequeña ya apuntaba maneras.\r\n                </p>\r\n\r\n                <p>\r\n                    Desde que acabé el instituto, no he parado de estudiar para conseguir un grado y dos másteres universitarios:\r\n                </p>\r\n                <ul class=\" list pl-4 \">\r\n                    <li> Grado en Estudios Ingleses, Universidad de Valladolid. </li>\r\n                    <li> Máster en Traducción Institucional, Universidad de Alicante </li>\r\n                    <li> Máster en Enseñanza de Español como Lengua Extranjera, Universidad de Burgos. </li>\r\n                </ul>\r\n\r\n                <h2 class=\" \">Otros estudios</h2>\r\n                <ul class=\" list-unstyled \">\r\n                    <li> Curso de traducción de contenidos audiovisuales para plataformas VOD EN-ES </li>\r\n                </ul>\r\n            </div>\r\n\r\n\r\n        </div>\r\n    </main>'),
('traduccion', 'en', 'Translation services', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<nav class=\" m-0 py-0 w-100 fg\">\r\n<ul class=\"breadcrumb\">\r\n<li><a href=\"../../\">Inicio</a></li>\r\n<li><a href=\"http://127.0.0.1/Proyecto-final-DAW/tm_admin/\">Traducci&oacute;n</a></li>\r\n</ul>\r\n</nav><main class=\"flex-c\">\r\n<div id=\"tituloPagina\" class=\"\">\r\n<h1 class=\"\">Translation services</h1>\r\n</div>\r\n<div id=\"cuerpo-1\" class=\"cuerpo container-fluid my-4\"><!--   d-flex flex-wrap justify-content-center   -->\r\n<div id=\"tipos-traducciones\" class=\"container-fluid\">\r\n<div class=\"cuadricula row m-0  w-100 justify-content-center\">\r\n<div class=\"col-xl-3 col-lg-5 col-md-5 col-sm-9 col-12 m-4 p-4 divEnlace\">\r\n<h2>Translation jurada</h2>\r\n<ul class=\"list-unstyled mb-0\">\r\n<li>Una breve explicaci&oacute;n</li>\r\n<li>de dos</li>\r\n<li>o tres lineas no demasiado largas, por favor</li>\r\n</ul>\r\n</div>\r\n<div class=\"col-xl-3 col-lg-5 col-md-5 col-sm-9 col-12 m-4 p-4 divEnlace\">\r\n<h2>Translation</h2>\r\n<h2>jur&iacute;dica</h2>\r\n<ul class=\"list-unstyled mb-0\">\r\n<li>Lorem ipsum dolor sit amet consectetur</li>\r\n<li>adipisicing elit cupiditate .</li>\r\n<li>adipia in veniam sunt iure.</li>\r\n</ul>\r\n</div>\r\n<div class=\"col-xl-3 col-lg-5 col-md-5 col-sm-9 col-12 m-4 p-4 divEnlace\">\r\n<h2>Translation</h2>\r\n<h2>econ&oacute;mica</h2>\r\n<ul class=\"list-unstyled mb-0\">\r\n<li>Una breve explicaci&oacute;n</li>\r\n<li>de dos lineas</li>\r\n<li>&nbsp;</li>\r\n</ul>\r\n</div>\r\n<div class=\"col-xl-3 col-lg-5 col-md-5 col-sm-9 col-12 m-4 p-4 divEnlace\">\r\n<h2>Translation</h2>\r\n<h2>t&eacute;cnica y especializada</h2>\r\n<ul class=\"list-unstyled mb-0\">\r\n<li>Una breve explicaci&oacute;n</li>\r\n<li>de dos</li>\r\n<li>o tres lineas no demasiado largas, por favor</li>\r\n</ul>\r\n</div>\r\n<div class=\"col-xl-3 col-lg-5 col-md-5 col-sm-9 col-12 m-4 p-4 divEnlace\">\r\n<h2>Translation</h2>\r\n<h2>audiovisual</h2>\r\n<ul class=\"list-unstyled mb-0\">\r\n<li>Lorem ipsum dolor sit amet consectetur</li>\r\n<li>adipisicing elit cupiditate .</li>\r\n<li>adipia in veniam sunt iure.</li>\r\n</ul>\r\n</div>\r\n<div class=\"col-xl-3 col-lg-5 col-md-5 col-sm-9 col-12 m-4 p-4 divEnlace\">\r\n<h2>Translation</h2>\r\n<h2>&nbsp;web and software</h2>\r\n<ul class=\"list-unstyled mb-0\">\r\n<li>Una breve explicaci&oacute;n</li>\r\n<li>de dos lineas</li>\r\n<li>&nbsp;</li>\r\n</ul>\r\n</div>\r\n</div>\r\n<!-- fin de .row --></div>\r\n</div>\r\n<hr />\r\n<div id=\"cuerpo-2\" class=\"cuerpo container-fluid my-4\">\r\n<div id=\"otros-servicios\" class=\"container mb-4 \">\r\n<h2 class=\"center\">&iquest;Qu&eacute; otros servicios se ofrecen?</h2>\r\n<ul class=\"list-inline center \">\r\n<li class=\"list-inline-item\">Revisi&oacute;n de traducciones de terceros</li>\r\n<li class=\"list-inline-item\">Correcci&oacute;n de textos</li>\r\n<li class=\"list-inline-item\">Transcripci&oacute;n y subtitulaci&oacute;n</li>\r\n<li class=\"list-inline-item\">Creaci&oacute;n de bases terminol&oacute;gicas</li>\r\n<li class=\"list-inline-item\">Creaci&oacute;n de memorias de traducci&oacute;n</li>\r\n<li class=\"list-inline-item\">Asesoramiento ling&uuml;istico</li>\r\n</ul>\r\n</div>\r\n</div>\r\n</main>\r\n</body>\r\n</html>'),
('traduccion', 'es', 'Servicios de Traducción', '    <nav class=\" m-0 py-0 w-100 fg\">\r\n        <ul class=\"breadcrumb\">\r\n            <li>\r\n                <a href=\"../..\">Inicio</a>\r\n            </li>\r\n            <li>\r\n                <a href=\".\">Traducción</a>\r\n            </li>\r\n        </ul>\r\n    </nav>\r\n\r\n\r\n    <main class=\"flex-c\">\r\n\r\n\r\n\r\n        <div id=\"tituloPagina\" class=\"\">\r\n\r\n            <h1 class=\"\">Servicios de Traducción</h1>\r\n\r\n        </div>\r\n\r\n\r\n        <div id=\"cuerpo-1\" class=\"cuerpo container-fluid my-4\">\r\n            <!--   d-flex flex-wrap justify-content-center   -->\r\n            <div id=\"tipos-traducciones\" class=\"container-fluid\">\r\n\r\n                <div class=\"cuadricula row m-0  w-100 justify-content-center\">\r\n                    <div class=\"col-xl-3 col-lg-5 col-md-5 col-sm-9 col-12 m-4 p-4 divEnlace\">\r\n                        <a href=\"traduccion-jurada.php\" class=\"divEnlace\"></a>\r\n                        <h2>Traducción jurada</h2>\r\n                        <ul class=\"list-unstyled mb-0\">\r\n                            <li>Una breve explicación</li>\r\n                            <li>de dos</li>\r\n                            <li>o tres lineas no demasiado largas, por favor</li>\r\n                        </ul>\r\n                    </div>\r\n                    <div class=\"col-xl-3 col-lg-5 col-md-5 col-sm-9 col-12 m-4 p-4 divEnlace\">\r\n                        <a href=\"traduccion-juridica.php\" class=\"divEnlace\"></a>\r\n                        <h2>Traducción jurídica</h2>\r\n                        <ul class=\"list-unstyled mb-0\">\r\n                            <li>Lorem ipsum dolor sit amet consectetur </li>\r\n                            <li>adipisicing elit cupiditate .</li>\r\n                            <li>adipia in veniam sunt iure.</li>\r\n                        </ul>\r\n                    </div>\r\n                    <div class=\"col-xl-3 col-lg-5 col-md-5 col-sm-9 col-12 m-4 p-4 divEnlace\">\r\n                        <a href=\"traduccion-economica.php\" class=\"divEnlace\"></a>\r\n                        <h2>Traducción económica</h2>\r\n                        <ul class=\"list-unstyled mb-0\">\r\n                            <li>Una breve explicación</li>\r\n                            <li>de dos lineas</li>\r\n                            <li></li>\r\n                        </ul>\r\n                    </div>\r\n                    <div class=\"col-xl-3 col-lg-5 col-md-5 col-sm-9 col-12 m-4 p-4 divEnlace\">\r\n                        <a href=\"traduccion-tecnica-y-especializada\" class=\"divEnlace\"></a>\r\n                        <h2>Traducción técnica y especializada</h2>\r\n                        <ul class=\"list-unstyled mb-0\">\r\n                            <li>Una breve explicación</li>\r\n                            <li>de dos</li>\r\n                            <li>o tres lineas no demasiado largas, por favor</li>\r\n                        </ul>\r\n                    </div>\r\n                    <div class=\"col-xl-3 col-lg-5 col-md-5 col-sm-9 col-12 m-4 p-4 divEnlace\">\r\n                        <a href=\"traduccion-audiovisual.php\" class=\"divEnlace\"></a>\r\n                        <h2>Traducción audiovisual</h2>\r\n                        <ul class=\"list-unstyled mb-0\">\r\n                            <li>Lorem ipsum dolor sit amet consectetur </li>\r\n                            <li>adipisicing elit cupiditate .</li>\r\n                            <li>adipia in veniam sunt iure.</li>\r\n                        </ul>\r\n                    </div>\r\n                    <div class=\"col-xl-3 col-lg-5 col-md-5 col-sm-9 col-12 m-4 p-4 divEnlace\">\r\n                        <a href=\"traduccion-de-paginas-web-y-software.php\" class=\"divEnlace\"></a>\r\n                        <h2>Traducción de páginas web y software</h2>\r\n                        <ul class=\"list-unstyled mb-0\">\r\n                            <li>Una breve explicación</li>\r\n                            <li>de dos lineas</li>\r\n                            <li></li>\r\n                        </ul>\r\n                    </div>\r\n                </div>\r\n                <!-- fin de .row -->\r\n            </div>\r\n\r\n        </div>\r\n\r\n        <hr>\r\n\r\n        <div id=\"cuerpo-2\" class=\"cuerpo container-fluid my-4\">\r\n\r\n            <div id=\"otros-servicios\" class=\"container mb-4 \">\r\n                <h2 class=\"center\">¿Qué otros servicios se ofrecen?\r\n                </h2>\r\n                <ul class=\"list-inline center \">\r\n                    <li class=\"list-inline-item\">Revisión de traducciones de terceros</li>\r\n                    <li class=\"list-inline-item\">Corrección de textos</li>\r\n                    <li class=\"list-inline-item\">Transcripción y subtitulación</li>\r\n                    <li class=\"list-inline-item\">Creación de bases terminológicas</li>\r\n                    <li class=\"list-inline-item\">Creación de memorias de traducción</li>\r\n                    <li class=\"list-inline-item\">Asesoramiento lingüistico</li>\r\n\r\n                </ul>\r\n            </div>\r\n\r\n\r\n\r\n        </div>\r\n    </main>'),
('traduccion-jurada', 'es', 'Traducción jurada - TradúceMe', '    <nav class=\" m-0 py-0  w-100 \">\r\n        <ul class=\"breadcrumb\">\r\n            <li>\r\n                <a href=\"../..\">Inicio</a>\r\n            </li>\r\n            <li>\r\n                <a href=\".\">Traducción</a>\r\n            </li>\r\n            <li>\r\n                <a href=\"#\">Traducción Jurada</a>\r\n            </li>\r\n        </ul>\r\n    </nav>\r\n\r\n\r\n    <main class=\"flex-c\">\r\n\r\n\r\n\r\n        <div id=\"tituloPagina\" class=\"\">\r\n\r\n            <h1 class=\"\">Traducción jurada</h1>\r\n\r\n        </div>\r\n\r\n\r\n        <div id=\'cuerpo\' class=\"container my-4\">\r\n\r\n            <div class=\"container\">\r\n                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore, nam nisi aliquam maiores iure temporibus delectus numquam tempora aliquid dolor? Id tenetur culpa reiciendis pariatur porro, labore debitis vel explicabo.</p>\r\n            </div>\r\n            <div class=\"container\">\r\n                <p>Perferendis amet aperiam esse possimus fugiat ad vel, impedit minima itaque non! Ipsum facere veniam consectetur, cum velit quia vero molestiae perspiciatis similique quae aperiam expedita iure reiciendis ex adipisci?</p>\r\n            </div>\r\n            <div class=\"container\">\r\n                <p>Facere asperiores ullam in placeat vero distinctio reprehenderit accusamus, odio consectetur doloribus maiores, cum, eos delectus ea ducimus sapiente! Perferendis quasi est eum doloremque totam ducimus voluptate, consectetur explicabo\r\n                    quos?\r\n                </p>\r\n            </div>\r\n            <div class=\"container\">\r\n                <p>Illum, voluptate hic. Perferendis incidunt voluptatum voluptate dignissimos in modi quaerat, unde quisquam iste doloremque, earum velit. Blanditiis repudiandae voluptatem fuga deleniti exercitationem accusantium! Nisi hic aliquam aperiam\r\n                    ratione atque.</p>\r\n            </div>\r\n            <div class=\"container\">\r\n                <p>Ducimus beatae quos earum doloremque aspernatur ea quis molestiae eaque, officia repudiandae iusto voluptas eos fugit praesentium tempore magni odio? Iure, sunt? Ipsa nam modi ea atque, ducimus sint doloribus?\r\n                </p>\r\n            </div>\r\n            <div class=\"container\">\r\n                <p>Neque alias repellendus tempora fuga consequatur beatae eius, fugit amet animi molestias nemo exercitationem maxime quae sed ratione. Ad explicabo dolorem sint, cupiditate cum asperiores voluptas illo vero ex modi!</p>\r\n            </div>\r\n            <div class=\"container\">\r\n                <p>Voluptatum facilis accusantium tenetur est aliquid sunt, illo, unde vero officiis libero minima id. Itaque alias quae doloremque maiores nostrum necessitatibus nulla exercitationem deserunt reiciendis a, voluptatibus magnam iure harum?</p>\r\n            </div>\r\n            <div class=\"container\">\r\n                <p>Inventore magnam ipsa animi eveniet in excepturi, officia placeat veritatis corporis nesciunt. Incidunt asperiores sapiente, nobis qui totam nemo recusandae optio possimus tempora quos quo, at explicabo exercitationem reiciendis dignissimos?</p>\r\n            </div>\r\n\r\n        </div>\r\n    </main>');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tm_pages`
--
ALTER TABLE `tm_pages`
  ADD PRIMARY KEY (`page_name`,`lang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
