-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 09-09-2014 a las 06:42:50
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `dentalapp`
--
CREATE DATABASE IF NOT EXISTS `dentalapp` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `dentalapp`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Convenio`
--

DROP TABLE IF EXISTS `Convenio`;
CREATE TABLE IF NOT EXISTS `Convenio` (
  `convenioId` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombreConvenio` varchar(56) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`convenioId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `CostoProcedimiento`
--

DROP TABLE IF EXISTS `CostoProcedimiento`;
CREATE TABLE IF NOT EXISTS `CostoProcedimiento` (
  `costoProcedimientoId` bigint(20) NOT NULL AUTO_INCREMENT,
  `valor` bigint(20) NOT NULL,
  `procedimientoId` bigint(20) DEFAULT NULL,
  `convenioId` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`costoProcedimientoId`),
  KEY `IDX_BE6B3BFC42C7B7FD` (`procedimientoId`),
  KEY `IDX_BE6B3BFCA3FCB4` (`convenioId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `DiagnosticoDiente`
--

DROP TABLE IF EXISTS `DiagnosticoDiente`;
CREATE TABLE IF NOT EXISTS `DiagnosticoDiente` (
  `diagnosticoDienteId` bigint(20) NOT NULL AUTO_INCREMENT,
  `tipoDiagnostico` int(11) NOT NULL,
  `ubicacion` int(11) NOT NULL,
  `historiaClinicaId` bigint(20) DEFAULT NULL,
  `itemOdontogramaId` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`diagnosticoDienteId`),
  KEY `IDX_CC7486697BC761ED` (`historiaClinicaId`),
  KEY `IDX_CC748669C4CEE368` (`itemOdontogramaId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Grupo`
--

DROP TABLE IF EXISTS `Grupo`;
CREATE TABLE IF NOT EXISTS `Grupo` (
  `grupoId` bigint(20) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(124) COLLATE utf8_unicode_ci NOT NULL,
  `orden` int(11) NOT NULL,
  PRIMARY KEY (`grupoId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `Grupo`
--

INSERT INTO `Grupo` (`grupoId`, `titulo`, `orden`) VALUES
(1, 'ANAMNESIS', 0),
(2, 'ANTECEDENTES', 1),
(3, 'EXAMEN FÍSICO ESTOMATOLÓGICO', 2),
(4, 'ANTECEDENTES', 3),
(5, 'ODONTOGRAMA', 4),
(6, 'ANÁLISIS PERIODONTAL', 5),
(7, 'DIAGNÓSTICO', 6),
(8, 'DIAGNÓSTICO Y PRONÓSTICO ', 7),
(9, 'PLAN DE TRATAMIENTO', 8),
(10, 'EVOLUCIO DEL TRATAMIENTO (ODONTOGRAMA)', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `HistoriaClinica`
--

DROP TABLE IF EXISTS `HistoriaClinica`;
CREATE TABLE IF NOT EXISTS `HistoriaClinica` (
  `historiaClinicaId` bigint(20) NOT NULL AUTO_INCREMENT,
  `pacienteId` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`historiaClinicaId`),
  KEY `IDX_7B2462F8A18FEEAF` (`pacienteId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `HistoriaClinica`
--

INSERT INTO `HistoriaClinica` (`historiaClinicaId`, `pacienteId`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ItemOdontograma`
--

DROP TABLE IF EXISTS `ItemOdontograma`;
CREATE TABLE IF NOT EXISTS `ItemOdontograma` (
  `itemOdontogramaId` bigint(20) NOT NULL AUTO_INCREMENT,
  `noCuadrante` int(11) NOT NULL,
  `noDiente` int(11) NOT NULL,
  `odontogramaId` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`itemOdontogramaId`),
  KEY `IDX_4EED8D11E2B137F5` (`odontogramaId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Odontograma`
--

DROP TABLE IF EXISTS `Odontograma`;
CREATE TABLE IF NOT EXISTS `Odontograma` (
  `odontogramaId` bigint(20) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `grupoId` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`odontogramaId`),
  KEY `IDX_18D26BFDE77513EC` (`grupoId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `OpcionRespuesta`
--

DROP TABLE IF EXISTS `OpcionRespuesta`;
CREATE TABLE IF NOT EXISTS `OpcionRespuesta` (
  `opcRtaId` bigint(20) NOT NULL AUTO_INCREMENT,
  `orden` int(11) NOT NULL,
  `valorTexto` varchar(2048) COLLATE utf8_unicode_ci DEFAULT NULL,
  `valorNumero` decimal(10,0) DEFAULT NULL,
  `tipoPreguntaId` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`opcRtaId`),
  KEY `IDX_A199ED9546E25505` (`tipoPreguntaId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `OpcionRespuesta`
--

INSERT INTO `OpcionRespuesta` (`opcRtaId`, `orden`, `valorTexto`, `valorNumero`, `tipoPreguntaId`) VALUES
(1, 1, NULL, NULL, 1),
(2, 1, 'SI', NULL, 2),
(3, 2, 'NO', NULL, 2),
(4, 3, 'NO SABE', NULL, 2),
(5, 1, 'BUENA', NULL, 4),
(6, 2, 'REGULAR', NULL, 4),
(7, 3, 'MALA', NULL, 4),
(8, 1, NULL, '0', 5),
(9, 1, 'SI', NULL, 3),
(10, 2, 'NO', NULL, 3),
(11, 1, 'NORMAL', NULL, 6),
(12, 2, 'ANORMAL', NULL, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Paciente`
--

DROP TABLE IF EXISTS `Paciente`;
CREATE TABLE IF NOT EXISTS `Paciente` (
  `pacienteId` bigint(20) NOT NULL AUTO_INCREMENT,
  `apellido1` varchar(56) COLLATE utf8_unicode_ci NOT NULL,
  `apellido2` varchar(56) COLLATE utf8_unicode_ci NOT NULL,
  `nombres` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `fechaNacimiento` datetime NOT NULL,
  `lugarNacimiento` varchar(1024) COLLATE utf8_unicode_ci NOT NULL,
  `tipoIdentificacion` int(11) NOT NULL,
  `noIdentificacion` bigint(20) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `estadoCivil` int(11) NOT NULL,
  `sexo` int(11) NOT NULL,
  `ocupacion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `empresa` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cargo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `EPS` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cotizanteBeneficiario` int(11) NOT NULL,
  `responNombreCompleto` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `responNoIdentificacion` bigint(20) NOT NULL,
  `responParentesco` varchar(124) COLLATE utf8_unicode_ci NOT NULL,
  `residenciaMunicipio` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `residenciaDepartamento` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `residenciaDireccion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `residenciaTelefono` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `trabajoMunicipio` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `trabajoDepartamento` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `trabajoDireccion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `trabajoTelefono` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `responUbicacionDepartamento` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `responUbicacionMunicipio` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `responUbicacionDireccion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `responUbicacionTelefono` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`pacienteId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `Paciente`
--

INSERT INTO `Paciente` (`pacienteId`, `apellido1`, `apellido2`, `nombres`, `fechaNacimiento`, `lugarNacimiento`, `tipoIdentificacion`, `noIdentificacion`, `email`, `estadoCivil`, `sexo`, `ocupacion`, `empresa`, `cargo`, `EPS`, `cotizanteBeneficiario`, `responNombreCompleto`, `responNoIdentificacion`, `responParentesco`, `residenciaMunicipio`, `residenciaDepartamento`, `residenciaDireccion`, `residenciaTelefono`, `trabajoMunicipio`, `trabajoDepartamento`, `trabajoDireccion`, `trabajoTelefono`, `responUbicacionDepartamento`, `responUbicacionMunicipio`, `responUbicacionDireccion`, `responUbicacionTelefono`) VALUES
(1, 'Ruano', 'Daza', 'William Alexis', '1992-12-09 00:00:00', 'Bolivar Cauca', 1, 1061753963, 'waruano9212@gmail.com', 1, 1, 'programador', 'smartapps', 'desarrollo', 'cosmited', 1, 'Aida Derly Daza Dorado', 25311423, 'mama', 'Popayan', 'Cauca', 'Urb. EL uvo casa Nro 20', '3206579212', 'Bolivar', 'Cauca', 'La Monja', '3122280744', 'Cauca', 'Bolivar', 'La Monja', '3122280744');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Pregunta`
--

DROP TABLE IF EXISTS `Pregunta`;
CREATE TABLE IF NOT EXISTS `Pregunta` (
  `preguntaId` bigint(20) NOT NULL AUTO_INCREMENT,
  `enunciado` varchar(1024) COLLATE utf8_unicode_ci NOT NULL,
  `obligatoria` tinyint(1) NOT NULL,
  `orden` int(11) NOT NULL,
  `noColumna` int(11) NOT NULL,
  `estaActiva` tinyint(1) NOT NULL,
  `grupoId` bigint(20) DEFAULT NULL,
  `tipoPreguntaId` bigint(20) DEFAULT NULL,
  `colspan` int(11) NOT NULL,
  `rowspan` int(11) NOT NULL,
  PRIMARY KEY (`preguntaId`),
  KEY `IDX_579683A1E77513EC` (`grupoId`),
  KEY `IDX_579683A146E25505` (`tipoPreguntaId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=60 ;

--
-- Volcado de datos para la tabla `Pregunta`
--

INSERT INTO `Pregunta` (`preguntaId`, `enunciado`, `obligatoria`, `orden`, `noColumna`, `estaActiva`, `grupoId`, `tipoPreguntaId`, `colspan`, `rowspan`) VALUES
(1, 'MOTIVO CONSULTA', 1, 1, 1, 1, 1, 1, 0, 0),
(2, 'TRATAMIENTO MÉDICO', 1, 1, 1, 1, 2, 2, 0, 0),
(3, 'DIABETES', 1, 2, 5, 1, 2, 2, 0, 0),
(4, 'IGESTION MEDICAMENTOS', 1, 3, 1, 1, 2, 2, 0, 0),
(5, 'FIEBRE REUMATICA', 1, 4, 5, 1, 2, 2, 0, 0),
(6, 'REACCIONES ALÉRGICAS', 1, 5, 1, 1, 2, 2, 0, 0),
(7, 'HEPATITIS', 1, 6, 5, 1, 2, 2, 0, 0),
(8, 'ANESTESIA', 1, 7, 1, 1, 2, 2, 0, 0),
(9, 'HIPERTENSIÓN', 1, 8, 5, 1, 2, 2, 0, 0),
(10, 'ANTIBIÓTICOS', 1, 9, 1, 1, 2, 2, 0, 0),
(11, 'EMBARAZO', 1, 10, 5, 1, 2, 2, 0, 0),
(12, 'HEMORRAGIAS', 1, 11, 1, 1, 2, 2, 0, 0),
(13, 'ENFERMEDADES RENALES', 1, 12, 5, 1, 2, 2, 0, 0),
(14, 'IRRADIACIONES', 1, 13, 1, 1, 2, 2, 0, 0),
(15, 'ENFERMEDADES GASTROINTESTINALES', 1, 14, 5, 1, 2, 2, 0, 0),
(16, 'SINUSITIS', 1, 15, 1, 1, 2, 2, 0, 0),
(17, 'ORGANOS DE LOS SENTIDOS', 1, 16, 5, 1, 2, 2, 0, 0),
(18, 'ENFERMEDAD RESPIRATORIA', 1, 17, 1, 1, 2, 2, 0, 0),
(19, 'CARDIOPATIAS', 1, 18, 1, 1, 2, 2, 0, 0),
(20, 'OBSERVACIONES', 1, 19, 1, 1, 2, 1, 0, 0),
(21, 'ULTIMA VISITA AL ODONTOLOGO', 1, 20, 1, 1, 2, 1, 0, 0),
(22, 'MOTIVO', 1, 21, 2, 1, 2, 1, 0, 0),
(23, 'TEMPERATURA', 1, 1, 1, 1, 3, 1, 0, 0),
(24, 'PULSO', 1, 2, 2, 1, 3, 1, 0, 0),
(25, 'TENSION', 1, 3, 3, 1, 3, 1, 0, 0),
(26, 'RESPIRACIÓN', 1, 4, 4, 1, 3, 1, 0, 0),
(27, 'HIGIENE ORAL', 1, 5, 1, 1, 3, 4, 0, 0),
(28, 'HIGIENE ORAL', 1, 6, 3, 1, 3, 3, 0, 0),
(29, 'CEPILLO DENTAL', 1, 7, 1, 1, 3, 1, 0, 0),
(30, 'CEPILLO DENTAL', 1, 8, 3, 1, 3, 3, 0, 0),
(31, 'CUANTAS VECES AL DIA', 1, 9, 1, 1, 3, 5, 0, 0),
(32, 'A.T.M.', 1, 1, 1, 1, 4, 6, 0, 0),
(33, 'Senos Maxilares', 1, 2, 4, 1, 4, 6, 0, 0),
(34, 'Labios', 1, 3, 1, 1, 4, 6, 0, 0),
(35, 'Músculos masticadores', 1, 4, 4, 1, 4, 6, 0, 0),
(36, 'Lengua', 1, 5, 1, 1, 4, 6, 0, 0),
(37, 'Ganglios', 1, 6, 4, 1, 4, 6, 0, 0),
(38, 'Paladar', 1, 7, 1, 1, 4, 6, 0, 0),
(39, 'Oclusión', 1, 8, 4, 1, 4, 6, 0, 0),
(40, 'Piso de boca', 1, 9, 1, 1, 4, 6, 0, 0),
(41, 'Frenillos', 1, 10, 4, 1, 4, 6, 0, 0),
(42, 'Carrillos', 1, 11, 1, 1, 4, 6, 0, 0),
(43, 'Mucosas', 1, 12, 4, 1, 4, 6, 0, 0),
(44, 'Glándulas salivares', 1, 13, 1, 1, 4, 6, 0, 0),
(45, 'Encías', 1, 14, 4, 1, 4, 6, 0, 0),
(46, 'Maxilares', 1, 15, 1, 1, 4, 6, 0, 0),
(47, 'Amígdalas', 1, 16, 4, 1, 4, 6, 0, 0),
(48, 'Supernumerarios', 1, 1, 1, 1, 4, 3, 0, 0),
(49, 'Maloclusiones', 1, 2, 4, 1, 4, 3, 0, 0),
(50, 'abrasión', 1, 3, 1, 1, 4, 3, 0, 0),
(51, 'Incluidos', 1, 4, 4, 1, 4, 3, 0, 0),
(52, 'Manchas-Cambios de color', 1, 5, 1, 1, 4, 3, 0, 0),
(53, 'Trauma', 1, 6, 4, 1, 4, 3, 0, 0),
(54, 'Patología pulpar - Abcesos', 1, 7, 1, 1, 4, 3, 0, 0),
(55, 'Hábitos', 1, 8, 4, 1, 4, 3, 0, 0),
(56, 'Bolsa movilidad', 1, 9, 4, 1, 4, 3, 0, 0),
(57, 'Placa Blanda', 1, 10, 4, 1, 4, 3, 0, 0),
(58, 'Cálculos', 1, 11, 4, 1, 4, 3, 0, 0),
(59, 'Observaciones:', 0, 12, 1, 1, 4, 1, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Procedimiento`
--

DROP TABLE IF EXISTS `Procedimiento`;
CREATE TABLE IF NOT EXISTS `Procedimiento` (
  `procedimientoId` bigint(20) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`procedimientoId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Respuesta`
--

DROP TABLE IF EXISTS `Respuesta`;
CREATE TABLE IF NOT EXISTS `Respuesta` (
  `respuestaId` bigint(20) NOT NULL AUTO_INCREMENT,
  `respuestaTexto` varchar(2048) COLLATE utf8_unicode_ci NOT NULL,
  `respuestaNumerica` decimal(10,0) NOT NULL,
  `preguntaId` bigint(20) DEFAULT NULL,
  `historiaClinicaId` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`respuestaId`),
  KEY `IDX_EE9F474DA64D4886` (`preguntaId`),
  KEY `IDX_EE9F474D7BC761ED` (`historiaClinicaId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Sugerencia`
--

DROP TABLE IF EXISTS `Sugerencia`;
CREATE TABLE IF NOT EXISTS `Sugerencia` (
  `sugerenciaId` bigint(20) NOT NULL AUTO_INCREMENT,
  `fechaPlanificacion` datetime NOT NULL,
  `procedimientoId` bigint(20) DEFAULT NULL,
  `historiaClinicaId` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`sugerenciaId`),
  KEY `IDX_E739D942C7B7FD` (`procedimientoId`),
  KEY `IDX_E739D97BC761ED` (`historiaClinicaId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TipoPregunta`
--

DROP TABLE IF EXISTS `TipoPregunta`;
CREATE TABLE IF NOT EXISTS `TipoPregunta` (
  `tipoPreguntaId` bigint(20) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`tipoPreguntaId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `TipoPregunta`
--

INSERT INTO `TipoPregunta` (`tipoPreguntaId`, `descripcion`) VALUES
(1, 'Enunciado: Rta-String'),
(2, 'Enunciado: si-no-no_sabe'),
(3, 'Enunciado: si-no'),
(4, 'Enunciado: buena,regular,mala'),
(5, 'Enunciado: numero-entero'),
(6, 'Enunciado: normal-anormal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Tratamiento`
--

DROP TABLE IF EXISTS `Tratamiento`;
CREATE TABLE IF NOT EXISTS `Tratamiento` (
  `tratamientoId` bigint(20) NOT NULL AUTO_INCREMENT,
  `fechaHora` datetime NOT NULL,
  `diente` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `costoProcedimiento` bigint(20) NOT NULL,
  `abono` bigint(20) NOT NULL,
  `saldo` bigint(20) NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `historiaClinicaId` bigint(20) DEFAULT NULL,
  `procedimientoId` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`tratamientoId`),
  KEY `IDX_E7382FAB7BC761ED` (`historiaClinicaId`),
  KEY `IDX_E7382FAB42C7B7FD` (`procedimientoId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Usuario`
--

DROP TABLE IF EXISTS `Usuario`;
CREATE TABLE IF NOT EXISTS `Usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `locked` tinyint(1) NOT NULL,
  `expired` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  `confirmation_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `credentials_expired` tinyint(1) NOT NULL,
  `credentials_expire_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_EDD889C192FC23A8` (`username_canonical`),
  UNIQUE KEY `UNIQ_EDD889C1A0D96FBF` (`email_canonical`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `CostoProcedimiento`
--
ALTER TABLE `CostoProcedimiento`
  ADD CONSTRAINT `FK_BE6B3BFC42C7B7FD` FOREIGN KEY (`procedimientoId`) REFERENCES `Procedimiento` (`procedimientoId`),
  ADD CONSTRAINT `FK_BE6B3BFCA3FCB4` FOREIGN KEY (`convenioId`) REFERENCES `Convenio` (`convenioId`);

--
-- Filtros para la tabla `DiagnosticoDiente`
--
ALTER TABLE `DiagnosticoDiente`
  ADD CONSTRAINT `FK_CC7486697BC761ED` FOREIGN KEY (`historiaClinicaId`) REFERENCES `HistoriaClinica` (`historiaClinicaId`),
  ADD CONSTRAINT `FK_CC748669C4CEE368` FOREIGN KEY (`itemOdontogramaId`) REFERENCES `ItemOdontograma` (`itemOdontogramaId`);

--
-- Filtros para la tabla `HistoriaClinica`
--
ALTER TABLE `HistoriaClinica`
  ADD CONSTRAINT `FK_7B2462F8A18FEEAF` FOREIGN KEY (`pacienteId`) REFERENCES `Paciente` (`pacienteId`);

--
-- Filtros para la tabla `ItemOdontograma`
--
ALTER TABLE `ItemOdontograma`
  ADD CONSTRAINT `FK_4EED8D11E2B137F5` FOREIGN KEY (`odontogramaId`) REFERENCES `Odontograma` (`odontogramaId`);

--
-- Filtros para la tabla `Odontograma`
--
ALTER TABLE `Odontograma`
  ADD CONSTRAINT `FK_18D26BFDE77513EC` FOREIGN KEY (`grupoId`) REFERENCES `Grupo` (`grupoId`);

--
-- Filtros para la tabla `OpcionRespuesta`
--
ALTER TABLE `OpcionRespuesta`
  ADD CONSTRAINT `FK_A199ED9546E25505` FOREIGN KEY (`tipoPreguntaId`) REFERENCES `TipoPregunta` (`tipoPreguntaId`);

--
-- Filtros para la tabla `Pregunta`
--
ALTER TABLE `Pregunta`
  ADD CONSTRAINT `FK_579683A146E25505` FOREIGN KEY (`tipoPreguntaId`) REFERENCES `TipoPregunta` (`tipoPreguntaId`),
  ADD CONSTRAINT `FK_579683A1E77513EC` FOREIGN KEY (`grupoId`) REFERENCES `Grupo` (`grupoId`);

--
-- Filtros para la tabla `Respuesta`
--
ALTER TABLE `Respuesta`
  ADD CONSTRAINT `FK_EE9F474D7BC761ED` FOREIGN KEY (`historiaClinicaId`) REFERENCES `HistoriaClinica` (`historiaClinicaId`),
  ADD CONSTRAINT `FK_EE9F474DA64D4886` FOREIGN KEY (`preguntaId`) REFERENCES `Pregunta` (`preguntaId`);

--
-- Filtros para la tabla `Sugerencia`
--
ALTER TABLE `Sugerencia`
  ADD CONSTRAINT `FK_E739D942C7B7FD` FOREIGN KEY (`procedimientoId`) REFERENCES `Procedimiento` (`procedimientoId`),
  ADD CONSTRAINT `FK_E739D97BC761ED` FOREIGN KEY (`historiaClinicaId`) REFERENCES `HistoriaClinica` (`historiaClinicaId`);

--
-- Filtros para la tabla `Tratamiento`
--
ALTER TABLE `Tratamiento`
  ADD CONSTRAINT `FK_E7382FAB42C7B7FD` FOREIGN KEY (`procedimientoId`) REFERENCES `Procedimiento` (`procedimientoId`),
  ADD CONSTRAINT `FK_E7382FAB7BC761ED` FOREIGN KEY (`historiaClinicaId`) REFERENCES `HistoriaClinica` (`historiaClinicaId`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;