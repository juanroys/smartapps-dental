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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `Grupo`
--

INSERT INTO `Grupo` (`grupoId`, `titulo`, `orden`) VALUES
(1, 'Anamnesis', 2),
(2, 'Antecedentes', 3),
(3, 'Exámen Físico Estomatológico', 4),
(4, 'Antecedentes', 5),
(5, 'Odontograma', 6),
(6, 'Análisis Periodontal', 7),
(7, 'Análisis Endodóntico', 8),
(8, 'Diagnóstico', 9),
(9, 'Diagnóstico y Pronóstico', 10),
(10, 'Plan De Tratamiento', 11),
(11, 'Evolución Del Tratamiento (Odontograma)', 12),
(12, 'Historial', 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `HistoriaClinica`
--

CREATE TABLE IF NOT EXISTS `HistoriaClinica` (
  `historiaClinicaId` bigint(20) NOT NULL AUTO_INCREMENT,
  `pacienteId` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`historiaClinicaId`),
  KEY `IDX_7B2462F8A18FEEAF` (`pacienteId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `HistoriaClinica`
--

INSERT INTO `HistoriaClinica` (`historiaClinicaId`, `pacienteId`) VALUES
(1, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Estructura de tabla para la tabla `Odontograma`
--

CREATE TABLE IF NOT EXISTS `Odontograma` (
  `odontogramaId` bigint(20) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `grupoId` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`odontogramaId`),
  KEY `IDX_18D26BFDE77513EC` (`grupoId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `Odontograma`
--

INSERT INTO `Odontograma` (`odontogramaId`, `descripcion`, `grupoId`) VALUES
(1, 'Odontograma', 5),
(2, 'Evolución Del Tratamiento (Odontograma)', 11);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `OpcionRespuesta`
--

INSERT INTO `OpcionRespuesta` (`opcRtaId`, `orden`, `valorTexto`, `valorNumero`, `opciones`, `enunciado`, `tipoPreguntaId`) VALUES
(1, 1, 'si', NULL, '', 'Si', 1),
(2, 2, 'no', NULL, '', 'No', 1),
(3, 3, 'no_sabe', NULL, '', 'No Sabe', 1),
(4, 1, 'buena', NULL, NULL, 'Buena', 2),
(5, 2, 'regular', NULL, NULL, 'Regular', 2),
(6, 3, 'mala', NULL, NULL, 'Mala', 2),
(7, 1, 'si', NULL, NULL, 'Si', 3),
(8, 2, 'no', NULL, NULL, 'No', 3),
(9, 1, 'normal', NULL, NULL, 'Normal', 4),
(10, 2, 'anormal', NULL, NULL, 'Anormal', 4);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `Paciente`
--

INSERT INTO `Paciente` (`pacienteId`, `apellido1`, `apellido2`, `nombres`, `fechaNacimiento`, `lugarNacimiento`, `tipoIdentificacion`, `noIdentificacion`, `email`, `estadoCivil`, `sexo`, `ocupacion`, `empresa`, `cargo`, `EPS`, `cotizanteBeneficiario`, `responNombreCompleto`, `responNoIdentificacion`, `responParentesco`, `residenciaMunicipio`, `residenciaDepartamento`, `residenciaDireccion`, `residenciaTelefono`, `trabajoMunicipio`, `trabajoDepartamento`, `trabajoDireccion`, `trabajoTelefono`, `responUbicacionDepartamento`, `responUbicacionMunicipio`, `responUbicacionDireccion`, `responUbicacionTelefono`, `convenioId`) VALUES
(1, 'Apellido_Uno', 'Apellido_Dos', 'Nombre Paciente', '2000-08-29 00:00:00', NULL, 3, '12345678900', 'correoejemplo@gmail.com', 1, 1, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=104 ;

--
-- Volcado de datos para la tabla `Pregunta`
--

INSERT INTO `Pregunta` (`preguntaId`, `tipoEntrada`, `enunciado`, `obligatoria`, `orden`, `colspan`, `rowspan`, `noColumna`, `estaActiva`, `opciones`, `grupoId`) VALUES
(1, 8, NULL, 0, 1, 1, 1, 1, 1, 'odontograma', 5),
(2, 5, 'Motivo Consulta', 1, 1, 1, 1, 1, 1, NULL, 1),
(3, 3, 'Tratamiento Médico', 1, 1, 1, 1, 1, 1, NULL, 2),
(4, 3, 'Diabetes', 1, 1, 1, 1, 5, 1, NULL, 2),
(5, 3, 'Ingestión Medicamentos', 1, 2, 1, 1, 1, 1, NULL, 2),
(6, 3, 'Fiebre Reumática', 1, 2, 1, 1, 5, 1, NULL, 2),
(7, 3, 'Reacciones Alérgicas', 1, 3, 1, 1, 1, 1, NULL, 2),
(8, 3, 'Hepatitis', 1, 3, 1, 1, 5, 1, NULL, 2),
(9, 3, 'Anestesia', 1, 4, 1, 1, 1, 1, NULL, 2),
(10, 3, 'Hipertensión', 1, 4, 1, 1, 5, 1, NULL, 2),
(11, 3, 'Antibióticos', 1, 5, 1, 1, 1, 1, NULL, 2),
(12, 3, 'Embarazo', 1, 5, 1, 1, 5, 1, NULL, 2),
(13, 3, 'Hemorragias', 1, 6, 1, 1, 1, 1, NULL, 2),
(14, 3, 'Enfermedades Renales', 1, 6, 1, 1, 5, 1, NULL, 2),
(15, 3, 'Irradiacciones', 1, 7, 1, 1, 1, 1, NULL, 2),
(16, 3, 'Enfermedades Gastrointestinales', 1, 7, 1, 1, 5, 1, NULL, 2),
(17, 3, 'Sinusitis', 1, 8, 1, 1, 1, 1, NULL, 2),
(18, 3, 'Órganos De Los Sentidos', 1, 8, 1, 1, 5, 1, NULL, 2),
(19, 3, 'Enfermedad Respiratoria', 1, 9, 1, 1, 1, 1, NULL, 2),
(20, 3, 'Cardiopatías', 1, 9, 1, 1, 5, 1, NULL, 2),
(21, 5, 'Observaciones', 0, 10, 2, 1, 1, 1, NULL, 2),
(22, 1, 'Última Visita Al Odontólogo', 0, 11, 1, 1, 1, 1, NULL, 2),
(23, 1, 'Motivo', 0, 11, 1, 1, 5, 1, NULL, 2),
(24, 1, 'Temperatura', 1, 1, 1, 1, 1, 1, NULL, 3),
(25, 2, 'Pulso', 1, 1, 1, 1, 2, 1, NULL, 3),
(26, 1, 'Tensión', 1, 1, 1, 1, 3, 1, NULL, 3),
(27, 2, 'Respiración', 1, 1, 1, 1, 4, 1, NULL, 3),
(28, 3, 'Higiene Oral', 1, 2, 2, 1, 1, 1, NULL, 3),
(29, 3, 'Higiene Oral', 1, 2, 2, 1, 3, 1, NULL, 3),
(30, 3, 'Cepillo Dental', 1, 3, 2, 1, 1, 1, NULL, 3),
(31, 3, 'Cepillo Dental', 0, 3, 2, 1, 3, 1, NULL, 3),
(32, 2, 'Cuantas Veces Día', 1, 4, 2, 1, 1, 1, NULL, 3),
(33, 3, 'A.T.M.', 1, 1, 1, 1, 1, 1, NULL, 4),
(35, 3, 'Senos Maxilares', 0, 1, 1, 1, 2, 1, NULL, 4),
(36, 3, 'Labios', 1, 2, 1, 1, 1, 1, NULL, 4),
(37, 3, 'Músculos Masticadores', 1, 2, 1, 1, 2, 1, NULL, 4),
(38, 3, 'Lengua', 1, 3, 1, 1, 1, 1, NULL, 4),
(39, 3, 'Ganglios', 1, 3, 1, 1, 2, 1, NULL, 4),
(40, 3, 'Paladar', 1, 4, 1, 1, 1, 1, NULL, 4),
(41, 3, 'Oclusion', 1, 4, 1, 1, 2, 1, NULL, 4),
(42, 3, 'Piso De Boca', 1, 5, 1, 1, 1, 1, NULL, 4),
(43, 3, 'Frenillos', 1, 5, 1, 1, 2, 1, NULL, 4),
(44, 3, 'Carrillos', 1, 6, 1, 1, 1, 1, NULL, 4),
(45, 3, 'Mucosas', 1, 6, 1, 1, 2, 1, NULL, 4),
(46, 3, 'Glándulas Salivares', 1, 7, 1, 1, 1, 1, NULL, 4),
(47, 3, 'Encías', 1, 7, 1, 1, 2, 1, NULL, 4),
(48, 3, 'Maxilares', 1, 8, 1, 1, 1, 1, NULL, 4),
(49, 3, 'Amígdalas', 1, 8, 1, 1, 2, 1, NULL, 4),
(50, 3, 'Supernumerarios', 1, 10, 1, 1, 1, 1, NULL, 4),
(51, 3, 'Maloclusiones', 1, 10, 1, 1, 2, 1, NULL, 4),
(52, 3, 'Abrasión', 1, 11, 1, 1, 1, 1, NULL, 4),
(53, 3, 'Incluidos', 1, 11, 1, 1, 2, 1, NULL, 4),
(54, 3, 'Manchas -Cambios De Color', 1, 12, 1, 1, 1, 1, NULL, 4),
(55, 3, 'Trauma', 1, 12, 1, 1, 2, 1, NULL, 4),
(56, 3, 'Patología Pulpar-Abcesos', 1, 13, 1, 1, 1, 1, NULL, 4),
(57, 3, 'Hábitos', 1, 13, 1, 1, 2, 1, NULL, 4),
(58, 1, 'Observaciones', 0, 14, 1, 3, 1, 1, NULL, 4),
(59, 3, 'Bolsa Movilidad', 1, 14, 1, 1, 2, 1, NULL, 4),
(60, 3, 'Placa Blanda', 1, 15, 1, 1, 2, 1, NULL, 4),
(61, 3, 'Cálculos', 1, 16, 1, 1, 2, 1, NULL, 4),
(62, 3, 'Bolsas Periodontales', 1, 1, 1, 1, 1, 1, NULL, 6),
(63, 1, 'Dientes', 0, 1, 1, 1, 2, 1, NULL, 6),
(64, 3, 'Pseudo Bolsa Periodontales', 1, 2, 1, 1, 1, 1, NULL, 6),
(65, 1, 'Dientes', 0, 2, 1, 1, 2, 1, NULL, 6),
(66, 3, 'Movilidad Dentaria', 1, 3, 1, 1, 1, 1, NULL, 6),
(67, 1, 'Dientes', 1, 3, 1, 1, 2, 1, NULL, 6),
(70, 3, 'Perdida Osea', 1, 4, 1, 1, 1, 1, NULL, 6),
(71, 1, 'Dientes', 0, 4, 1, 1, 2, 1, NULL, 6),
(72, 3, 'Retracciones Gingivales', 1, 5, 1, 1, 1, 1, NULL, 6),
(73, 1, 'Dientes', 0, 5, 1, 1, 2, 1, NULL, 6),
(74, 3, 'Cálculos Supragingivales', 1, 6, 1, 1, 1, 1, NULL, 6),
(75, 1, 'Cuadrantes', 0, 6, 1, 1, 2, 1, NULL, 6),
(76, 3, 'Cálculos Subgingivales', 1, 7, 1, 1, 1, 1, NULL, 6),
(77, 1, 'Cuadrantes', 0, 7, 1, 1, 2, 1, NULL, 6),
(78, 3, 'Indice De Placa Bacteriana', 0, 8, 2, 1, 1, 1, NULL, 6),
(79, 2, '%inicial', 0, 9, 1, 1, 2, 1, NULL, 6),
(80, 2, '%final', 0, 9, 1, 1, 3, 1, NULL, 6),
(81, 3, 'Higiene Oral', 0, 10, 2, 1, 1, 1, NULL, 6),
(82, 5, 'Observaciones', 0, 11, 2, 1, 1, 1, NULL, 6),
(83, 3, 'Endodoncia Defectuosa', 1, 1, 1, 1, 1, 1, NULL, 7),
(84, 1, 'Dientes', 0, 1, 1, 1, 2, 1, NULL, 7),
(85, 3, 'Endodoncias Realizadas', 1, 2, 1, 1, 1, 1, NULL, 7),
(86, 1, 'Dientes', 0, 2, 1, 1, 2, 1, NULL, 7),
(87, 3, 'Dientes Necroticos', 0, 3, 1, 1, 1, 1, NULL, 7),
(88, 1, 'Dientes', 0, 3, 1, 1, 2, 1, NULL, 7),
(89, 3, 'Dientes Con Pulpitis', 0, 4, 1, 1, 1, 1, NULL, 7),
(90, 1, 'Dientes', 0, 4, 1, 1, 2, 1, NULL, 7),
(91, 3, 'Dientes Sensibles', 0, 5, 1, 1, 1, 1, NULL, 7),
(92, 1, 'Dientes', 0, 5, 1, 1, 2, 1, NULL, 7),
(93, 3, 'Lesiones Periapicales', 1, 6, 1, 1, 1, 1, NULL, 7),
(94, 1, 'Dientes', 0, 6, 1, 1, 2, 1, NULL, 7),
(95, 1, 'Observaciones', 0, 7, 2, 1, 1, 1, NULL, 7),
(96, 3, NULL, 0, 1, 1, 1, 1, 1, NULL, 8),
(97, 5, NULL, 0, 2, 1, 1, 1, 1, NULL, 8),
(98, 5, 'Presuntivo', 1, 1, 1, 1, 1, 1, NULL, 9),
(99, 5, 'Definitivo', 1, 1, 1, 1, 2, 1, NULL, 9),
(100, 4, NULL, 0, 1, 1, 1, 1, 1, NULL, 10),
(101, 7, NULL, 0, 2, 1, 1, 1, 1, 'sugerencia', 10),
(102, 8, NULL, 0, 1, 1, 1, 1, 1, 'odontograma', 11),
(103, 7, NULL, 0, 1, 1, 1, 1, 1, 'atencion', 12);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=167 ;

--
-- Volcado de datos para la tabla `PreguntaOpcion`
--

INSERT INTO `PreguntaOpcion` (`opcRtaId`, `orden`, `valorTexto`, `valorNumero`, `opciones`, `enunciado`, `preguntaId`) VALUES
(1, 1, 'si', NULL, '', 'Si', 5),
(2, 2, 'no', NULL, '', 'No', 5),
(3, 3, 'no_sabe', NULL, '', 'No Sabe', 5),
(4, 1, 'si', NULL, NULL, 'Si', 3),
(5, 2, 'no', NULL, NULL, 'No', 3),
(6, 3, 'no_sabe', NULL, NULL, 'No Sabe', 3),
(7, 1, 'si', NULL, NULL, 'Si', 4),
(8, 2, 'no', NULL, NULL, 'No', 4),
(9, 3, 'no_sabe', NULL, NULL, 'No Sabe', 4),
(10, 1, 'si', NULL, '', 'Si', 6),
(11, 2, 'no', NULL, '', 'No', 6),
(12, 3, 'no_sabe', NULL, '', 'No Sabe', 6),
(13, 1, 'si', NULL, '', 'Si', 7),
(14, 2, 'no', NULL, '', 'No', 7),
(15, 3, 'no_sabe', NULL, '', 'No Sabe', 7),
(16, 1, 'si', NULL, '', 'Si', 8),
(17, 2, 'no', NULL, '', 'No', 8),
(18, 3, 'no_sabe', NULL, '', 'No Sabe', 8),
(19, 1, 'si', NULL, '', 'Si', 9),
(20, 2, 'no', NULL, '', 'No', 9),
(21, 3, 'no_sabe', NULL, '', 'No Sabe', 9),
(22, 1, 'si', NULL, '', 'Si', 10),
(23, 2, 'no', NULL, '', 'No', 10),
(24, 3, 'no_sabe', NULL, '', 'No Sabe', 10),
(25, 1, 'si', NULL, '', 'Si', 11),
(26, 2, 'no', NULL, '', 'No', 11),
(27, 3, 'no_sabe', NULL, '', 'No Sabe', 11),
(28, 1, 'si', NULL, '', 'Si', 12),
(29, 2, 'no', NULL, '', 'No', 12),
(30, 3, 'no_sabe', NULL, '', 'No Sabe', 12),
(31, 1, 'si', NULL, '', 'Si', 13),
(32, 2, 'no', NULL, '', 'No', 13),
(33, 3, 'no_sabe', NULL, '', 'No Sabe', 13),
(34, 1, 'si', NULL, '', 'Si', 14),
(35, 2, 'no', NULL, '', 'No', 14),
(36, 3, 'no_sabe', NULL, '', 'No Sabe', 14),
(37, 1, 'si', NULL, '', 'Si', 15),
(38, 2, 'no', NULL, '', 'No', 15),
(39, 3, 'no_sabe', NULL, '', 'No Sabe', 15),
(40, 1, 'si', NULL, '', 'Si', 16),
(41, 2, 'no', NULL, '', 'No', 16),
(42, 3, 'no_sabe', NULL, '', 'No Sabe', 16),
(43, 1, 'si', NULL, '', 'Si', 17),
(44, 2, 'no', NULL, '', 'No', 17),
(45, 3, 'no_sabe', NULL, '', 'No Sabe', 17),
(46, 1, 'si', NULL, '', 'Si', 18),
(47, 2, 'no', NULL, '', 'No', 18),
(48, 3, 'no_sabe', NULL, '', 'No Sabe', 18),
(49, 1, 'si', NULL, '', 'Si', 19),
(50, 2, 'no', NULL, '', 'No', 19),
(51, 3, 'no_sabe', NULL, '', 'No Sabe', 19),
(52, 1, 'si', NULL, '', 'Si', 20),
(53, 2, 'no', NULL, '', 'No', 20),
(54, 3, 'no_sabe', NULL, '', 'No Sabe', 20),
(55, 1, 'buena', NULL, NULL, 'Buena', 28),
(56, 2, 'regular', NULL, NULL, 'Regular', 28),
(57, 3, 'mala', NULL, NULL, 'Mala', 28),
(58, 1, 'si', NULL, NULL, 'Si', 29),
(59, 2, 'no', NULL, NULL, 'No', 29),
(60, 1, 'buena', NULL, NULL, 'Buena', 30),
(61, 2, 'regular', NULL, NULL, 'Regular', 30),
(62, 3, 'mala', NULL, NULL, 'Mala', 30),
(63, 1, 'si', NULL, NULL, 'Si', 31),
(64, 2, 'no', NULL, NULL, 'No', 31),
(65, 1, 'normal', NULL, NULL, 'Normal', 33),
(66, 2, 'anormal', NULL, NULL, 'Anormal', 33),
(70, 1, 'normal', NULL, NULL, 'Normal', 35),
(71, 2, 'anormal', NULL, NULL, 'Anormal', 35),
(72, 1, 'normal', NULL, NULL, 'Normal', 36),
(73, 2, 'anormal', NULL, NULL, 'Anormal', 36),
(74, 1, 'normal', NULL, NULL, 'Normal', 37),
(75, 2, 'anormal', NULL, NULL, 'Anormal', 37),
(76, 1, 'normal', NULL, NULL, 'Normal', 38),
(77, 2, 'anormal', NULL, NULL, 'Anormal', 38),
(78, 1, 'normal', NULL, NULL, 'Normal', 39),
(79, 2, 'anormal', NULL, NULL, 'Anormal', 39),
(80, 1, 'normal', NULL, NULL, 'Normal', 40),
(81, 2, 'anormal', NULL, NULL, 'Anormal', 40),
(82, 1, 'normal', NULL, NULL, 'Normal', 41),
(83, 2, 'anormal', NULL, NULL, 'Anormal', 41),
(84, 1, 'normal', NULL, NULL, 'Normal', 42),
(85, 2, 'anormal', NULL, NULL, 'Anormal', 42),
(86, 1, 'normal', NULL, NULL, 'Normal', 43),
(87, 2, 'anormal', NULL, NULL, 'Anormal', 43),
(88, 1, 'normal', NULL, NULL, 'Normal', 44),
(89, 2, 'anormal', NULL, NULL, 'Anormal', 44),
(90, 1, 'normal', NULL, NULL, 'Normal', 45),
(91, 2, 'anormal', NULL, NULL, 'Anormal', 45),
(92, 1, 'normal', NULL, NULL, 'Normal', 46),
(93, 2, 'anormal', NULL, NULL, 'Anormal', 46),
(94, 1, 'normal', NULL, NULL, 'Normal', 47),
(95, 2, 'anormal', NULL, NULL, 'Anormal', 47),
(96, 1, 'normal', NULL, NULL, 'Normal', 48),
(97, 2, 'anormal', NULL, NULL, 'Anormal', 48),
(98, 1, 'normal', NULL, NULL, 'Normal', 49),
(99, 2, 'anormal', NULL, NULL, 'Anormal', 49),
(100, 1, 'si', NULL, NULL, 'Si', 50),
(101, 2, 'no', NULL, NULL, 'No', 50),
(102, 1, 'si', NULL, NULL, 'Si', 51),
(103, 2, 'no', NULL, NULL, 'No', 51),
(104, 1, 'si', NULL, NULL, 'Si', 52),
(105, 2, 'no', NULL, NULL, 'No', 52),
(106, 1, 'si', NULL, NULL, 'Si', 53),
(107, 2, 'no', NULL, NULL, 'No', 53),
(108, 1, 'si', NULL, NULL, 'Si', 54),
(109, 2, 'no', NULL, NULL, 'No', 54),
(110, 1, 'si', NULL, NULL, 'Si', 55),
(111, 2, 'no', NULL, NULL, 'No', 55),
(112, 1, 'si', NULL, NULL, 'Si', 56),
(113, 2, 'no', NULL, NULL, 'No', 56),
(114, 1, 'si', NULL, NULL, 'Si', 57),
(115, 2, 'no', NULL, NULL, 'No', 57),
(116, 1, 'si', NULL, NULL, 'Si', 59),
(117, 2, 'no', NULL, NULL, 'No', 59),
(118, 1, 'si', NULL, NULL, 'Si', 60),
(119, 2, 'no', NULL, NULL, 'No', 60),
(120, 1, 'si', NULL, NULL, 'Si', 61),
(121, 2, 'no', NULL, NULL, 'No', 61),
(122, 1, 'si', NULL, NULL, 'Si', 62),
(123, 2, 'no', NULL, NULL, 'No', 62),
(124, 1, 'si', NULL, NULL, 'Si', 64),
(125, 2, 'no', NULL, NULL, 'No', 64),
(126, 1, 'si', NULL, NULL, 'Si', 66),
(127, 2, 'no', NULL, NULL, 'No', 66),
(132, 1, 'si', NULL, NULL, 'Si', 70),
(133, 2, 'no', NULL, NULL, 'No', 70),
(134, 1, 'si', NULL, NULL, 'Si', 72),
(135, 2, 'no', NULL, NULL, 'No', 72),
(136, 1, 'si', NULL, NULL, 'Si', 74),
(137, 2, 'no', NULL, NULL, 'No', 74),
(138, 1, 'si', NULL, NULL, 'Si', 76),
(139, 2, 'no', NULL, NULL, 'No', 76),
(140, 1, 'buena', NULL, NULL, 'Buena', 81),
(141, 2, 'regular', NULL, NULL, 'Regular', 81),
(142, 3, 'mala', NULL, NULL, 'Mala', 81),
(143, 1, 'si', NULL, NULL, 'Si', 83),
(144, 2, 'no', NULL, NULL, 'No', 83),
(145, 1, 'si', NULL, NULL, 'Si', 85),
(146, 2, 'no', NULL, NULL, 'No', 85),
(147, 1, 'si', NULL, NULL, 'Si', 87),
(148, 2, 'no', NULL, NULL, 'No', 87),
(149, 1, 'si', NULL, NULL, 'Si', 89),
(150, 2, 'no', NULL, NULL, 'No', 89),
(151, 1, 'si', NULL, NULL, 'Si', 91),
(152, 2, 'no', NULL, NULL, 'No', 91),
(153, 1, 'si', NULL, NULL, 'Si', 93),
(154, 2, 'no', NULL, NULL, 'No', 93),
(155, 1, 'de_tejidos_blandos', NULL, NULL, 'De Tejidos Blandos', 96),
(156, 2, 'de_tejidos_duros', NULL, NULL, 'De Tejidos Duros', 96),
(157, 3, 'endodontico', NULL, NULL, 'Endodontico', 96),
(158, 4, 'periodontal', NULL, NULL, 'Periodontal', 96),
(159, 5, 'oclusion_y_atm', NULL, NULL, 'Oclusión y ATM', 96),
(160, 1, 'operatoria', NULL, NULL, 'Operatoria', 100),
(161, 2, 'ortodoncia', NULL, NULL, 'Ortodoncia', 100),
(162, 3, 'cirugia_oral', NULL, NULL, 'Cirugía Oral', 100),
(163, 4, 'prevencion', NULL, NULL, 'Prevención', 100),
(164, 5, 'periodoncia', NULL, NULL, 'Periodoncia', 100),
(165, 6, 'medicina_oral', NULL, NULL, 'Medicina Oral', 100),
(166, 7, 'endodoncia', NULL, NULL, 'Endodoncia', 100);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Procedimiento`
--

CREATE TABLE IF NOT EXISTS `Procedimiento` (
  `procedimientoId` bigint(20) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`procedimientoId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `TipoPregunta`
--

INSERT INTO `TipoPregunta` (`tipoPreguntaId`, `tipoEntrada`, `descripcion`) VALUES
(1, 3, 'Si, No, No Sabe'),
(2, 3, 'Buena, Regular, Mala'),
(3, 3, 'Si, No'),
(4, 3, 'Normal, Anormal');

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
(1, 'admin', 'admin', 'admin@gmail.com', 'admin@gmail.com', 1, '9c58txvjkeo8wc8o048sk8sg8wkowsg', 'tHfAUQf4lWFfWbXrTdgLGkjfszX6uaUjMu5Kc7OnhGjX6VBA9zBfWmHwqn35VL1yuFuDDPuCEYMBklB51XN9hg==', '2014-11-30 13:58:54', 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:10:"ROLE_ADMIN";}', 0, NULL);

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
