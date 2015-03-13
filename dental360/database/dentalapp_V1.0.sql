-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 15-11-2014 a las 05:46:38
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Atencion`
--

CREATE TABLE IF NOT EXISTS `Atencion` (
  `recibo_id` int(11) DEFAULT NULL,
  `atencionId` bigint(20) NOT NULL AUTO_INCREMENT,
  `fechaHora` datetime NOT NULL,
  `abono` bigint(20) NOT NULL,
  `saldo` bigint(20) NOT NULL,
  `costoTotal` bigint(20) NOT NULL,
  `firmaPaciente` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `historiaClinicaId` bigint(20) DEFAULT NULL,
  `medicoId` bigint(20) DEFAULT NULL,
  `citaId` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`atencionId`),
  UNIQUE KEY `UNIQ_C0F32D922C458692` (`recibo_id`),
  KEY `IDX_C0F32D927BC761ED` (`historiaClinicaId`),
  KEY `IDX_C0F32D92F179D4CC` (`medicoId`),
  KEY `IDX_C0F32D926DAC0EBA` (`citaId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Cita`
--

CREATE TABLE IF NOT EXISTS `Cita` (
  `citaId` bigint(20) NOT NULL AUTO_INCREMENT,
  `fecha` datetime NOT NULL,
  `horainicio` datetime NOT NULL,
  `horafin` datetime NOT NULL,
  `estado` int(11) NOT NULL,
  `medicoId` bigint(20) DEFAULT NULL,
  `unidadAtencionId` bigint(20) DEFAULT NULL,
  `pacienteId` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`citaId`),
  KEY `IDX_9E05355CF179D4CC` (`medicoId`),
  KEY `IDX_9E05355C966D222A` (`unidadAtencionId`),
  KEY `IDX_9E05355CA18FEEAF` (`pacienteId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Convenio`
--

CREATE TABLE IF NOT EXISTS `Convenio` (
  `convenioId` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombreConvenio` varchar(56) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`convenioId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `Convenio`
--

INSERT INTO `Convenio` (`convenioId`, `nombreConvenio`) VALUES
(1, 'Sin Convenio');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `CostoProcedimiento`
--

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

CREATE TABLE IF NOT EXISTS `DiagnosticoDiente` (
  `diagnosticoDienteId` bigint(20) NOT NULL AUTO_INCREMENT,
  `tipoDiagnostico` varchar(124) COLLATE utf8_unicode_ci NOT NULL,
  `tipoIcono` varchar(124) COLLATE utf8_unicode_ci NOT NULL,
  `icono` varchar(124) COLLATE utf8_unicode_ci NOT NULL,
  `ubicacion` int(11) NOT NULL,
  `historiaClinicaId` bigint(20) DEFAULT NULL,
  `itemOdontogramaId` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`diagnosticoDienteId`),
  KEY `IDX_CC7486697BC761ED` (`historiaClinicaId`),
  KEY `IDX_CC748669C4CEE368` (`itemOdontogramaId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Disponibilidad`
--

CREATE TABLE IF NOT EXISTS `Disponibilidad` (
  `disponibilidadId` bigint(20) NOT NULL AUTO_INCREMENT,
  `diasSemena` int(11) NOT NULL,
  `fechaDesde` datetime NOT NULL,
  `fechaHasta` datetime NOT NULL,
  `horaInicio` datetime NOT NULL,
  `horaFin` datetime NOT NULL,
  `medicoId` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`disponibilidadId`),
  KEY `IDX_860ED3F7F179D4CC` (`medicoId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Grupo`
--

CREATE TABLE IF NOT EXISTS `Grupo` (
  `grupoId` bigint(20) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(124) COLLATE utf8_unicode_ci NOT NULL,
  `orden` int(11) NOT NULL,
  PRIMARY KEY (`grupoId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `HistoriaClinica`
--

CREATE TABLE IF NOT EXISTS `HistoriaClinica` (
  `historiaClinicaId` bigint(20) NOT NULL AUTO_INCREMENT,
  `pacienteId` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`historiaClinicaId`),
  KEY `IDX_7B2462F8A18FEEAF` (`pacienteId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ItemOdontograma`
--

CREATE TABLE IF NOT EXISTS `ItemOdontograma` (
  `itemOdontogramaId` bigint(20) NOT NULL AUTO_INCREMENT,
  `noCuadrante` int(11) NOT NULL,
  `noDiente` int(11) NOT NULL,
  `noFila` int(11) NOT NULL,
  `odontogramaId` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`itemOdontogramaId`),
  KEY `IDX_4EED8D11E2B137F5` (`odontogramaId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Medico`
--

CREATE TABLE IF NOT EXISTS `Medico` (
  `usuario_id` int(11) DEFAULT NULL,
  `medicoId` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombreCompleto` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `titulosEspecialidad` varchar(1024) COLLATE utf8_unicode_ci NOT NULL,
  `pathFirma` varchar(1024) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`medicoId`),
  UNIQUE KEY `UNIQ_3349947ADB38439E` (`usuario_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Odontograma`
--

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

CREATE TABLE IF NOT EXISTS `OpcionRespuesta` (
  `opcRtaId` bigint(20) NOT NULL AUTO_INCREMENT,
  `orden` int(11) NOT NULL,
  `valorTexto` varchar(2048) COLLATE utf8_unicode_ci DEFAULT NULL,
  `valorNumero` decimal(10,0) DEFAULT NULL,
  `opciones` varchar(512) COLLATE utf8_unicode_ci DEFAULT '',
  `enunciado` varchar(2048) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tipoPreguntaId` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`opcRtaId`),
  KEY `IDX_A199ED9546E25505` (`tipoPreguntaId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Paciente`
--

CREATE TABLE IF NOT EXISTS `Paciente` (
  `pacienteId` bigint(20) NOT NULL AUTO_INCREMENT,
  `apellido1` varchar(56) COLLATE utf8_unicode_ci NOT NULL,
  `apellido2` varchar(56) COLLATE utf8_unicode_ci NOT NULL,
  `nombres` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `fechaNacimiento` datetime DEFAULT NULL,
  `lugarNacimiento` varchar(1024) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tipoIdentificacion` int(11) NOT NULL,
  `noIdentificacion` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `estadoCivil` int(11) DEFAULT NULL,
  `sexo` int(11) DEFAULT NULL,
  `ocupacion` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `empresa` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cargo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EPS` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cotizanteBeneficiario` int(11) DEFAULT NULL,
  `responNombreCompleto` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `responNoIdentificacion` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `responParentesco` varchar(124) COLLATE utf8_unicode_ci DEFAULT NULL,
  `residenciaMunicipio` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `residenciaDepartamento` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `residenciaDireccion` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `residenciaTelefono` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `trabajoMunicipio` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `trabajoDepartamento` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `trabajoDireccion` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `trabajoTelefono` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `responUbicacionDepartamento` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `responUbicacionMunicipio` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `responUbicacionDireccion` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `responUbicacionTelefono` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `convenioId` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`pacienteId`),
  KEY `IDX_3FBDCB08A3FCB4` (`convenioId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Pregunta`
--

CREATE TABLE IF NOT EXISTS `Pregunta` (
  `preguntaId` bigint(20) NOT NULL AUTO_INCREMENT,
  `tipoEntrada` int(11) NOT NULL,
  `enunciado` varchar(1024) COLLATE utf8_unicode_ci DEFAULT NULL,
  `obligatoria` tinyint(1) NOT NULL DEFAULT '0',
  `orden` int(11) NOT NULL,
  `colspan` int(11) NOT NULL DEFAULT '1',
  `rowspan` int(11) NOT NULL DEFAULT '1',
  `noColumna` int(11) NOT NULL DEFAULT '1',
  `estaActiva` tinyint(1) NOT NULL DEFAULT '0',
  `opciones` varchar(512) COLLATE utf8_unicode_ci DEFAULT '',
  `grupoId` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`preguntaId`),
  KEY `IDX_579683A1E77513EC` (`grupoId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `PreguntaOpcion`
--

CREATE TABLE IF NOT EXISTS `PreguntaOpcion` (
  `opcRtaId` bigint(20) NOT NULL AUTO_INCREMENT,
  `orden` int(11) NOT NULL,
  `valorTexto` varchar(2048) COLLATE utf8_unicode_ci DEFAULT NULL,
  `valorNumero` decimal(10,0) DEFAULT NULL,
  `opciones` varchar(512) COLLATE utf8_unicode_ci DEFAULT '',
  `enunciado` varchar(2048) COLLATE utf8_unicode_ci DEFAULT NULL,
  `preguntaId` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`opcRtaId`),
  KEY `IDX_453AE4E4A64D4886` (`preguntaId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Procedimiento`
--

CREATE TABLE IF NOT EXISTS `Procedimiento` (
  `procedimientoId` bigint(20) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`procedimientoId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Recibo`
--

CREATE TABLE IF NOT EXISTS `Recibo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numero` varchar(31) COLLATE utf8_unicode_ci NOT NULL,
  `abono` bigint(20) NOT NULL,
  `fecha` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Respuesta`
--

CREATE TABLE IF NOT EXISTS `Respuesta` (
  `respuestaId` bigint(20) NOT NULL AUTO_INCREMENT,
  `respuestaTexto` varchar(2048) COLLATE utf8_unicode_ci NOT NULL,
  `respuestaNumerica` decimal(10,0) DEFAULT NULL,
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

CREATE TABLE IF NOT EXISTS `Sugerencia` (
  `sugerenciaId` bigint(20) NOT NULL AUTO_INCREMENT,
  `costo` bigint(20) NOT NULL,
  `fechaPlanificacion` datetime NOT NULL,
  `procedimientoId` bigint(20) DEFAULT NULL,
  `historiaClinicaId` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`sugerenciaId`),
  KEY `IDX_E739D942C7B7FD` (`procedimientoId`),
  KEY `IDX_E739D97BC761ED` (`historiaClinicaId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TarifaMedicoProc`
--

CREATE TABLE IF NOT EXISTS `TarifaMedicoProc` (
  `tarifaMedicoProcId` bigint(20) NOT NULL AUTO_INCREMENT,
  `tipoTarifa` int(11) NOT NULL,
  `valor` bigint(20) NOT NULL,
  `procedimientoId` bigint(20) DEFAULT NULL,
  `medicoId` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`tarifaMedicoProcId`),
  KEY `IDX_D7DFF00142C7B7FD` (`procedimientoId`),
  KEY `IDX_D7DFF001F179D4CC` (`medicoId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TipoPregunta`
--

CREATE TABLE IF NOT EXISTS `TipoPregunta` (
  `tipoPreguntaId` bigint(20) NOT NULL AUTO_INCREMENT,
  `tipoEntrada` int(11) NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`tipoPreguntaId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Tratamiento`
--

CREATE TABLE IF NOT EXISTS `Tratamiento` (
  `tratamientoId` bigint(20) NOT NULL AUTO_INCREMENT,
  `diente` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `costoProcedimiento` bigint(20) NOT NULL,
  `procedimientoId` bigint(20) DEFAULT NULL,
  `atencionId` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`tratamientoId`),
  KEY `IDX_E7382FAB42C7B7FD` (`procedimientoId`),
  KEY `IDX_E7382FAB6348343C` (`atencionId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `UnidadAtencion`
--

CREATE TABLE IF NOT EXISTS `UnidadAtencion` (
  `unidadAtencionId` bigint(20) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`unidadAtencionId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Usuario`
--

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `Usuario`
--

INSERT INTO `Usuario` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `locked`, `expired`, `expires_at`, `confirmation_token`, `password_requested_at`, `roles`, `credentials_expired`, `credentials_expire_at`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', 'admin@gmail.com', 1, '9c58txvjkeo8wc8o048sk8sg8wkowsg', 'tHfAUQf4lWFfWbXrTdgLGkjfszX6uaUjMu5Kc7OnhGjX6VBA9zBfWmHwqn35VL1yuFuDDPuCEYMBklB51XN9hg==', '2014-11-15 05:45:05', 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:10:"ROLE_ADMIN";}', 0, NULL);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `Atencion`
--
ALTER TABLE `Atencion`
  ADD CONSTRAINT `FK_C0F32D922C458692` FOREIGN KEY (`recibo_id`) REFERENCES `Recibo` (`id`),
  ADD CONSTRAINT `FK_C0F32D926DAC0EBA` FOREIGN KEY (`citaId`) REFERENCES `Cita` (`citaId`),
  ADD CONSTRAINT `FK_C0F32D927BC761ED` FOREIGN KEY (`historiaClinicaId`) REFERENCES `HistoriaClinica` (`historiaClinicaId`),
  ADD CONSTRAINT `FK_C0F32D92F179D4CC` FOREIGN KEY (`medicoId`) REFERENCES `Medico` (`medicoId`);

--
-- Filtros para la tabla `Cita`
--
ALTER TABLE `Cita`
  ADD CONSTRAINT `FK_9E05355CA18FEEAF` FOREIGN KEY (`pacienteId`) REFERENCES `Paciente` (`pacienteId`),
  ADD CONSTRAINT `FK_9E05355C966D222A` FOREIGN KEY (`unidadAtencionId`) REFERENCES `UnidadAtencion` (`unidadAtencionId`),
  ADD CONSTRAINT `FK_9E05355CF179D4CC` FOREIGN KEY (`medicoId`) REFERENCES `Medico` (`medicoId`);

--
-- Filtros para la tabla `CostoProcedimiento`
--
ALTER TABLE `CostoProcedimiento`
  ADD CONSTRAINT `FK_BE6B3BFCA3FCB4` FOREIGN KEY (`convenioId`) REFERENCES `Convenio` (`convenioId`),
  ADD CONSTRAINT `FK_BE6B3BFC42C7B7FD` FOREIGN KEY (`procedimientoId`) REFERENCES `Procedimiento` (`procedimientoId`);

--
-- Filtros para la tabla `DiagnosticoDiente`
--
ALTER TABLE `DiagnosticoDiente`
  ADD CONSTRAINT `FK_CC748669C4CEE368` FOREIGN KEY (`itemOdontogramaId`) REFERENCES `ItemOdontograma` (`itemOdontogramaId`),
  ADD CONSTRAINT `FK_CC7486697BC761ED` FOREIGN KEY (`historiaClinicaId`) REFERENCES `HistoriaClinica` (`historiaClinicaId`);

--
-- Filtros para la tabla `Disponibilidad`
--
ALTER TABLE `Disponibilidad`
  ADD CONSTRAINT `FK_860ED3F7F179D4CC` FOREIGN KEY (`medicoId`) REFERENCES `Medico` (`medicoId`);

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
-- Filtros para la tabla `Medico`
--
ALTER TABLE `Medico`
  ADD CONSTRAINT `FK_3349947ADB38439E` FOREIGN KEY (`usuario_id`) REFERENCES `Usuario` (`id`);

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
-- Filtros para la tabla `Paciente`
--
ALTER TABLE `Paciente`
  ADD CONSTRAINT `FK_3FBDCB08A3FCB4` FOREIGN KEY (`convenioId`) REFERENCES `Convenio` (`convenioId`);

--
-- Filtros para la tabla `Pregunta`
--
ALTER TABLE `Pregunta`
  ADD CONSTRAINT `FK_579683A1E77513EC` FOREIGN KEY (`grupoId`) REFERENCES `Grupo` (`grupoId`);

--
-- Filtros para la tabla `PreguntaOpcion`
--
ALTER TABLE `PreguntaOpcion`
  ADD CONSTRAINT `FK_453AE4E4A64D4886` FOREIGN KEY (`preguntaId`) REFERENCES `Pregunta` (`preguntaId`);

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
  ADD CONSTRAINT `FK_E739D97BC761ED` FOREIGN KEY (`historiaClinicaId`) REFERENCES `HistoriaClinica` (`historiaClinicaId`),
  ADD CONSTRAINT `FK_E739D942C7B7FD` FOREIGN KEY (`procedimientoId`) REFERENCES `Procedimiento` (`procedimientoId`);

--
-- Filtros para la tabla `TarifaMedicoProc`
--
ALTER TABLE `TarifaMedicoProc`
  ADD CONSTRAINT `FK_D7DFF001F179D4CC` FOREIGN KEY (`medicoId`) REFERENCES `Medico` (`medicoId`),
  ADD CONSTRAINT `FK_D7DFF00142C7B7FD` FOREIGN KEY (`procedimientoId`) REFERENCES `Procedimiento` (`procedimientoId`);

--
-- Filtros para la tabla `Tratamiento`
--
ALTER TABLE `Tratamiento`
  ADD CONSTRAINT `FK_E7382FAB6348343C` FOREIGN KEY (`atencionId`) REFERENCES `Atencion` (`atencionId`),
  ADD CONSTRAINT `FK_E7382FAB42C7B7FD` FOREIGN KEY (`procedimientoId`) REFERENCES `Procedimiento` (`procedimientoId`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
