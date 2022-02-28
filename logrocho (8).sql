-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3307
-- Tiempo de generación: 28-02-2022 a las 12:09:57
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `logrocho`
--
CREATE DATABASE IF NOT EXISTS `logrocho` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `logrocho`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bares`
--

CREATE TABLE `bares` (
  `Cod_bar` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Localizacion` varchar(100) NOT NULL,
  `Puntuacion` int(11) NOT NULL,
  `Descripcion` text NOT NULL,
  `Longitud` double NOT NULL,
  `Latitud` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `bares`
--

INSERT INTO `bares` (`Cod_bar`, `Nombre`, `Localizacion`, `Puntuacion`, `Descripcion`, `Longitud`, `Latitud`) VALUES
(1, 'Bar Achuri', 'Calle del Laurel, 26001 Logroño, La Rioja', 3, 'Tenemos pollo, chuletas, chorizo y pinchos muy ricos. Hechos al estilo artesanal, como lo hacia la abuela abadia. Todo hecho al horno di pietra. Recetas con siglos de historia, comidas exquisitas, manjares abominables que te dejaran los ojos como pla\r\n', 42.465667724609375, -2.448188304901123),
(2, 'EntreTapas 941', 'Calle del Laurel, 25, 26001 Logroño, La Rioja', 0, 'Tenemos chuletas, chuletitas, chuletones, chorizos, chorizitos y chorizones.\r\n', 42.46571959891992, -2.448568874681389),
(3, 'Taberna del Tío Blas La Laurel', 'Calle Gran Via, 45, 26005 Logroño, La Rioja', 2, 'Barra de pintxos y tapas creativas en rincón con toneles y paredes de ladrillo con servicio a domicilio.\n', 42.46566390991211, -2.447725534439087),
(4, 'Bar Lorenzo \"Tio Agus\"', 'Tr.ª de Laurel, 4, 26001 Logroño, La Rioja', 5, 'Tenemos carne de yeti asada con especias indias, también tenemos helado de nieve y palos de abeto crujientes.\n', 42.46586608886719, -2.4491775035858154),
(5, 'La Esquina del Laurel', 'Calle Bretón de los Herreros, 46, bajo, 26001 Logroño, La Rioja', 0, 'Tenemos botellas de agua de manantial del Himalaya y muslitos de gaviota.\n', 42.46553421020508, -2.4490420818328857),
(6, 'Torrecilla', 'Calle del Laurel, 15, 26001 Logroño, La Rioja', 4, 'Tenemos muslitos de hipopotamo con acompañamiento de trompa de elefante.\n', 42.465667724609375, -2.448284149169922),
(7, 'Gar Gonich', 'Calle del Laurel, 16, 26001 Logroño, La Rioja', 3, 'Tenemos vino de soto de cameros y rodaballo del mar azul salado.\n', 42.465721130371094, -2.4485416412353516),
(8, 'JUAN Y PINCHAME', 'Calle del Laurel, 9, 26001 Logroño, La Rioja', 2, 'tenemos filetes de ternera con jamon y pimientos del piquillo\n', 42.465660095214844, -2.4481379985809326),
(9, 'Bar Ángel', ' Calle del Laurel, 12, 26001 Logroño, La Rioja', 0, 'Tenemos sanjacobos de chopez, chorizo con queso y jamonyork\n', 42.465694427490234, -2.4482052326202393),
(10, 'BAR DONOSTI', 'Calle del Laurel, 22, 26001 Logroño, La Rioja', 3, 'Tenemos carpacho de ternera con especias especiales.\n', 42.465633392333984, -2.4482264518737793),
(11, 'La Rúa del Laurel', 'Calle del Laurel, 3, 26001 Logroño, La Rioja', 0, 'TEnemos pez a la brasa con mantequilla de cacahuete\n', 42.46574020385742, -2.4478862285614014);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes_bar`
--

CREATE TABLE `imagenes_bar` (
  `Cod_img_bar` int(11) NOT NULL,
  `ruta` varchar(255) NOT NULL,
  `Fk_bar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `imagenes_bar`
--

INSERT INTO `imagenes_bar` (`Cod_img_bar`, `ruta`, `Fk_bar`) VALUES
(1, 'http://localhost/dwes/PruebaProyecto/View/img/img_bar/1/BARjpg.jpg', 1),
(2, 'http://localhost/dwes/PruebaProyecto/View/img/img_bar/1/bar2jpg.jpg', 1),
(3, 'http://localhost/dwes/PruebaProyecto/View/img/img_bar/1/lista_bar_2021_paradise-680x447.jpg', 1),
(4, 'http://localhost/dwes/PruebaProyecto/View/img/img_bar/2/lista_bar_2021_paradise-680x447.jpg', 2),
(5, 'http://localhost/dwes/PruebaProyecto/View/img/img_bar/2/bar2jpg.jpg', 2),
(6, 'http://localhost/dwes/PruebaProyecto/View/img/img_bar/2/BARjpg.jpg', 2),
(7, 'http://localhost/dwes/PruebaProyecto/View/img/img_bar/3/BARjpg.jpg', 3),
(8, 'http://localhost/dwes/PruebaProyecto/View/img/img_bar/3/lista_bar_2021_paradise-680x447.jpg', 3),
(9, 'http://localhost/dwes/PruebaProyecto/View/img/img_bar/3/bar2jpg.jpg', 3),
(10, 'http://localhost/dwes/PruebaProyecto/View/img/img_bar/4/bar2jpg.jpg', 4),
(11, 'http://localhost/dwes/PruebaProyecto/View/img/img_bar/4/BARjpg.jpg', 4),
(12, 'http://localhost/dwes/PruebaProyecto/View/img/img_bar/4/lista_bar_2021_paradise-680x447.jpg', 4),
(13, 'http://localhost/dwes/PruebaProyecto/View/img/img_bar/5/bar2jpg.jpg', 5),
(14, 'http://localhost/dwes/PruebaProyecto/View/img/img_bar/5/BARjpg.jpg', 5),
(15, 'http://localhost/dwes/PruebaProyecto/View/img/img_bar/5/lista_bar_2021_paradise-680x447.jpg', 5),
(16, 'http://localhost/dwes/PruebaProyecto/View/img/img_bar/6/bar2jpg.jpg', 6),
(17, 'http://localhost/dwes/PruebaProyecto/View/img/img_bar/6/BARjpg.jpg', 6),
(18, 'http://localhost/dwes/PruebaProyecto/View/img/img_bar/6/lista_bar_2021_paradise-680x447.jpg', 6),
(19, 'http://localhost/dwes/PruebaProyecto/View/img/img_bar/7/lista_bar_2021_paradise-680x447.jpg', 7),
(20, 'http://localhost/dwes/PruebaProyecto/View/img/img_bar/7/BARjpg.jpg', 7),
(21, 'http://localhost/dwes/PruebaProyecto/View/img/img_bar/7/BARjpg.jpg', 7),
(22, 'http://localhost/dwes/PruebaProyecto/View/img/img_bar/8/BARjpg.jpg', 8),
(23, 'http://localhost/dwes/PruebaProyecto/View/img/img_bar/8/lista_bar_2021_paradise-680x447.jpg', 8),
(24, 'http://localhost/dwes/PruebaProyecto/View/img/img_bar/8/bar2jpg.jpg', 8),
(25, 'http://localhost/dwes/PruebaProyecto/View/img/img_bar/9/bar2jpg.jpg', 9),
(26, 'http://localhost/dwes/PruebaProyecto/View/img/img_bar/9/BARjpg.jpg', 9),
(27, 'http://localhost/dwes/PruebaProyecto/View/img/img_bar/9/lista_bar_2021_paradise-680x447.jpg', 9),
(28, 'http://localhost/dwes/PruebaProyecto/View/img/img_bar/10/lista_bar_2021_paradise-680x447.jpg', 10),
(29, 'http://localhost/dwes/PruebaProyecto/View/img/img_bar/10/BARjpg.jpg', 10),
(30, 'http://localhost/dwes/PruebaProyecto/View/img/img_bar/11/BARjpg.jpg', 11),
(31, 'http://localhost/dwes/PruebaProyecto/View/img/img_bar/11/lista_bar_2021_paradise-680x447.jpg', 11),
(32, 'http://localhost/dwes/PruebaProyecto/View/img/img_bar/11/bar2jpg.jpg', 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes_pincho`
--

CREATE TABLE `imagenes_pincho` (
  `Cod_img_pincho` int(11) NOT NULL,
  `ruta` varchar(255) NOT NULL,
  `Fk_pincho` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `imagenes_pincho`
--

INSERT INTO `imagenes_pincho` (`Cod_img_pincho`, `ruta`, `Fk_pincho`) VALUES
(1, 'http://localhost/dwes/PruebaProyecto/View/img/img_pincho/1/pincho3.jpg', 1),
(2, 'http://localhost/dwes/PruebaProyecto/View/img/img_pincho/1/pincho2.jpg', 1),
(3, 'http://localhost/dwes/PruebaProyecto/View/img/img_pincho/1/pincho1.jpg', 1),
(4, 'http://localhost/dwes/PruebaProyecto/View/img/img_pincho/2/pincho2.jpg', 2),
(5, 'http://localhost/dwes/PruebaProyecto/View/img/img_pincho/2/pincho3.jpg', 2),
(6, 'http://localhost/dwes/PruebaProyecto/View/img/img_pincho/2/pincho1.jpg', 2),
(7, 'http://localhost/dwes/PruebaProyecto/View/img/img_pincho/3/pincho3.jpg', 3),
(8, 'http://localhost/dwes/PruebaProyecto/View/img/img_pincho/3/pincho2.jpg', 3),
(9, 'http://localhost/dwes/PruebaProyecto/View/img/img_pincho/3/pincho1.jpg', 3),
(10, 'http://localhost/dwes/PruebaProyecto/View/img/img_pincho/4/pincho3.jpg', 4),
(11, 'http://localhost/dwes/PruebaProyecto/View/img/img_pincho/4/pincho1.jpg', 4),
(12, 'http://localhost/dwes/PruebaProyecto/View/img/img_pincho/4/pincho2.jpg', 4),
(13, 'http://localhost/dwes/PruebaProyecto/View/img/img_pincho/5/pincho1.jpg', 5),
(14, 'http://localhost/dwes/PruebaProyecto/View/img/img_pincho/5/pincho2.jpg', 5),
(15, 'http://localhost/dwes/PruebaProyecto/View/img/img_pincho/5/pincho3.jpg', 5),
(16, 'http://localhost/dwes/PruebaProyecto/View/img/img_pincho/6/pincho1.jpg', 6),
(17, 'http://localhost/dwes/PruebaProyecto/View/img/img_pincho/6/pincho3.jpg', 6),
(18, 'http://localhost/dwes/PruebaProyecto/View/img/img_pincho/6/pincho2.jpg', 6),
(19, 'http://localhost/dwes/PruebaProyecto/View/img/img_pincho/7/pincho1.jpg', 7),
(20, 'http://localhost/dwes/PruebaProyecto/View/img/img_pincho/7/pincho3.jpg', 7),
(21, 'http://localhost/dwes/PruebaProyecto/View/img/img_pincho/7/pincho2.jpg', 7),
(22, 'http://localhost/dwes/PruebaProyecto/View/img/img_pincho/8/pincho3.jpg', 8),
(23, 'http://localhost/dwes/PruebaProyecto/View/img/img_pincho/8/pincho1.jpg', 8),
(24, 'http://localhost/dwes/PruebaProyecto/View/img/img_pincho/8/pincho2.jpg', 8),
(25, 'http://localhost/dwes/PruebaProyecto/View/img/img_pincho/9/pincho3.jpg', 9),
(26, 'http://localhost/dwes/PruebaProyecto/View/img/img_pincho/9/pincho2.jpg', 9),
(27, 'http://localhost/dwes/PruebaProyecto/View/img/img_pincho/9/pincho1.jpg', 9),
(28, 'http://localhost/dwes/PruebaProyecto/View/img/img_pincho/10/pincho3.jpg', 10),
(29, 'http://localhost/dwes/PruebaProyecto/View/img/img_pincho/10/pincho2.jpg', 10),
(30, 'http://localhost/dwes/PruebaProyecto/View/img/img_pincho/10/pincho1.jpg', 10),
(31, 'http://localhost/dwes/PruebaProyecto/View/img/img_pincho/11/pincho3.jpg', 11),
(32, 'http://localhost/dwes/PruebaProyecto/View/img/img_pincho/11/pincho1.jpg', 11),
(33, 'http://localhost/dwes/PruebaProyecto/View/img/img_pincho/11/pincho2.jpg', 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes_usuario`
--

CREATE TABLE `imagenes_usuario` (
  `Cod_img_usuario` int(11) NOT NULL,
  `ruta` varchar(255) NOT NULL,
  `Fk_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `imagenes_usuario`
--

INSERT INTO `imagenes_usuario` (`Cod_img_usuario`, `ruta`, `Fk_usuario`) VALUES
(3, 'http://localhost/dwes/PruebaProyecto/View/img/img_usuario/5/yeti.jpg', 5),
(4, 'http://localhost/dwes/PruebaProyecto/View/img/img_usuario/7/yeti.jpg', 7),
(5, 'http://localhost/dwes/PruebaProyecto/View/img/img_usuario/4/yeti.jpg', 4),
(7, 'http://localhost/dwes/PruebaProyecto/View/img/img_usuario/3/istockphoto-540720716-612x612.jpg', 3),
(8, 'http://localhost/dwes/PruebaProyecto/View/img/img_usuario/2/persebe.jpg', 2),
(10, 'http://localhost/dwes/PruebaProyecto/View/img/img_usuario/13/Guildwars2-02-1920x1080.jpg', 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `likes`
--

CREATE TABLE `likes` (
  `Cod_like` int(11) NOT NULL,
  `Fk_reseña` int(11) NOT NULL,
  `Fk_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `likes`
--

INSERT INTO `likes` (`Cod_like`, `Fk_reseña`, `Fk_usuario`) VALUES
(1, 1, 2),
(2, 1, 5),
(3, 2, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pinchos`
--

CREATE TABLE `pinchos` (
  `Cod_pincho` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Descripcion` text NOT NULL,
  `Fk_bar` int(11) NOT NULL,
  `Puntuacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pinchos`
--

INSERT INTO `pinchos` (`Cod_pincho`, `Nombre`, `Descripcion`, `Fk_bar`, `Puntuacion`) VALUES
(1, 'pincho de tortilla', 'Delicioso pincho de tortilla con patatas. Muh rico.', 1, 5),
(2, 'Champiñones', 'Champiñones silvestres, del la huerta del moncalvillo', 1, 4),
(3, 'Anchos', 'Anchoilla con pimienticos verdes', 3, 2),
(4, 'Coquretas', 'Croquetas de jamon iberico', 6, 4),
(5, 'Chipirones en su tinta', 'Deliciosos chipirones en su titnta con alioli', 10, 4),
(6, 'asadurilla', 'asadurilla  de cerdo con pimientos', 8, 2),
(7, 'Merluza', 'Merluza en su salsa', 7, 3),
(8, 'Rodaballo', 'Rodaballo del mar ', 4, 5),
(9, 'Chuleton', 'chuleta grande', 1, 1),
(10, 'Chuletillas', 'chuletillas de cordero', 10, 2),
(11, 'Corazon de pollo', 'pincho moruno de corazon de pollo ', 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reseña`
--

CREATE TABLE `reseña` (
  `Cod_reseña` int(11) NOT NULL,
  `Mensaje` text NOT NULL,
  `Valoracion` int(11) NOT NULL,
  `Fk_pinchos` int(11) NOT NULL,
  `Fk_usuarios` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `reseña`
--

INSERT INTO `reseña` (`Cod_reseña`, `Mensaje`, `Valoracion`, `Fk_pinchos`, `Fk_usuarios`) VALUES
(1, 'Muy ricas las anchoillas', 5, 3, 3),
(2, 'Estaba bueno, pero al final no', 4, 8, 4),
(5, 'El chuleton estaba muy rico y el servicio ha sido estupendo', 7, 9, 2),
(6, 'Estos champiñones parece que los ha hecho mi hijo de 3 años', 2, 2, 2),
(8, 'Muy ricos los percebes', 6, 3, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `Cod_usuario` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Apellido` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Contraseña` varchar(50) NOT NULL,
  `Rol` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Cod_usuario`, `Nombre`, `Apellido`, `Email`, `Contraseña`, `Rol`) VALUES
(2, 'admin', 'admin', 'admin@admin.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin'),
(3, 'Nikolas', 'Gil', 'ngil@gmail.com', '7ceb7ce77a479a91e2e8a36442956cd3a0f262ab', 'Usuario'),
(4, 'Sandra', 'Garcia', 'sgarcia@gmail.com', '7ac72a26f5b1265cf57c01d40f91e4997f5868df', 'Admin'),
(5, 'Gabriel', 'Fernandez', 'gfernandez@unu.com', '308c278ec5603f7458b2d20d0aa719ee6bd52e2c', 'Estado'),
(6, 'javier', 'marin', 'jmarin@gmail.com', '560cd08a1bf4e5054467345c871bb06fe8a6d006', 'admin'),
(7, 'iker', 'abadia', 'iker@gmail.com', 'b4914600112ba18af7798b6c1a1363728ae1d96f', 'Admin'),
(12, 'pepe', 'garsia', 'pepegarsia@gmail.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', ''),
(13, 'pocholas', 'pocholas', 'pocholas@pocholas.com', '0a04ee6cd990e27fa0859afe5dfb7a2093842011', 'Usuario');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bares`
--
ALTER TABLE `bares`
  ADD PRIMARY KEY (`Cod_bar`);

--
-- Indices de la tabla `imagenes_bar`
--
ALTER TABLE `imagenes_bar`
  ADD PRIMARY KEY (`Cod_img_bar`),
  ADD KEY `Fk_bar` (`Fk_bar`);

--
-- Indices de la tabla `imagenes_pincho`
--
ALTER TABLE `imagenes_pincho`
  ADD PRIMARY KEY (`Cod_img_pincho`),
  ADD KEY `Fk_pincho` (`Fk_pincho`);

--
-- Indices de la tabla `imagenes_usuario`
--
ALTER TABLE `imagenes_usuario`
  ADD PRIMARY KEY (`Cod_img_usuario`),
  ADD KEY `Fk_usuario` (`Fk_usuario`);

--
-- Indices de la tabla `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`Cod_like`),
  ADD KEY `Fk_reseña` (`Fk_reseña`),
  ADD KEY `Fk_usuario` (`Fk_usuario`);

--
-- Indices de la tabla `pinchos`
--
ALTER TABLE `pinchos`
  ADD PRIMARY KEY (`Cod_pincho`),
  ADD KEY `Fk_bar` (`Fk_bar`);

--
-- Indices de la tabla `reseña`
--
ALTER TABLE `reseña`
  ADD PRIMARY KEY (`Cod_reseña`),
  ADD KEY `Fk_pinchos` (`Fk_pinchos`),
  ADD KEY `Fk_usuarios` (`Fk_usuarios`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`Cod_usuario`),
  ADD UNIQUE KEY `email` (`Email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bares`
--
ALTER TABLE `bares`
  MODIFY `Cod_bar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `imagenes_bar`
--
ALTER TABLE `imagenes_bar`
  MODIFY `Cod_img_bar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT de la tabla `imagenes_pincho`
--
ALTER TABLE `imagenes_pincho`
  MODIFY `Cod_img_pincho` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `imagenes_usuario`
--
ALTER TABLE `imagenes_usuario`
  MODIFY `Cod_img_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `likes`
--
ALTER TABLE `likes`
  MODIFY `Cod_like` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `pinchos`
--
ALTER TABLE `pinchos`
  MODIFY `Cod_pincho` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `reseña`
--
ALTER TABLE `reseña`
  MODIFY `Cod_reseña` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `Cod_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `imagenes_bar`
--
ALTER TABLE `imagenes_bar`
  ADD CONSTRAINT `imagenes_bar_ibfk_1` FOREIGN KEY (`Fk_bar`) REFERENCES `bares` (`Cod_bar`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `imagenes_pincho`
--
ALTER TABLE `imagenes_pincho`
  ADD CONSTRAINT `imagenes_pincho_ibfk_1` FOREIGN KEY (`Fk_pincho`) REFERENCES `pinchos` (`Cod_pincho`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `imagenes_usuario`
--
ALTER TABLE `imagenes_usuario`
  ADD CONSTRAINT `imagenes_usuario_ibfk_1` FOREIGN KEY (`Fk_usuario`) REFERENCES `usuarios` (`Cod_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `Fk_reseña` FOREIGN KEY (`Fk_reseña`) REFERENCES `reseña` (`Cod_reseña`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Fk_usuario` FOREIGN KEY (`Fk_usuario`) REFERENCES `usuarios` (`Cod_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pinchos`
--
ALTER TABLE `pinchos`
  ADD CONSTRAINT `pinchos_ibfk_1` FOREIGN KEY (`Fk_bar`) REFERENCES `bares` (`Cod_bar`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `reseña`
--
ALTER TABLE `reseña`
  ADD CONSTRAINT `Fk_pinchos` FOREIGN KEY (`Fk_pinchos`) REFERENCES `pinchos` (`Cod_pincho`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Fk_usuarios` FOREIGN KEY (`Fk_usuarios`) REFERENCES `usuarios` (`Cod_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
