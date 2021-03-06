-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-02-2020 a las 22:50:39
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `inventory`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `area`
--

CREATE TABLE `area` (
  `id_area` int(11) NOT NULL,
  `nombre_area` varchar(45) DEFAULT NULL,
  `estado` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `area`
--

INSERT INTO `area` (`id_area`, `nombre_area`, `estado`) VALUES
(1, 'N/A', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignar`
--

CREATE TABLE `asignar` (
  `id_asignar` int(11) NOT NULL,
  `fecha_asignacion` date NOT NULL,
  `fkID_tipo_movimiento` int(11) NOT NULL,
  `fkID_persona_entrega` int(11) NOT NULL,
  `fkID_persona_recibe` int(11) NOT NULL,
  `fkID_equipo` int(11) NOT NULL,
  `fkID_proyecto` int(11) NOT NULL,
  `observacion` varchar(300) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `asignar`
--

INSERT INTO `asignar` (`id_asignar`, `fecha_asignacion`, `fkID_tipo_movimiento`, `fkID_persona_entrega`, `fkID_persona_recibe`, `fkID_equipo`, `fkID_proyecto`, `observacion`, `estado`) VALUES
(1, '2020-01-31', 1, 1, 16, 1, 10, 'prueba', 1),
(2, '2020-02-12', 1, 1, 10, 3, 10, '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

CREATE TABLE `cargo` (
  `id_cargo` int(11) NOT NULL,
  `nombre_cargo` varchar(45) DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`id_cargo`, `nombre_cargo`, `estado`) VALUES
(1, 'ADMINISTRADOR', 1),
(2, 'COORDINADOR', 1),
(3, 'TÉCNICO', 1),
(4, 'GERENCIA', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cetap`
--

CREATE TABLE `cetap` (
  `id_cetap` int(11) NOT NULL,
  `nombre_cetap` varchar(45) DEFAULT NULL,
  `fkID_territorial` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cetap`
--

INSERT INTO `cetap` (`id_cetap`, `nombre_cetap`, `fkID_territorial`) VALUES
(1, 'N/A', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo`
--

CREATE TABLE `equipo` (
  `id_equipo` int(11) NOT NULL,
  `serial_equipo` varchar(45) NOT NULL,
  `fkID_tipo_equipo` int(11) NOT NULL,
  `fkID_marca` int(11) NOT NULL,
  `fkID_procesador` int(11) NOT NULL,
  `fkID_estado` int(11) NOT NULL,
  `fkID_modelo` int(11) NOT NULL,
  `observaciones_equipo` longtext NOT NULL COMMENT 'Observaciones del equipo',
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `equipo`
--

INSERT INTO `equipo` (`id_equipo`, `serial_equipo`, `fkID_tipo_equipo`, `fkID_marca`, `fkID_procesador`, `fkID_estado`, `fkID_modelo`, `observaciones_equipo`, `estado`) VALUES
(1, 'PRUEBA4', 1, 1, 6, 1, 1, '', 2),
(2, 'ADS', 1, 2, 6, 1, 1, '', 2),
(3, 'ASDFF', 8, 1, 6, 1, 1, 'OK', 2),
(4, 'asdfasd', 1, 1, 6, 1, 87, '', 1),
(5, 'a', 1, 17, 6, 1, 1, '', 2),
(6, 'PRUEBA', 1, 1, 6, 1, 1, '', 2),
(7, 'PRUEBA2', 1, 1, 6, 1, 1, 'OK', 2),
(8, 'AAA', 1, 1, 6, 1, 1, 'OK', 2),
(9, 'ASDFASDF', 11, 21, 10, 1, 89, 'ASD', 1),
(10, 'ASDFADSF', 1, 1, 15, 1, 1, 'ASD', 1),
(11, 'PRUEBA3', 1, 1, 6, 1, 1, 'OK', 2),
(12, 'PRUEBA1', 2, 2, 7, 1, 2, 'OKS', 1),
(13, 'ASDF', 1, 1, 6, 1, 1, 'OK', 2),
(14, 'DDD', 1, 1, 6, 1, 1, '', 1),
(15, 'AAAA', 1, 1, 6, 1, 1, '', 1),
(16, 'AAAAAS', 2, 2, 7, 1, 2, '', 1),
(17, 'AD', 1, 1, 6, 1, 1, 'OK', 1),
(18, 'DDDD', 2, 2, 7, 1, 2, 'OKIS', 2),
(19, '76THGY', 1, 4, 6, 1, 11, 'PRUEBA', 1),
(20, 'TYGHGF5657', 1, 3, 3, 1, 3, 'PU', 1),
(21, 'PLLU7', 2, 4, 7, 1, 5, '', 1),
(22, 'PESCADO', 1, 3, 2, 1, 4, '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_equipo`
--

CREATE TABLE `estado_equipo` (
  `id_estado_equipo` int(11) NOT NULL,
  `nombre_estado_equipo` varchar(45) DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estado_equipo`
--

INSERT INTO `estado_equipo` (`id_estado_equipo`, `nombre_estado_equipo`, `estado`) VALUES
(1, 'SIN ASIGNAR', 1),
(2, 'ASIGNADO', 1),
(3, 'EN REPARACION', 1),
(4, 'DE BAJA', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historico_equipo`
--

CREATE TABLE `historico_equipo` (
  `id_historico_equipo` int(11) NOT NULL,
  `fecha_historico_equipo` date NOT NULL,
  `fkID_equipo` int(11) NOT NULL,
  `fkID_persona_entrega` int(11) NOT NULL,
  `fkID_persona_recibe` int(11) NOT NULL,
  `fkID_tipo_movimiento` int(11) NOT NULL,
  `url_historico_equipo` varchar(45) DEFAULT NULL,
  `obs_historico_equipo` longtext DEFAULT NULL,
  `conse_historico_equipo` varchar(45) DEFAULT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `historico_equipo`
--

INSERT INTO `historico_equipo` (`id_historico_equipo`, `fecha_historico_equipo`, `fkID_equipo`, `fkID_persona_entrega`, `fkID_persona_recibe`, `fkID_tipo_movimiento`, `url_historico_equipo`, `obs_historico_equipo`, `conse_historico_equipo`, `estado`) VALUES
(1, '2020-01-27', 19, 1, 1, 6, NULL, 'CREACIÓN DE EQUIPO', '-1', 0),
(2, '2020-01-31', 20, 1, 1, 6, NULL, 'CREACIÓN DE EQUIPO', '-1', 0),
(3, '2020-01-31', 21, 1, 1, 6, NULL, 'CREACIÓN DE EQUIPO', '-1', 0),
(4, '2020-02-04', 22, 1, 1, 6, NULL, 'CREACIÓN DE EQUIPO', '-1', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `id_inventario` int(11) NOT NULL,
  `fkID_equipo` int(11) NOT NULL,
  `fkID_persona_a_cargo` int(11) NOT NULL,
  `fkID_area` int(11) NOT NULL,
  `fkID_proyecto` int(11) DEFAULT NULL,
  `fkID_territorial` int(11) DEFAULT NULL,
  `fkID_cetap` int(11) DEFAULT NULL,
  `obs_inventario` longtext DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `inventario`
--

INSERT INTO `inventario` (`id_inventario`, `fkID_equipo`, `fkID_persona_a_cargo`, `fkID_area`, `fkID_proyecto`, `fkID_territorial`, `fkID_cetap`, `obs_inventario`, `estado`) VALUES
(1, 19, 1, 0, 1, NULL, NULL, 'CREACIÓN DE EQUIPO', 1),
(2, 20, 1, 0, 1, NULL, NULL, 'CREACIÓN DE EQUIPO', 1),
(3, 21, 1, 0, 1, NULL, NULL, 'CREACIÓN DE EQUIPO', 1),
(4, 22, 1, 0, NULL, NULL, NULL, 'CREACIÓN DE EQUIPO', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `id_marca` int(11) NOT NULL,
  `nombre_marca` varchar(45) DEFAULT NULL,
  `estado` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`id_marca`, `nombre_marca`, `estado`) VALUES
(1, 'APPLE', 1),
(2, 'ASUS', 1),
(3, 'BENQ', 1),
(4, 'DELL', 1),
(5, 'EPSON', 1),
(6, 'HEWLETT-PACKARD', 1),
(7, 'HITACHI', 1),
(8, 'INFOCUS', 1),
(9, 'IRULU', 1),
(10, 'LENOVO', 1),
(11, 'LENOVO ', 1),
(12, 'LEXMARK', 1),
(13, 'PANASONIC', 1),
(14, 'RICOH', 1),
(15, 'SAMSUNG', 1),
(16, 'SIMPLY', 1),
(17, '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `memoria`
--

CREATE TABLE `memoria` (
  `id_memoria` int(11) NOT NULL,
  `nombre_memoria` varchar(45) DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modelo`
--

CREATE TABLE `modelo` (
  `id_modelo` int(11) NOT NULL,
  `nombre_modelo` varchar(45) DEFAULT NULL,
  `estado` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `modelo`
--

INSERT INTO `modelo` (`id_modelo`, `nombre_modelo`, `estado`) VALUES
(1, '14-AC115LA', 1),
(2, '240 G6', 1),
(3, '240 G7', 1),
(4, '2400MP', 1),
(5, '241 G6', 1),
(6, '242 G6', 1),
(7, '243 G6', 1),
(8, '244 G6', 1),
(9, '245 G6', 1),
(10, '280 G3 SFF BUSINESS PC', 1),
(11, '4210U', 1),
(12, '7000 S2', 1),
(13, 'A555L', 1),
(14, 'B40-70', 1),
(15, 'COMPAQ 4300 SFF', 1),
(16, 'COMPAQ 8200', 1),
(17, 'COMPAQ 8200 ELITE SFF', 1),
(18, 'COMPAQ 8600 ELITE SFF', 1),
(19, 'COMPAQ PRO 4300 SFF', 1),
(20, 'COMPAQ PRO 6300 ', 1),
(21, 'CP-X2521WN', 1),
(22, 'DELL OPTIPLEX 3020', 1),
(23, 'ELITEBOOK 840', 1),
(24, 'EMP-62', 1),
(25, 'EMP7800', 1),
(26, 'EMP-83', 1),
(27, 'EPSON H552A', 1),
(28, 'GALAXY TAB 4', 1),
(29, 'H552A', 1),
(30, 'HP COMPAQ 8100 ELITE SFF', 1),
(31, 'HP COMPAQ PRO 4300', 1),
(32, 'HP COMPAQ PRO 6300', 1),
(33, 'HP LASERJET P3015DN', 1),
(34, 'IMAC', 1),
(35, 'IRULU', 1),
(36, 'LASERJET P3015', 1),
(37, 'LATITUDE 3440', 1),
(38, 'LATITUDE 5490', 1),
(39, 'LEXMARK MS415DN', 1),
(40, 'LEXMARK MS811DN', 1),
(41, 'LP260', 1),
(42, 'MODELO 20392', 1),
(43, 'MODELO 4210U', 1),
(44, 'MS415DN', 1),
(45, 'MS811 DN', 1),
(46, 'MS811DN', 1),
(47, 'MULTIXPRESS M5370LX', 1),
(48, 'MX613ST', 1),
(49, 'NOTEBOOK 14-AN009LA', 1),
(50, 'OPTIPLEX 3020', 1),
(51, 'P3015', 1),
(52, 'P3015 DN', 1),
(53, 'P3015DN', 1),
(54, 'POWER LITE S18', 1),
(55, 'POWERLITE 18+', 1),
(56, 'POWERLITE S+', 1),
(57, 'POWERLITE S+18', 1),
(58, 'POWERLITE S12+', 1),
(59, 'POWERLITE S18+ 3000 LUMENS', 1),
(60, 'PRO 3000 SFF', 1),
(61, 'PRO 6300 ', 1),
(62, 'PRO 6300 SFF', 1),
(63, 'PRO2500 F1 ', 1),
(64, 'PROBOOK 440 G1', 1),
(65, 'PROBOOK 440 G2', 1),
(66, 'PROBOOK 4440S', 1),
(67, 'PROBOOK G2', 1),
(68, 'PRODESK 400 G1 SFF', 1),
(69, 'PRODESK 600 G1 SFF', 1),
(70, 'PROXPRESS M4070FR', 1),
(71, 'PT-LB51U', 1),
(72, 'SCANFLOW 7000S2', 1),
(73, 'SCANJET ENTERPRISE FLOW 7000 S2', 1),
(74, 'SCANJET PRO 2500 F1', 1),
(75, 'T654DN', 1),
(76, 'TABLETS', 1),
(77, 'THINKCENTRE E73', 1),
(78, 'THINKPAD 13', 1),
(79, 'THINKPAD T440', 1),
(80, 'V520S', 1),
(81, 'W2100', 1),
(82, 'X230', 1),
(83, 'X260', 1),
(84, 'YOGA 60046', 1),
(85, '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulo`
--

CREATE TABLE `modulo` (
  `id_modulo` int(11) NOT NULL,
  `nombre_modulo` varchar(45) DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `modulo`
--

INSERT INTO `modulo` (`id_modulo`, `nombre_modulo`, `estado`) VALUES
(1, 'usuarios', 1),
(2, 'equipos', 1),
(3, 'proyectos', 1),
(4, 'asignacion', 1),
(5, 'asignacion por lote', 1),
(6, 'asignacion a tecnicos', 1),
(7, 'asignacion a funcionarios', 1),
(8, 'devolucion', 1),
(9, 'devolucion por lotes', 1),
(10, 'devolucion de tecnico', 1),
(11, 'devolucion de funcionario', 1),
(12, 'informes', 1),
(13, 'administracion empleados', 1),
(14, 'administracion funcionarios', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `id_permisos` int(11) NOT NULL,
  `fkID_cargo` int(11) NOT NULL,
  `fkID_modulo` int(11) NOT NULL,
  `crear` int(11) DEFAULT NULL,
  `editar` int(11) DEFAULT NULL,
  `consultar` int(11) DEFAULT NULL,
  `eliminar` int(11) DEFAULT NULL,
  `ver` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`id_permisos`, `fkID_cargo`, `fkID_modulo`, `crear`, `editar`, `consultar`, `eliminar`, `ver`) VALUES
(1, 1, 1, 1, 1, 1, 1, 1),
(2, 1, 2, 1, 1, 1, 1, 1),
(3, 1, 3, 1, 1, 1, 1, 1),
(4, 1, 4, 1, 1, 1, 1, 1),
(5, 1, 5, 1, 1, 1, 1, 1),
(6, 1, 6, 1, 1, 1, 1, 1),
(7, 1, 7, 1, 1, 1, 1, 1),
(8, 1, 8, 1, 1, 1, 1, 1),
(9, 1, 9, 1, 1, 1, 1, 1),
(10, 1, 10, 1, 1, 1, 1, 1),
(11, 1, 11, 1, 1, 1, 1, 1),
(12, 1, 12, 1, 1, 1, 1, 1),
(13, 1, 13, 1, 1, 1, 1, 1),
(14, 1, 14, 1, 1, 1, 1, 1),
(15, 2, 1, 0, 1, 1, 0, 1),
(16, 2, 2, 0, 1, 1, 0, 1),
(17, 2, 3, 0, 0, 0, 0, 0),
(18, 2, 4, 1, 1, 1, 1, 1),
(19, 2, 5, 0, 0, 0, 0, 0),
(20, 2, 6, 1, 1, 1, 1, 1),
(21, 2, 7, 1, 1, 1, 1, 1),
(22, 2, 8, 1, 1, 1, 1, 1),
(23, 2, 9, 0, 0, 0, 0, 0),
(24, 2, 10, 1, 1, 1, 1, 1),
(25, 2, 11, 1, 1, 1, 1, 1),
(26, 2, 12, 1, 1, 1, 1, 1),
(27, 2, 13, 0, 1, 1, 0, 1),
(28, 2, 14, 1, 1, 1, 1, 1),
(29, 3, 1, 0, 0, 0, 0, 0),
(30, 3, 2, 0, 0, 1, 0, 1),
(31, 3, 3, 0, 0, 0, 0, 0),
(32, 3, 4, 1, 1, 1, 1, 1),
(33, 3, 5, 0, 0, 0, 0, 0),
(34, 3, 6, 0, 0, 0, 0, 0),
(35, 3, 7, 1, 1, 1, 1, 1),
(36, 3, 8, 1, 1, 1, 1, 1),
(37, 3, 9, 0, 0, 0, 0, 0),
(38, 3, 10, 0, 0, 0, 0, 0),
(39, 3, 11, 1, 1, 1, 1, 1),
(40, 3, 12, 0, 0, 0, 0, 0),
(41, 3, 13, 0, 0, 0, 0, 0),
(42, 3, 14, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `id_persona` int(11) NOT NULL,
  `nombres_persona` varchar(45) DEFAULT NULL,
  `apellidos_persona` varchar(45) DEFAULT NULL,
  `documento_persona` varchar(45) DEFAULT NULL,
  `telefono_persona` varchar(45) DEFAULT NULL,
  `celular_persona` varchar(45) DEFAULT NULL,
  `email_persona` varchar(45) DEFAULT NULL,
  `fkID_proyecto` int(11) NOT NULL,
  `fkID_territorial` int(11) DEFAULT NULL,
  `fkID_cetap` int(11) DEFAULT NULL,
  `fkID_cargo` int(11) DEFAULT NULL,
  `fkID_area` int(11) DEFAULT NULL,
  `fkID_tipo_persona` int(11) DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`id_persona`, `nombres_persona`, `apellidos_persona`, `documento_persona`, `telefono_persona`, `celular_persona`, `email_persona`, `fkID_proyecto`, `fkID_territorial`, `fkID_cetap`, `fkID_cargo`, `fkID_area`, `fkID_tipo_persona`, `estado`) VALUES
(1, 'prueba', 'desarrollo', '1098778675', '5677654', '3209086544', 'thatanspk@gmail.com', 1, 1, 1, 1, 1, 1, 1),
(2, 'BARTS', 'SIMPSONS', '101056768', '78665546', '31289076542', 'BARTs@GMAIL.COM', 1, 3, 1, 2, 1, 1, 1),
(3, 'HOMERO ', 'SIMPSON', '65454466', '5433425', '3209086754', 'HOMERO@GMAIL.COM', 1, 2, 1, 2, 1, 1, 1),
(4, 'LUIS', 'HENRIQUE', '98797879789', '65443234', '312245676', 'LUIS@GMAIL.COM', 1, 2, 1, 2, 1, 1, 1),
(5, 'ANA', 'LUZ', '31245617', '76878987', '3108019988', 'LUZ@GMAIL.COM', 1, 2, 1, 2, 1, 1, 1),
(6, 'HJJ', 'JHHJHJ', '122334', 'JHJHJHJ', 'hjhjjhjh', 'HJHJJHJH', 1, 2, 1, 3, 1, 1, 1),
(7, 'HOMERO', 'SIMPSON', '233243', '765332', '3122345432', 'HOMERO@GMAIL.COM', 1, 2, 1, 2, 1, 1, 1),
(9, 'LISSA', 'SIMPSONS', '78889877', '4566554', '312789987', 'LISSA@GMAIL.COM', 1, 2, 1, 2, 1, 1, 1),
(10, 'MIL', 'HOUSE', '765678', '31245678', '312234565', 'HOUSE@GMAIL.COM', 1, 2, 1, 3, 1, 1, 1),
(11, 'CARLOS', 'VELEZ', '54321', '3214566542', '3112345533', 'CARLOS@GMAIL.COM', 1, 2, 1, 2, 1, 1, 1),
(12, 'TERESAS', 'VALVUENA', '123456', '3223455432', '3122234455', 'TER@GMAIL.COM', 1, 2, 1, 4, 1, 1, 1),
(13, 'CARDENAS', 'LUIS', '786768', '34556765', '3120987876', 'JKHKUY@HOTMAIL.COM', 10, 2, 1, 2, 1, 1, 1),
(14, 'CHAVO', 'DEL OCHO', '3455567', '6789878', '3109012056', 'CHAVO@GMAIL.COM', 10, 1, 1, 2, 1, 1, 1),
(15, 'CLEMENTE ', 'RODRIGUEZ', '34567654', '7213454', '3108097665', 'CLEMENTE@GMAIL.COM', 1, 3, 1, 2, 1, 1, 2),
(16, 'CARLOS', 'TRE', '78787878', '78787878', '76533233', 'JHJAJH@GMAIL.COM', 1, 1, 1, 2, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `procesador`
--

CREATE TABLE `procesador` (
  `id_procesador` int(11) NOT NULL,
  `nombre_procesador` varchar(45) DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `procesador`
--

INSERT INTO `procesador` (`id_procesador`, `nombre_procesador`, `estado`) VALUES
(1, 'CORE I5', 1),
(2, 'CORE I6', 1),
(3, 'CORE I7', 1),
(4, 'CORE I8', 1),
(5, 'CORE I9', 1),
(6, 'CORE I10', 1),
(7, 'N/A', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyecto`
--

CREATE TABLE `proyecto` (
  `id_proyecto` int(11) NOT NULL,
  `nombre_proyecto` varchar(45) DEFAULT NULL,
  `estado` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `proyecto`
--

INSERT INTO `proyecto` (`id_proyecto`, `nombre_proyecto`, `estado`) VALUES
(1, 'PRUEBA  COLOMBIANA', 1),
(2, 'proyecto prueba', 2),
(4, 'PRUEBA MAXIMA', 1),
(5, 'PROYECTO SPRINFIELD', 1),
(6, 'PROYECTO MERLANO', 1),
(7, 'PROYECTO HUMO', 1),
(8, 'PROYECO DOS', 1),
(9, 'PRUEBA', 1),
(10, 'PROYECTO A', 1),
(11, 'PRUEBA SABER', 1),
(12, 'PROYECTO OFICINA ', 1),
(13, 'PROYECTO OFICINA 2', 1),
(14, 'PROYECTO OFICINA 3', 1),
(15, 'PROYECTO OFICINA 4', 1),
(16, 'PROYECTO OFICINA 4', 1),
(17, 'PROYECTO 001', 1),
(18, 'PROYECTO 0002', 1),
(19, 'PROYECTO 003', 1),
(20, 'PROYECTO 004', 1),
(21, 'PROYECTO GOKU', 1),
(22, 'PROYECTO VENECIA', 1),
(23, 'PROYECTO SAGA', 1),
(24, 'PROYECTO EXPRESS', 1),
(25, 'PROYECTO PROMO ', 1),
(26, 'PROYECTO MICROMACRO', 1),
(27, 'PROYECTO 121', 1),
(28, 'PROYECTO PRUEBA ', 1),
(29, 'PROYECTO PI', 1),
(30, 'PROYECTO MIA ', 2),
(31, 'PROYECTO MIRAMAR', 1),
(32, 'PROYECTO PRIMI', 1),
(33, 'PROYECTO TURBINA', 2),
(34, 'PROYECTO PILOTO', 1),
(35, 'PROYECTO UNIFORME', 1),
(36, 'PROYECTO LOS SIMPSON', 1),
(37, 'PROYECTO POSTOBON', 1),
(38, 'PROYECTO OK', 1),
(39, 'PROYECTO ZTE', 1),
(40, 'PROYECTO RXT', 1),
(41, 'CARTAGENA', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id_rol` int(11) NOT NULL,
  `nombre_rol` varchar(45) DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_rol`, `nombre_rol`, `estado`) VALUES
(1, 'ADMINISTRADOR', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sistema_operativo`
--

CREATE TABLE `sistema_operativo` (
  `id_sistema_operativo` int(11) NOT NULL,
  `nombre_sistema_operativo` varchar(45) DEFAULT NULL,
  `estado` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `territorial`
--

CREATE TABLE `territorial` (
  `id_territorial` int(11) NOT NULL,
  `nombre_territorial` varchar(45) DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `territorial`
--

INSERT INTO `territorial` (`id_territorial`, `nombre_territorial`, `estado`) VALUES
(1, 'ANTIOQUIA', 1),
(2, 'BARRANQUILLA', 1),
(3, 'BOGOTÁ', 1),
(4, 'CARTAGENA', 1),
(5, 'TUNJA', 1),
(6, 'MANIZALES', 1),
(7, 'POPAYÁN', 1),
(8, 'FUSA', 1),
(9, 'NEIVA', 1),
(10, 'VILLAVICENCIO', 1),
(11, 'PASTO', 1),
(12, 'CÚCUTA', 1),
(13, 'PEREIRA', 1),
(14, 'BUCARAMANGA', 1),
(15, 'IBAGUÉ', 1),
(16, 'CALI', 1),
(17, 'TUMACO', 1),
(18, 'CASANARE', 1),
(19, 'AMAZONAS', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `territorial_proyecto`
--

CREATE TABLE `territorial_proyecto` (
  `id_territorial_proyecto` int(11) NOT NULL,
  `fkID_territorial` int(11) DEFAULT NULL,
  `direccion_territorial` varchar(45) DEFAULT NULL,
  `fkID_proyecto` int(11) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `territorial_proyecto`
--

INSERT INTO `territorial_proyecto` (`id_territorial_proyecto`, `fkID_territorial`, `direccion_territorial`, `fkID_proyecto`, `estado`) VALUES
(2, 4, 'CARRERA', 3, 1),
(3, 4, 'CARRERA 12', 7, 1),
(6, 1, 'CARRERA 17', 10, 1),
(8, 1, 'CARRERA', 11, 1),
(11, 4, 'CARRERA 32', 13, 1),
(12, 3, 'CARRERA', 16, 1),
(13, 1, 'CARRERA 18', 17, 1),
(14, 2, 'CALLE 76', 17, 1),
(15, 5, 'DIAGONAL 26', 17, 1),
(16, 1, 'CALLE 21 34', 19, 1),
(17, 3, 'CARRERA 43 21', 19, 1),
(18, 7, 'TRANSVERSAL 32', 19, 1),
(19, 1, 'TRANSVERSAL', 20, 1),
(20, 3, 'CALLE', 20, 1),
(21, 1, 'CARRERA 45', 21, 1),
(22, 5, 'CARRERA', 22, 1),
(23, 3, 'CUCUNUBA', 22, 1),
(24, 3, 'CUCUNUBA', 22, 1),
(25, 3, 'CUCNUBA', 22, 1),
(26, 3, 'TETERE', 22, 1),
(28, 3, 'YACU', 1, 1),
(29, 7, 'CARRERA', 34, 1),
(30, 8, 'TRANSVERSAL 45', 35, 1),
(31, 4, 'CARRERA', 36, 1),
(32, 7, 'CARRERA', 36, 1),
(33, 8, 'CARRERA', 36, 1),
(36, 6, 'CARRERA', 38, 1),
(37, 4, 'CARRERA', 38, 1),
(38, 3, 'TRANSVERSAL', 38, 1),
(39, 4, 'CARRERA 19', 39, 1),
(40, 3, 'CASI QUE NO', 40, 1),
(41, 17, 'CARRERA', 40, 1),
(42, 1, 'CARRERA 31', 1, 1),
(43, 1, 'CARRERA', 41, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_equipo`
--

CREATE TABLE `tipo_equipo` (
  `id_tipo_equipo` int(11) NOT NULL,
  `nombre_tipo_equipo` varchar(45) DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_equipo`
--

INSERT INTO `tipo_equipo` (`id_tipo_equipo`, `nombre_tipo_equipo`, `estado`) VALUES
(1, 'ESCRITORIO', 1),
(2, 'IMPRESORA', 1),
(3, 'MAC', 1),
(4, 'PORTATIL', 1),
(5, 'SCANNER', 1),
(6, 'TABLET', 1),
(7, 'VIDEO BEAM', 1),
(8, 'OTROS', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_movimiento`
--

CREATE TABLE `tipo_movimiento` (
  `id_tipo_movimiento` int(11) NOT NULL,
  `inicial_tipo_movimiento` varchar(45) DEFAULT NULL,
  `conse_tipo_movimieneto` varchar(45) DEFAULT NULL,
  `nombre_tipo_movimiento` varchar(45) DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_movimiento`
--

INSERT INTO `tipo_movimiento` (`id_tipo_movimiento`, `inicial_tipo_movimiento`, `conse_tipo_movimieneto`, `nombre_tipo_movimiento`, `estado`) VALUES
(1, 'AL', '0', 'ASIGNACION POR LOTES', 1),
(2, 'AT', '0', 'ASIGNACION TERRITORIAL', 1),
(3, 'AE', '0', 'ASIGNACION EMPLEADO (TECNICO)', 1),
(4, 'AF', '0', 'ASIGNACION FUNCIONARIO', 1),
(5, 'DE', '0', 'DEVOLUCIÓN', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_persona`
--

CREATE TABLE `tipo_persona` (
  `id_tipo_persona` int(11) NOT NULL,
  `nombre_tipo_persona` varchar(45) DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_persona`
--

INSERT INTO `tipo_persona` (`id_tipo_persona`, `nombre_tipo_persona`, `estado`) VALUES
(1, 'N/A', 1),
(2, 'CONTRATISTA', 1),
(3, 'PLANTA', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre_usuario` varchar(45) DEFAULT NULL,
  `pass_usuario` varchar(45) DEFAULT NULL,
  `fkID_persona` int(11) NOT NULL,
  `token_password` varchar(200) NOT NULL,
  `password_request` int(11) NOT NULL DEFAULT 0,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre_usuario`, `pass_usuario`, `fkID_persona`, `token_password`, `password_request`, `estado`) VALUES
(1, 'prueba', '8cb2237d0679ca88db6464eac60da96345513964', 1, '', 0, 1),
(48, '233243', 'a70276e7a4e7e28a9801165795770446991c489c', 7, '', 0, 1),
(49, '', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 8, '', 0, 2),
(50, '765678', '398a9ddb4e98f2e388895bb1a92838904a91bd9b', 10, '', 0, 1),
(51, '98797879789', '8e37519a0c9df77f3a668566989d19a92fc5977d', 4, '', 0, 2),
(52, 'carlos', '348162101fc6f7e624681b7400b085eeac6df7bd', 11, '', 0, 1),
(53, '123456', '7c4a8d09ca3762af61e59520943dc26494f8941b', 12, '', 0, 2),
(54, '31245617', '3bf63e4ed728958d11632091971e1d058a7f630a', 5, '', 0, 2),
(57, '65454466', '4b76afddf70aaab6627cfe1946c8f57f3d85917f', 3, '', 0, 1),
(58, '786768', 'bb1e216ccee2d51661791fddf4ba8694f560f6f6', 13, '', 0, 1),
(59, '3455567', 'ff148c3a5a6436a18a54cd86b493abe66765b531', 14, '', 0, 1),
(60, '78787878', 'd94674574abba19a9acb36bba19fed9a80b3d174', 16, '', 0, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`id_area`);

--
-- Indices de la tabla `asignar`
--
ALTER TABLE `asignar`
  ADD PRIMARY KEY (`id_asignar`);

--
-- Indices de la tabla `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`id_cargo`);

--
-- Indices de la tabla `cetap`
--
ALTER TABLE `cetap`
  ADD PRIMARY KEY (`id_cetap`),
  ADD KEY `fkID_territorial_idx` (`fkID_territorial`);

--
-- Indices de la tabla `equipo`
--
ALTER TABLE `equipo`
  ADD PRIMARY KEY (`id_equipo`),
  ADD KEY `fkID_marca_idx` (`fkID_marca`),
  ADD KEY `fkID_estado_idx` (`fkID_estado`),
  ADD KEY `fkID_procesador_idx` (`fkID_procesador`),
  ADD KEY `fkID_tipo_equipo_idx` (`fkID_tipo_equipo`),
  ADD KEY `fkID_modelo_idx` (`fkID_modelo`);

--
-- Indices de la tabla `estado_equipo`
--
ALTER TABLE `estado_equipo`
  ADD PRIMARY KEY (`id_estado_equipo`);

--
-- Indices de la tabla `historico_equipo`
--
ALTER TABLE `historico_equipo`
  ADD PRIMARY KEY (`id_historico_equipo`,`fecha_historico_equipo`),
  ADD KEY `fkID_equipo_idx` (`fkID_equipo`),
  ADD KEY `fkID_persona_entrega_idx` (`fkID_persona_entrega`),
  ADD KEY `fkID_persona_recibe_idx` (`fkID_persona_recibe`),
  ADD KEY `fkID_tipo_movimiento_idx` (`fkID_tipo_movimiento`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`id_inventario`),
  ADD KEY `fkID_equipo_idx` (`fkID_equipo`),
  ADD KEY `fkID_persona_a_cargo_idx` (`fkID_persona_a_cargo`),
  ADD KEY `fkID_proyecto_idx` (`fkID_proyecto`),
  ADD KEY `fkID_territorial_idx` (`fkID_territorial`),
  ADD KEY `fkID_cetap_idx` (`fkID_cetap`),
  ADD KEY `fkID_area_idx` (`fkID_area`);

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`id_marca`);

--
-- Indices de la tabla `memoria`
--
ALTER TABLE `memoria`
  ADD PRIMARY KEY (`id_memoria`);

--
-- Indices de la tabla `modelo`
--
ALTER TABLE `modelo`
  ADD PRIMARY KEY (`id_modelo`);

--
-- Indices de la tabla `modulo`
--
ALTER TABLE `modulo`
  ADD PRIMARY KEY (`id_modulo`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`id_permisos`),
  ADD KEY `fkID_rol_idx` (`fkID_cargo`),
  ADD KEY `fkID_modulo_idx` (`fkID_modulo`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`id_persona`),
  ADD KEY `fkID_territorial_idx` (`fkID_territorial`),
  ADD KEY `fkID_cetap_idx` (`fkID_cetap`),
  ADD KEY `fkID_cargo_idx` (`fkID_cargo`),
  ADD KEY `fkID_area_idx` (`fkID_area`),
  ADD KEY `fkID_tipo_persona_idx` (`fkID_tipo_persona`);

--
-- Indices de la tabla `procesador`
--
ALTER TABLE `procesador`
  ADD PRIMARY KEY (`id_procesador`,`estado`);

--
-- Indices de la tabla `proyecto`
--
ALTER TABLE `proyecto`
  ADD PRIMARY KEY (`id_proyecto`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `sistema_operativo`
--
ALTER TABLE `sistema_operativo`
  ADD PRIMARY KEY (`id_sistema_operativo`);

--
-- Indices de la tabla `territorial`
--
ALTER TABLE `territorial`
  ADD PRIMARY KEY (`id_territorial`);

--
-- Indices de la tabla `territorial_proyecto`
--
ALTER TABLE `territorial_proyecto`
  ADD PRIMARY KEY (`id_territorial_proyecto`),
  ADD KEY `fkID_proyecto_idx` (`fkID_proyecto`);

--
-- Indices de la tabla `tipo_equipo`
--
ALTER TABLE `tipo_equipo`
  ADD PRIMARY KEY (`id_tipo_equipo`);

--
-- Indices de la tabla `tipo_movimiento`
--
ALTER TABLE `tipo_movimiento`
  ADD PRIMARY KEY (`id_tipo_movimiento`);

--
-- Indices de la tabla `tipo_persona`
--
ALTER TABLE `tipo_persona`
  ADD PRIMARY KEY (`id_tipo_persona`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `fkID_persona_idx` (`fkID_persona`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `area`
--
ALTER TABLE `area`
  MODIFY `id_area` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `asignar`
--
ALTER TABLE `asignar`
  MODIFY `id_asignar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `cargo`
--
ALTER TABLE `cargo`
  MODIFY `id_cargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `cetap`
--
ALTER TABLE `cetap`
  MODIFY `id_cetap` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `equipo`
--
ALTER TABLE `equipo`
  MODIFY `id_equipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `estado_equipo`
--
ALTER TABLE `estado_equipo`
  MODIFY `id_estado_equipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `historico_equipo`
--
ALTER TABLE `historico_equipo`
  MODIFY `id_historico_equipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
  MODIFY `id_inventario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `id_marca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `memoria`
--
ALTER TABLE `memoria`
  MODIFY `id_memoria` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `modelo`
--
ALTER TABLE `modelo`
  MODIFY `id_modelo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT de la tabla `modulo`
--
ALTER TABLE `modulo`
  MODIFY `id_modulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `id_persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `procesador`
--
ALTER TABLE `procesador`
  MODIFY `id_procesador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `proyecto`
--
ALTER TABLE `proyecto`
  MODIFY `id_proyecto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `sistema_operativo`
--
ALTER TABLE `sistema_operativo`
  MODIFY `id_sistema_operativo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `territorial`
--
ALTER TABLE `territorial`
  MODIFY `id_territorial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `territorial_proyecto`
--
ALTER TABLE `territorial_proyecto`
  MODIFY `id_territorial_proyecto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de la tabla `tipo_equipo`
--
ALTER TABLE `tipo_equipo`
  MODIFY `id_tipo_equipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tipo_movimiento`
--
ALTER TABLE `tipo_movimiento`
  MODIFY `id_tipo_movimiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tipo_persona`
--
ALTER TABLE `tipo_persona`
  MODIFY `id_tipo_persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
