-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-01-2018 a las 13:46:42
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `busseatsmanager`
--
CREATE DATABASE IF NOT EXISTS `busseatsmanager` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `busseatsmanager`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `destinations`
--

CREATE TABLE `destinations` (
  `CITY` varchar(30) NOT NULL,
  `TOTALSEATS` int(11) NOT NULL,
  `AVAILABLESEATS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `destinations`
--

INSERT INTO `destinations` (`CITY`, `TOTALSEATS`, `AVAILABLESEATS`) VALUES
('Alicante', 28, 28),
('Barcelona', 29, 29),
('Burgos', 30, 30),
('Leon', 31, 31),
('Madrid', 32, 32),
('Salamanca', 33, 33);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `occupiedseats`
--

CREATE TABLE `occupiedseats` (
  `CITY` varchar(30) NOT NULL,
  `SEATNO` int(11) NOT NULL,
  `NIF` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `destinations`
--
ALTER TABLE `destinations`
  ADD PRIMARY KEY (`CITY`);

--
-- Indices de la tabla `occupiedseats`
--
ALTER TABLE `occupiedseats`
  ADD PRIMARY KEY (`CITY`,`SEATNO`);
--
-- Base de datos: `bycardb`
--
CREATE DATABASE IF NOT EXISTS `bycardb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `bycardb`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `idViaje` int(11) NOT NULL,
  `idComen` int(11) NOT NULL,
  `comentario` varchar(140) CHARACTER SET latin1 NOT NULL,
  `puntuacion` int(11) NOT NULL,
  `conductor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`idViaje`, `idComen`, `comentario`, `puntuacion`, `conductor`) VALUES
(115, 1, ' Eres muy buen conductor', 4, 10),
(115, 2, ' Viaje excelente!', 5, 10),
(119, 3, ' Viaje 5 estrellas', 5, 10),
(119, 4, ' Genial', 5, 10),
(119, 5, ' En mitad del viaje me invito a unas caÃ±as', 5, 10),
(115, 6, 'Un poco aburrido', 1, 10),
(122, 7, ' Viaje genial!', 5, 21);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE `mensajes` (
  `origen` int(11) NOT NULL,
  `destino` int(11) NOT NULL,
  `contenido` varchar(140) CHARACTER SET latin1 NOT NULL,
  `idMensaje` varchar(60) CHARACTER SET latin1 NOT NULL,
  `horaMensaje` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `mensajes`
--

INSERT INTO `mensajes` (`origen`, `destino`, `contenido`, `idMensaje`, `horaMensaje`) VALUES
(3, 3, 'LOOOL', '346dcfa4174420e716fee969f9ffc4fb20620f99', '2017-06-12 23:14:35'),
(3, 3, 'Eso es raro', '5e47a008081dce877c876a65cbed14ac49f68fb6', '2017-06-12 23:14:26'),
(3, 3, 'Hola', '818936f513df936e08529334b45f12c182228e4d', '2017-06-12 23:14:21'),
(3, 3, 'Hola sara', '97165458bd9be7d01934660782c82d92f546e45a', '2017-06-13 00:57:26'),
(3, 10, 'Hola conductor', '445634464523hgref45e', '2017-06-14 09:28:35'),
(3, 10, 'Me llevas al parque?', '5cc26c3ab25659f9547bda41f8824cd24a884864', '2017-06-13 00:58:15'),
(3, 15, 'A que hora me puedes pasar a recoger?', '679494977910f8e952b8e3fda8e78579e96f043d', '2017-06-23 17:44:41'),
(3, 15, 'Hola luis!', '9e5ac879a49233f7ad96e624b8abbe5fd74c16c9', '2017-06-13 00:01:57'),
(10, 3, 'sdfasdf', '57b234d513929c886112029a551c0532c2b25f09', '2017-06-12 12:31:43'),
(10, 3, 'sdfasdf', '716a7cb05789a7e48961ff2f5bc6e8eff0d8be53', '2017-06-12 12:31:22'),
(10, 3, 'Hola usuario 3, Como estas?', 'f2f92387a2ec5de9bd0f8c326148305bf551c8a0', '2017-06-12 12:33:52'),
(15, 3, 'hola sara', '6b2b990b5ca285cb8f4c2ad89dea6013704c1ede', '2017-06-13 00:01:26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paradas`
--

CREATE TABLE `paradas` (
  `idViaje` int(11) NOT NULL,
  `ciudadParada` varchar(100) CHARACTER SET latin1 NOT NULL,
  `fechaPaso` datetime NOT NULL,
  `precioParada` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pasajerosviaje`
--

CREATE TABLE `pasajerosviaje` (
  `idViaje` int(11) NOT NULL,
  `idPasajero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pasajerosviaje`
--

INSERT INTO `pasajerosviaje` (`idViaje`, `idPasajero`) VALUES
(115, 3),
(119, 3),
(120, 3),
(120, 15),
(120, 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `flag` int(11) NOT NULL,
  `nombreUsuario` varchar(25) CHARACTER SET latin1 NOT NULL,
  `email` varchar(100) CHARACTER SET latin1 NOT NULL,
  `password` varchar(100) CHARACTER SET latin1 NOT NULL,
  `telefono` varchar(15) CHARACTER SET latin1 NOT NULL,
  `dni` varchar(12) CHARACTER SET latin1 NOT NULL,
  `fotoPath` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `flag`, `nombreUsuario`, `email`, `password`, `telefono`, `dni`, `fotoPath`) VALUES
(3, 0, 'sara', 'sara@gmail.com', 'sara', '12345677', '13123213123', '0'),
(10, 1, 'jesus', 'jesus@mail.com', 'jesus', '1231231', '12312321', '0'),
(14, 2, 'admin', 'adminadmin', 'admin', '00000000', '00000000', '0'),
(15, 0, 'Luis', 'luis@luis.com', 'luis', '677687543', '76545687A', ''),
(16, 0, 'asdfas', 'asdas', 'adfa', 'adfasefd', 'afcszdfc', ''),
(17, 0, 'alba', 'alba@alba', '5647845', '678909876', '67875904J', ''),
(18, 0, 'alba0', 'alba0@alba', 'tyjyrjbyujb', '678909876', '67875904J', ''),
(19, 0, 'jose', 'jose', 'jose', '8957374', '8473839H', ''),
(20, 0, 'pepe', 'pepe@pepe', 'pepe', 'pepe', 'pepe', ''),
(21, 1, 'Conductor', 'cont@gmail.com', 'conductor', '78667986', '76788657S', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `viajes`
--

CREATE TABLE `viajes` (
  `id` int(11) NOT NULL,
  `horaSalida` datetime NOT NULL,
  `horaLlegada` datetime NOT NULL,
  `conductorID` int(11) NOT NULL,
  `nPlazas` int(11) NOT NULL,
  `origen` varchar(100) CHARACTER SET latin1 NOT NULL,
  `destino` varchar(100) CHARACTER SET latin1 NOT NULL,
  `precio` int(11) NOT NULL,
  `cancelado` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `viajes`
--

INSERT INTO `viajes` (`id`, `horaSalida`, `horaLlegada`, `conductorID`, `nPlazas`, `origen`, `destino`, `precio`, `cancelado`) VALUES
(115, '2017-06-09 12:00:00', '0000-00-00 00:00:00', 10, 4, 'Leon', 'Cuenca', 88, 0),
(119, '2017-06-08 12:00:00', '2017-06-08 00:00:00', 10, 5, 'Leon', 'Barcelona', 34, 1),
(120, '2017-06-14 12:00:00', '2017-06-15 01:00:00', 10, 4, 'Roma', 'Napoles', 5, 0),
(121, '2017-06-16 17:00:00', '2017-06-16 05:00:00', 10, 3, 'Alfa', 'Beta', 100, 0),
(122, '2017-06-13 07:00:00', '2017-06-13 11:00:00', 21, 5, 'Leon', 'Ponferrada', 50, 0),
(123, '2017-06-22 12:00:00', '2017-06-22 12:30:00', 21, 4, 'Leon', 'Ponferada', 34, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`idComen`),
  ADD KEY `idViaje` (`idViaje`),
  ADD KEY `conductor` (`conductor`);

--
-- Indices de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`origen`,`destino`,`idMensaje`),
  ADD KEY `destino` (`destino`);

--
-- Indices de la tabla `paradas`
--
ALTER TABLE `paradas`
  ADD PRIMARY KEY (`idViaje`,`ciudadParada`);

--
-- Indices de la tabla `pasajerosviaje`
--
ALTER TABLE `pasajerosviaje`
  ADD PRIMARY KEY (`idViaje`,`idPasajero`),
  ADD KEY `idPasajero` (`idPasajero`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `viajes`
--
ALTER TABLE `viajes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `conductorID` (`conductorID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `idComen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT de la tabla `viajes`
--
ALTER TABLE `viajes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`idViaje`) REFERENCES `viajes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comentarios_ibfk_2` FOREIGN KEY (`conductor`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD CONSTRAINT `Mensajes_ibfk_1` FOREIGN KEY (`origen`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Mensajes_ibfk_2` FOREIGN KEY (`destino`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `paradas`
--
ALTER TABLE `paradas`
  ADD CONSTRAINT `Paradas_ibfk_1` FOREIGN KEY (`idViaje`) REFERENCES `viajes` (`id`);

--
-- Filtros para la tabla `pasajerosviaje`
--
ALTER TABLE `pasajerosviaje`
  ADD CONSTRAINT `PasajerosViaje_ibfk_1` FOREIGN KEY (`idPasajero`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `PasajerosViaje_ibfk_2` FOREIGN KEY (`idViaje`) REFERENCES `viajes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `viajes`
--
ALTER TABLE `viajes`
  ADD CONSTRAINT `Viajes_ibfk_1` FOREIGN KEY (`conductorID`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
--
-- Base de datos: `cutdb`
--
CREATE DATABASE IF NOT EXISTS `cutdb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `cutdb`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clients`
--

CREATE TABLE `clients` (
  `username` varchar(20) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clients`
--

INSERT INTO `clients` (`username`, `password`, `email`) VALUES
('asd', 'asd', 'asd'),
('Juan', 'juanito', 'juan@juan'),
('manuel', 'abc', 'manuel.fidalgo'),
('pepe', 'pepe', 'pepe@pepe.com'),
('pepe_1', 'pepe', 'pepe@pepe.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `commens`
--

CREATE TABLE `commens` (
  `commerceUsername` varchar(30) NOT NULL,
  `clientUsername` varchar(30) NOT NULL,
  `value` int(11) NOT NULL,
  `text` varchar(140) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `commens`
--

INSERT INTO `commens` (`commerceUsername`, `clientUsername`, `value`, `text`, `id`) VALUES
('barber10', 'Juan', 4, 'Es una mu buena peluqueria bla bla bla', 1),
('barber10', 'Juan', 4, 'Es una mu buena peluqueria bla bla bla', 2),
('barber10', 'Juan', 5, 'PELUQUERIA INCREIBLE', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `commerces`
--

CREATE TABLE `commerces` (
  `username` varchar(20) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `address` varchar(200) NOT NULL,
  `CIF` varchar(12) NOT NULL,
  `comercialname` varchar(35) NOT NULL,
  `city` varchar(30) NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `commerces`
--

INSERT INTO `commerces` (`username`, `password`, `email`, `address`, `CIF`, `comercialname`, `city`, `description`) VALUES
('barber1', 'sdf', 'sdfsd', 'Las flores, Leon, Spain', '0', 'Abecedario', 'Leon', 'sdfsdf'),
('barber10', 'barber10', 'barberland@extension.es', 'Calle las rosas, 2', '0', 'cut', 'Adra (AlmerÃ­a)', 'Coratamos el pelo de una manera que nunca antes ha hecho jamas, los mejores cortes de pelo'),
('manuel', 'manuel', 'fakest@fake', 'FakeFake st, 123', '1234', 'Fake barber', 'CÃ¡diz', 'This is a fake barber!');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservations`
--

CREATE TABLE `reservations` (
  `clientUsername` varchar(20) NOT NULL,
  `commerceUsername` varchar(20) NOT NULL,
  `date` datetime NOT NULL,
  `serviceName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `reservations`
--

INSERT INTO `reservations` (`clientUsername`, `commerceUsername`, `date`, `serviceName`) VALUES
('Juan', 'barber10', '2018-01-23 08:00:00', 'corte'),
('pepe', 'barber10', '2018-01-23 12:25:00', 'corte');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `services`
--

CREATE TABLE `services` (
  `name` varchar(30) NOT NULL,
  `commerceUsername` varchar(30) NOT NULL,
  `duration` int(11) NOT NULL,
  `price` float NOT NULL,
  `parallel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `services`
--

INSERT INTO `services` (`name`, `commerceUsername`, `duration`, `price`, `parallel`) VALUES
('corte', 'barber10', 25, 15, 1),
('Corte', 'manuel', 20, 22, 3),
('lavado', 'barber10', 27, 11, 3),
('Lavado Pelo', 'manuel', 20, 23, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `timetable`
--

CREATE TABLE `timetable` (
  `commerceUsername` varchar(30) NOT NULL,
  `opentime` time NOT NULL,
  `closetime` time NOT NULL,
  `dayofweekclosed` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `timetable`
--

INSERT INTO `timetable` (`commerceUsername`, `opentime`, `closetime`, `dayofweekclosed`) VALUES
('barber10', '08:00:00', '19:30:00', 6),
('manuel', '10:15:00', '17:15:00', 5);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`username`);

--
-- Indices de la tabla `commens`
--
ALTER TABLE `commens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `commerceUsername` (`commerceUsername`,`clientUsername`),
  ADD KEY `dos` (`clientUsername`);

--
-- Indices de la tabla `commerces`
--
ALTER TABLE `commerces`
  ADD PRIMARY KEY (`username`),
  ADD KEY `city` (`city`),
  ADD KEY `city_2` (`city`),
  ADD KEY `city_3` (`city`);

--
-- Indices de la tabla `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`clientUsername`,`commerceUsername`,`date`),
  ADD KEY `compUsername` (`commerceUsername`),
  ADD KEY `clientUsername` (`clientUsername`),
  ADD KEY `serviceName` (`serviceName`);

--
-- Indices de la tabla `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`name`,`commerceUsername`),
  ADD KEY `commerceUsername` (`commerceUsername`),
  ADD KEY `name` (`name`);

--
-- Indices de la tabla `timetable`
--
ALTER TABLE `timetable`
  ADD PRIMARY KEY (`commerceUsername`),
  ADD KEY `commerceUsername` (`commerceUsername`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `commens`
--
ALTER TABLE `commens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `commens`
--
ALTER TABLE `commens`
  ADD CONSTRAINT `dos` FOREIGN KEY (`clientUsername`) REFERENCES `clients` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `uno` FOREIGN KEY (`commerceUsername`) REFERENCES `commerces` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `Reservations_ibfk_1` FOREIGN KEY (`clientUsername`) REFERENCES `clients` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Reservations_ibfk_2` FOREIGN KEY (`commerceUsername`) REFERENCES `commerces` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_ibfk_1` FOREIGN KEY (`commerceUsername`) REFERENCES `commerces` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `timetable`
--
ALTER TABLE `timetable`
  ADD CONSTRAINT `timetable_ibfk_1` FOREIGN KEY (`commerceUsername`) REFERENCES `commerces` (`username`);
--
-- Base de datos: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(11) NOT NULL,
  `dbase` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `query` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_length` text COLLATE utf8_bin,
  `col_collation` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) COLLATE utf8_bin DEFAULT '',
  `col_default` text COLLATE utf8_bin
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `column_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `settings_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

--
-- Volcado de datos para la tabla `pma__designer_settings`
--

INSERT INTO `pma__designer_settings` (`username`, `settings_data`) VALUES
('root', '{\"angular_direct\":\"direct\",\"relation_lines\":\"true\",\"snap_to_grid\":\"off\"}');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `export_type` varchar(10) COLLATE utf8_bin NOT NULL,
  `template_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `template_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

--
-- Volcado de datos para la tabla `pma__export_templates`
--

INSERT INTO `pma__export_templates` (`id`, `username`, `export_type`, `template_name`, `template_data`) VALUES
(1, 'root', 'table', 'database', '{\"quick_or_custom\":\"quick\",\"what\":\"sql\",\"allrows\":\"1\",\"output_format\":\"sendit\",\"filename_template\":\"@TABLE@\",\"remember_template\":\"on\",\"charset\":\"utf-8\",\"compression\":\"none\",\"maxsize\":\"\",\"codegen_structure_or_data\":\"data\",\"codegen_format\":\"0\",\"csv_separator\":\",\",\"csv_enclosed\":\"\\\"\",\"csv_escaped\":\"\\\"\",\"csv_terminated\":\"AUTO\",\"csv_null\":\"NULL\",\"csv_structure_or_data\":\"data\",\"excel_null\":\"NULL\",\"excel_edition\":\"win\",\"excel_structure_or_data\":\"data\",\"htmlword_structure_or_data\":\"structure_and_data\",\"htmlword_null\":\"NULL\",\"json_structure_or_data\":\"data\",\"latex_caption\":\"something\",\"latex_structure_or_data\":\"structure_and_data\",\"latex_structure_caption\":\"Estructura de la tabla @TABLE@\",\"latex_structure_continued_caption\":\"Estructura de la tabla @TABLE@ (continÃºa)\",\"latex_structure_label\":\"tab:@TABLE@-structure\",\"latex_relation\":\"something\",\"latex_comments\":\"something\",\"latex_mime\":\"something\",\"latex_columns\":\"something\",\"latex_data_caption\":\"Contenido de la tabla @TABLE@\",\"latex_data_continued_caption\":\"Contenido de la tabla @TABLE@ (continÃºa)\",\"latex_data_label\":\"tab:@TABLE@-data\",\"latex_null\":\"\\\\textit{NULL}\",\"mediawiki_structure_or_data\":\"data\",\"mediawiki_caption\":\"something\",\"mediawiki_headers\":\"something\",\"ods_null\":\"NULL\",\"ods_structure_or_data\":\"data\",\"odt_structure_or_data\":\"structure_and_data\",\"odt_relation\":\"something\",\"odt_comments\":\"something\",\"odt_mime\":\"something\",\"odt_columns\":\"something\",\"odt_null\":\"NULL\",\"pdf_report_title\":\"\",\"pdf_structure_or_data\":\"data\",\"phparray_structure_or_data\":\"data\",\"sql_include_comments\":\"something\",\"sql_header_comment\":\"\",\"sql_compatibility\":\"NONE\",\"sql_structure_or_data\":\"structure_and_data\",\"sql_create_table\":\"something\",\"sql_auto_increment\":\"something\",\"sql_create_view\":\"something\",\"sql_create_trigger\":\"something\",\"sql_backquotes\":\"something\",\"sql_type\":\"INSERT\",\"sql_insert_syntax\":\"both\",\"sql_max_query_size\":\"50000\",\"sql_hex_for_binary\":\"something\",\"sql_utc_time\":\"something\",\"texytext_structure_or_data\":\"structure_and_data\",\"texytext_null\":\"NULL\",\"xml_structure_or_data\":\"data\",\"xml_export_events\":\"something\",\"xml_export_functions\":\"something\",\"xml_export_procedures\":\"something\",\"xml_export_tables\":\"something\",\"xml_export_triggers\":\"something\",\"xml_export_views\":\"something\",\"xml_export_contents\":\"something\",\"yaml_structure_or_data\":\"data\",\"\":null,\"lock_tables\":null,\"csv_removeCRLF\":null,\"csv_columns\":null,\"excel_removeCRLF\":null,\"excel_columns\":null,\"htmlword_columns\":null,\"json_pretty_print\":null,\"ods_columns\":null,\"sql_dates\":null,\"sql_relation\":null,\"sql_mime\":null,\"sql_use_transaction\":null,\"sql_disable_fk\":null,\"sql_views_as_tables\":null,\"sql_metadata\":null,\"sql_drop_table\":null,\"sql_if_not_exists\":null,\"sql_procedure_function\":null,\"sql_truncate\":null,\"sql_delayed\":null,\"sql_ignore\":null,\"texytext_columns\":null}');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sqlquery` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Volcado de datos para la tabla `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('root', '[{\"db\":\"cutdb\",\"table\":\"commerces\"},{\"db\":\"cutdb\",\"table\":\"clients\"},{\"db\":\"cutdb\",\"table\":\"timetable\"},{\"db\":\"cutdb\",\"table\":\"commens\"},{\"db\":\"cutdb\",\"table\":\"services\"},{\"db\":\"cutdb\",\"table\":\"reservations\"},{\"db\":\"cutdb\",\"table\":\"cities\"},{\"db\":\"cutdb\",\"table\":\"users\"},{\"db\":\"cutdb\",\"table\":\"companies\"},{\"db\":\"bycardb\",\"table\":\"viajes\"}]');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT '0',
  `x` float UNSIGNED NOT NULL DEFAULT '0',
  `y` float UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `display_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `prefs` text COLLATE utf8_bin NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

--
-- Volcado de datos para la tabla `pma__table_uiprefs`
--

INSERT INTO `pma__table_uiprefs` (`username`, `db_name`, `table_name`, `prefs`, `last_update`) VALUES
('root', 'busseatsmanager', 'destinations', '{\"sorted_col\":\"`destinations`.`TOTALSEATS` ASC\"}', '2017-05-13 14:00:20'),
('root', 'cutdb', 'reservations', '{\"sorted_col\":\"`reservations`.`clientUsername` ASC\"}', '2018-01-21 14:35:46'),
('root', 'database', 'comentarios', '{\"sorted_col\":\"`comentarios`.`conductor` ASC\"}', '2017-06-09 15:36:16'),
('root', 'database', 'mensajes', '{\"sorted_col\":\"`mensajes`.`horaMensaje`  ASC\"}', '2017-06-08 10:52:28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text COLLATE utf8_bin NOT NULL,
  `schema_sql` text COLLATE utf8_bin,
  `data_sql` longtext COLLATE utf8_bin,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') COLLATE utf8_bin DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `config_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Volcado de datos para la tabla `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2017-05-11 18:24:12', '{\"lang\":\"es\",\"collation_connection\":\"utf8mb4_unicode_ci\"}');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL,
  `tab` varchar(64) COLLATE utf8_bin NOT NULL,
  `allowed` enum('Y','N') COLLATE utf8_bin NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indices de la tabla `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indices de la tabla `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indices de la tabla `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indices de la tabla `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indices de la tabla `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indices de la tabla `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indices de la tabla `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indices de la tabla `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indices de la tabla `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indices de la tabla `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indices de la tabla `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indices de la tabla `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indices de la tabla `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indices de la tabla `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indices de la tabla `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indices de la tabla `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indices de la tabla `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;--
-- Base de datos: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
