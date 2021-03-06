


--
-- Volcado de datos para la tabla `Convenio`
--

INSERT INTO `Convenio` (`convenioId`, `nombreConvenio`, `activo`) VALUES
(1, 'PARTICULAR', 1),
(2, 'PREVIRED', 1);

--
-- Volcado de datos para la tabla `CostoProcedimiento`
--

INSERT INTO `CostoProcedimiento` (`costoProcedimientoId`, `valor`, `procedimientoId`, `convenioId`) VALUES
(1, 30000, 2, 1),
(2, 15000, 3, 1),
(3, 15000, 4, 1),
(4, 100000, 5, 1),
(5, 30000, 6, 1),
(6, 35000, 7, 1),
(7, 270000, 8, 1),
(8, 1800000, 9, 1),
(9, 1000000, 10, 1),
(10, 1500000, 11, 1),
(11, 2000000, 12, 1),
(12, 800000, 13, 1),
(13, 600000, 14, 1),
(14, 450000, 15, 1),
(15, 1290000, 16, 1),
(16, 150000, 17, 1),
(17, 200000, 18, 1),
(18, 210000, 19, 1),
(19, 135000, 20, 1),
(20, 140000, 21, 1),
(21, 180000, 22, 1),
(22, 900000, 23, 1),
(23, 1000000, 24, 1),
(24, 500000, 25, 1),
(25, 700000, 26, 1),
(26, 100000, 27, 1),
(27, 56000, 28, 1),
(28, 70000, 29, 1),
(29, 130000, 30, 1),
(30, 100000, 31, 1),
(31, 50000, 32, 1),
(32, 65000, 33, 1),
(33, 80000, 34, 1),
(34, 90000, 35, 1),
(35, 80000, 36, 1),
(36, 185000, 37, 1),
(37, 145000, 38, 1),
(38, 60000, 39, 1),
(39, 90000, 40, 1),
(40, 100000, 41, 1),
(41, 180000, 42, 1),
(42, 50000, 43, 1),
(43, 70000, 44, 1),
(44, 90000, 45, 1),
(45, 100000, 46, 1),
(46, 20000, 2, 2),
(47, 8000, 3, 2),
(48, 7000, 4, 2),
(49, 60000, 5, 2),
(50, 20000, 6, 2),
(51, 25000, 7, 2),
(52, 160000, 8, 2),
(53, 1400000, 9, 2),
(54, 800000, 10, 2),
(55, 1300000, 11, 2),
(56, 1800000, 12, 2),
(57, 700000, 13, 2),
(58, 450000, 14, 2),
(59, 350000, 15, 2),
(60, 900000, 16, 2),
(61, 120000, 17, 2),
(62, 140000, 18, 2),
(63, 150000, 19, 2),
(64, 95000, 20, 2),
(65, 100000, 21, 2),
(66, 150000, 22, 2),
(67, 650000, 23, 2),
(68, 800000, 24, 2),
(69, 350000, 25, 2),
(70, 500000, 26, 2),
(71, 80000, 27, 2),
(72, 40000, 28, 2),
(73, 50000, 29, 2),
(74, 100000, 30, 2),
(75, 80000, 31, 2),
(76, 30000, 32, 2),
(77, 40000, 33, 2),
(78, 55000, 34, 2),
(79, 65000, 35, 2),
(80, 55000, 36, 2),
(81, 130000, 37, 2),
(82, 100000, 38, 2),
(83, 40000, 39, 2),
(84, 70000, 40, 2),
(85, 70000, 41, 2),
(86, 100000, 42, 2),
(87, 20000, 43, 2),
(88, 50000, 44, 2),
(89, 70000, 45, 2),
(90, 90000, 46, 2);

--
-- Volcado de datos para la tabla `Disponibilidad`
--

INSERT INTO `Disponibilidad` (`disponibilidadId`, `diasSemena`, `fechaDesde`, `fechaHasta`, `horaInicio`, `horaFin`, `medicoId`) VALUES
(4, 30030, '2015-02-01 00:00:00', '2015-02-28 00:00:00', '1900-01-01 08:00:00', '1900-01-01 12:00:00', 1),
(5, 2310, '2015-02-01 00:00:00', '2015-02-28 00:00:00', '1900-01-01 14:00:00', '1900-01-01 18:00:00', 1),
(6, 30030, '2015-02-01 00:00:00', '2015-02-28 00:00:00', '1900-01-01 08:00:00', '1900-01-01 12:00:00', 2),
(8, 2310, '2015-02-01 00:00:00', '2015-02-28 00:00:00', '1900-01-01 14:00:00', '1900-01-01 18:00:00', 2),
(9, 2310, '2015-02-01 00:00:00', '2015-02-28 00:00:00', '1900-01-01 09:00:00', '1900-01-01 12:00:00', 3),
(10, 13, '2015-02-01 00:00:00', '2015-02-28 00:00:00', '1900-01-01 08:00:00', '1900-01-01 12:00:00', 3),
(12, 2310, '2015-02-01 00:00:00', '2015-02-28 00:00:00', '1900-01-01 14:00:00', '1900-01-01 19:00:00', 3);
--
-- Volcado de datos para la tabla `Grupo`
--

INSERT INTO `Grupo` (`grupoId`, `titulo`, `orden`, `activo`) VALUES
(1, 'Motivo De Consulta', 2, 1),
(2, 'Anamnesis', 3, 1),
(4, 'Exámen Esomatognático', 5, 1),
(5, 'Odontograma', 6, 1),
(6, 'Exámen Periodontal', 7, 1),
(7, 'Exámen Endodóntico', 8, 1),
(8, 'Diagnóstico', 9, 1),
(9, 'Diagnóstico y Pronóstico', 10, 1),
(10, 'Plan De Tratamiento', 11, 1),
(11, 'Evolución Del Tratamiento (Odontograma)', 12, 1),
(12, 'Historial', 13, 1);

--
-- Volcado de datos para la tabla `HistoriaClinica`
--

INSERT INTO `HistoriaClinica` (`historiaClinicaId`, `pacienteId`) VALUES
(1, 1);

--
-- Volcado de datos para la tabla `ItemOdontograma`
--

INSERT INTO `ItemOdontograma` (`itemOdontogramaId`, `noCuadrante`, `noDiente`, `noFila`, `odontogramaId`) VALUES
(1, 1, 1, 1, 1),
(2, 1, 2, 1, 1),
(3, 1, 3, 1, 1),
(4, 1, 4, 1, 1),
(5, 1, 5, 1, 1),
(6, 1, 6, 1, 1),
(7, 1, 7, 1, 1),
(8, 1, 8, 1, 1),
(9, 2, 1, 1, 1),
(10, 2, 2, 1, 1),
(11, 2, 3, 1, 1),
(12, 2, 4, 1, 1),
(13, 2, 5, 1, 1),
(14, 2, 6, 1, 1),
(15, 2, 7, 1, 1),
(16, 2, 8, 1, 1),
(17, 1, 1, 2, 1),
(18, 1, 2, 2, 1),
(19, 1, 3, 2, 1),
(20, 1, 4, 2, 1),
(21, 1, 5, 2, 1),
(22, 1, 6, 2, 1),
(23, 1, 7, 2, 1),
(24, 1, 8, 2, 1),
(25, 2, 1, 2, 1),
(26, 2, 2, 2, 1),
(27, 2, 3, 2, 1),
(28, 2, 4, 2, 1),
(29, 2, 5, 2, 1),
(30, 2, 6, 2, 1),
(31, 2, 7, 2, 1),
(32, 2, 8, 2, 1),
(33, 3, 1, 3, 1),
(34, 3, 2, 3, 1),
(35, 3, 3, 3, 1),
(36, 3, 4, 3, 1),
(37, 3, 5, 3, 1),
(38, 3, 6, 3, 1),
(39, 3, 7, 3, 1),
(40, 3, 8, 3, 1),
(41, 4, 1, 3, 1),
(42, 4, 2, 3, 1),
(43, 4, 3, 3, 1),
(44, 4, 4, 3, 1),
(45, 4, 5, 3, 1),
(46, 4, 6, 3, 1),
(47, 4, 7, 3, 1),
(48, 4, 8, 3, 1),
(49, 3, 1, 4, 1),
(50, 3, 2, 4, 1),
(51, 3, 3, 4, 1),
(52, 3, 4, 4, 1),
(53, 3, 5, 4, 1),
(54, 3, 6, 4, 1),
(55, 3, 7, 4, 1),
(56, 3, 8, 4, 1),
(57, 4, 1, 4, 1),
(58, 4, 2, 4, 1),
(59, 4, 3, 4, 1),
(60, 4, 4, 4, 1),
(61, 4, 5, 4, 1),
(62, 4, 6, 4, 1),
(63, 4, 7, 4, 1),
(64, 4, 8, 4, 1),
(65, 1, 1, 1, 2),
(66, 1, 2, 1, 2),
(67, 1, 3, 1, 2),
(68, 1, 4, 1, 2),
(69, 1, 5, 1, 2),
(70, 1, 6, 1, 2),
(71, 1, 7, 1, 2),
(72, 1, 8, 1, 2),
(73, 2, 1, 1, 2),
(74, 2, 2, 1, 2),
(75, 2, 3, 1, 2),
(76, 2, 4, 1, 2),
(77, 2, 5, 1, 2),
(78, 2, 6, 1, 2),
(79, 2, 7, 1, 2),
(80, 2, 8, 1, 2),
(81, 1, 1, 2, 2),
(82, 1, 2, 2, 2),
(83, 1, 3, 2, 2),
(84, 1, 4, 2, 2),
(85, 1, 5, 2, 2),
(86, 1, 6, 2, 2),
(87, 1, 7, 2, 2),
(88, 1, 8, 2, 2),
(89, 2, 1, 2, 2),
(90, 2, 2, 2, 2),
(91, 2, 3, 2, 2),
(92, 2, 4, 2, 2),
(93, 2, 5, 2, 2),
(94, 2, 6, 2, 2),
(95, 2, 7, 2, 2),
(96, 2, 8, 2, 2),
(97, 3, 1, 3, 2),
(98, 3, 2, 3, 2),
(99, 3, 3, 3, 2),
(100, 3, 4, 3, 2),
(101, 3, 5, 3, 2),
(102, 3, 6, 3, 2),
(103, 3, 7, 3, 2),
(104, 3, 8, 3, 2),
(105, 4, 1, 3, 2),
(106, 4, 2, 3, 2),
(107, 4, 3, 3, 2),
(108, 4, 4, 3, 2),
(109, 4, 5, 3, 2),
(110, 4, 6, 3, 2),
(111, 4, 7, 3, 2),
(112, 4, 8, 3, 2),
(113, 3, 1, 4, 2),
(114, 3, 2, 4, 2),
(115, 3, 3, 4, 2),
(116, 3, 4, 4, 2),
(117, 3, 5, 4, 2),
(118, 3, 6, 4, 2),
(119, 3, 7, 4, 2),
(120, 3, 8, 4, 2),
(121, 4, 1, 4, 2),
(122, 4, 2, 4, 2),
(123, 4, 3, 4, 2),
(124, 4, 4, 4, 2),
(125, 4, 5, 4, 2),
(126, 4, 6, 4, 2),
(127, 4, 7, 4, 2),
(128, 4, 8, 4, 2);

--
-- Volcado de datos para la tabla `Medico`
--

INSERT INTO `Medico` (`usuario_id`, `medicoId`, `nombreCompleto`, `titulosEspecialidad`, `pathFirma`) VALUES
(9, 1, 'ROSALBA YAZMIN REALPE ORTEGA', 'Odontologa General', '1-Dra Yazmin realpe.jpg'),
(8, 2, 'NICOLE VIVIANA LUNA MUÑOZ', 'Odontologa General', '2-Dra Nicole.jpg'),
(NULL, 3, 'YENNY MERCEDES ORDOÑEZ PATIÑO', 'Odontologa General', '-images.png'),
(NULL, 4, 'BEATRIZ CAROLINA ARTEAGA CHAMORRO', 'Periodoncista', '4-DRA CAROLINA.jpg'),
(NULL, 5, 'JUAN CARLOS VELASCO CASTRO', 'Endodoncista', '-images.png'),
(NULL, 6, 'VERONICA MADROÑERO GORDILLO', 'Ortodoncista', '-images.png'),
(NULL, 7, 'ANGELICA MARIA ASTAIZA MAZABUEL', 'Odontopediatra', '-images.png'),
(NULL, 8, 'ANGELICA PABON', 'Odontopediatra', '-images.png'),
(10, 9, 'TATIANA KARINA GUERRERO FIGUEROA', 'Odontologo general', '9-Dra Tatiana.jpg');

--
-- Volcado de datos para la tabla `Odontograma`
--

INSERT INTO `Odontograma` (`odontogramaId`, `descripcion`, `grupoId`, `activo`) VALUES
(1, 'Odontograma', 5, 1),
(2, 'Evolución Del Tratamiento (Odontograma)', 11, 1);

--
-- Volcado de datos para la tabla `OpcionRespuesta`
--

INSERT INTO `OpcionRespuesta` (`opcRtaId`, `orden`, `valorTexto`, `valorNumero`, `opciones`, `enunciado`, `tipoPreguntaId`, `defecto`) VALUES
(1, 1, 'si', NULL, NULL, 'Si', 1, 0),
(2, 2, 'no', NULL, '', 'No', 1, 1),
(3, 3, 'no_sabe', NULL, NULL, 'No Sabe', 1, 0),
(4, 1, 'buena', NULL, NULL, 'Buena', 2, 1),
(5, 2, 'regular', NULL, NULL, 'Regular', 2, 0),
(6, 3, 'mala', NULL, NULL, 'Mala', 2, 0),
(7, 1, 'si', NULL, NULL, 'Si', 3, 0),
(8, 2, 'no', NULL, NULL, 'No', 3, 1),
(9, 1, 'normal', NULL, NULL, 'Normal', 4, 1),
(10, 2, 'anormal', NULL, NULL, 'Anormal', 4, 1);

--
-- Volcado de datos para la tabla `Paciente`
--

INSERT INTO `Paciente` (`pacienteId`, `apellido1`, `apellido2`, `nombres`, `fechaNacimiento`, `lugarNacimiento`, `tipoIdentificacion`, `noIdentificacion`, `email`, `estadoCivil`, `sexo`, `ocupacion`, `empresa`, `cargo`, `EPS`, `cotizanteBeneficiario`, `responNombreCompleto`, `responNoIdentificacion`, `responParentesco`, `residenciaMunicipio`, `residenciaDepartamento`, `residenciaDireccion`, `residenciaTelefono`, `trabajoMunicipio`, `trabajoDepartamento`, `trabajoDireccion`, `trabajoTelefono`, `responUbicacionDepartamento`, `responUbicacionMunicipio`, `responUbicacionDireccion`, `responUbicacionTelefono`, `convenioId`, `activo`) VALUES
(1, 'TASCO', 'MUÑOZ', 'JOSE MAURICIO', '1982-01-13 00:00:00', 'La cruz Nariño', 0, '13072421', 'gustavoju9@hotmail.com', 2, 1, 'Independiente', '----', 'Arquitecto', 'saludcoop', 1, 'Gustavo Tasco Jimenez', '5579929', 'Padre', 'Popayan', 'Cauca', 'Carrera 6 Nro 15N-10', '3108382065', 'Popayan', 'Cauca', '---------------', '--------', 'Cauca', 'Popayán', 'Carrera 6 Nro 15N-10', '3117431323', 2, 1);

--
-- Volcado de datos para la tabla `Pregunta`
--

INSERT INTO `Pregunta` (`preguntaId`, `tipoEntrada`, `enunciado`, `obligatoria`, `orden`, `colspan`, `rowspan`, `noColumna`, `estaActiva`, `opciones`, `grupoId`) VALUES
(1, 8, NULL, 0, 1, 1, 1, 1, 1, 'odontograma', 5),
(2, 5, NULL, 1, 1, 1, 1, 1, 1, 'width: 1000px;', 1),
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
(21, 5, 'Observaciones', 0, 10, 2, 1, 1, 1, 'width: 980px;', 2),
(22, 9, 'Última Visita Al Odontólogo', 0, 11, 1, 1, 1, 1, NULL, 2),
(23, 1, 'Motivo', 0, 11, 1, 1, 5, 1, NULL, 2),
(24, 2, 'Temperatura', 1, 12, 1, 1, 1, 1, NULL, 2),
(25, 2, 'Pulso', 1, 12, 1, 1, 2, 1, NULL, 2),
(26, 2, 'Tensión', 1, 13, 1, 1, 3, 1, NULL, 2),
(27, 2, 'Respiración', 1, 13, 1, 1, 4, 1, NULL, 2),
(30, 3, 'Cepillo Dental', 1, 11, 1, 1, 2, 1, NULL, 6),
(32, 2, 'Cuantas Veces Día', 1, 11, 2, 1, 3, 1, NULL, 6),
(33, 3, 'A.T.M.', 1, 1, 1, 1, 1, 1, NULL, 4),
(34, 7, NULL, 0, 1, 1, 1, 1, 1, 'atencion', 12),
(36, 3, 'Labios', 1, 1, 1, 1, 1, 1, NULL, 4),
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
(58, 5, 'Observaciones', 0, 16, 2, 1, 1, 1, 'width: 980px;', 4),
(62, 3, 'Bolsas Periodontales', 1, 1, 1, 1, 1, 1, NULL, 6),
(63, 1, 'Dientes', 0, 1, 1, 1, 2, 1, NULL, 6),
(64, 3, 'Pseudo Bolsa Periodontales', 1, 2, 1, 1, 1, 1, NULL, 6),
(65, 1, 'Dientes', 0, 2, 1, 1, 2, 1, NULL, 6),
(66, 3, 'Movilidad Dentaria', 1, 3, 1, 1, 1, 1, NULL, 6),
(67, 1, 'Dientes', 1, 3, 1, 1, 2, 1, NULL, 6),
(68, 8, NULL, 0, 1, 1, 1, 1, 1, 'odontograma', 11),
(69, 7, NULL, 0, 2, 1, 1, 1, 1, 'sugerencia', 10),
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
(82, 5, 'Observaciones', 0, 13, 2, 1, 1, 1, 'width: 980px;', 6),
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
(95, 5, 'Observaciones', 0, 7, 2, 1, 1, 1, 'width: 980px;', 7),
(96, 3, NULL, 0, 1, 1, 1, 1, 1, NULL, 8),
(97, 5, NULL, 0, 2, 1, 1, 1, 1, 'width: 1000px;', 8),
(98, 5, 'Presuntivo', 1, 1, 1, 1, 1, 1, NULL, 9),
(99, 5, 'Definitivo', 1, 1, 1, 1, 2, 1, NULL, 9),
(100, 4, NULL, 0, 1, 1, 1, 1, 1, NULL, 10),
(101, 3, 'Caries Dental', 0, 14, 1, 1, 1, 1, NULL, 4),
(102, 3, 'Facetas de Desgaste', 0, 14, 1, 1, 2, 1, NULL, 4),
(103, 3, 'Cuellos Expuestos', 0, 15, 1, 1, 1, 1, NULL, 4);


--
-- Volcado de datos para la tabla `PreguntaOpcion`
--

INSERT INTO `PreguntaOpcion` (`opcRtaId`, `orden`, `valorTexto`, `valorNumero`, `opciones`, `enunciado`, `preguntaId`, `defecto`) VALUES
(1, 1, 'si', NULL, '', 'Si', 5, 0),
(2, 2, 'no', NULL, '', 'No', 5, 1),
(3, 3, 'no_sabe', NULL, '', 'No Sabe', 5, 0),
(4, 1, 'si', NULL, NULL, 'Si', 3, 0),
(5, 2, 'no', NULL, NULL, 'No', 3, 1),
(6, 3, 'no_sabe', NULL, NULL, 'No Sabe', 3, 0),
(7, 1, 'si', NULL, NULL, 'Si', 4, 0),
(8, 2, 'no', NULL, NULL, 'No', 4, 1),
(9, 3, 'no_sabe', NULL, NULL, 'No Sabe', 4, 0),
(10, 1, 'si', NULL, '', 'Si', 6, 0),
(11, 2, 'no', NULL, '', 'No', 6, 1),
(12, 3, 'no_sabe', NULL, '', 'No Sabe', 6, 0),
(13, 1, 'si', NULL, '', 'Si', 7, 0),
(14, 2, 'no', NULL, '', 'No', 7, 1),
(15, 3, 'no_sabe', NULL, '', 'No Sabe', 7, 0),
(16, 1, 'si', NULL, '', 'Si', 8, 0),
(17, 2, 'no', NULL, '', 'No', 8, 1),
(18, 3, 'no_sabe', NULL, '', 'No Sabe', 8, 0),
(19, 1, 'si', NULL, '', 'Si', 9, 0),
(20, 2, 'no', NULL, '', 'No', 9, 1),
(21, 3, 'no_sabe', NULL, '', 'No Sabe', 9, 0),
(22, 1, 'si', NULL, '', 'Si', 10, 0),
(23, 2, 'no', NULL, '', 'No', 10, 1),
(24, 3, 'no_sabe', NULL, '', 'No Sabe', 10, 0),
(25, 1, 'si', NULL, '', 'Si', 11, 0),
(26, 2, 'no', NULL, '', 'No', 11, 1),
(27, 3, 'no_sabe', NULL, '', 'No Sabe', 11, 0),
(28, 1, 'si', NULL, '', 'Si', 12, 0),
(29, 2, 'no', NULL, '', 'No', 12, 1),
(30, 3, 'no_sabe', NULL, '', 'No Sabe', 12, 0),
(31, 1, 'si', NULL, '', 'Si', 13, 0),
(32, 2, 'no', NULL, '', 'No', 13, 1),
(33, 3, 'no_sabe', NULL, '', 'No Sabe', 13, 0),
(34, 1, 'si', NULL, '', 'Si', 14, 0),
(35, 2, 'no', NULL, '', 'No', 14, 1),
(36, 3, 'no_sabe', NULL, '', 'No Sabe', 14, 0),
(37, 1, 'si', NULL, '', 'Si', 15, 0),
(38, 2, 'no', NULL, '', 'No', 15, 1),
(39, 3, 'no_sabe', NULL, '', 'No Sabe', 15, 0),
(40, 1, 'si', NULL, '', 'Si', 16, 0),
(41, 2, 'no', NULL, '', 'No', 16, 1),
(42, 3, 'no_sabe', NULL, '', 'No Sabe', 16, 0),
(43, 1, 'si', NULL, '', 'Si', 17, 0),
(44, 2, 'no', NULL, '', 'No', 17, 1),
(45, 3, 'no_sabe', NULL, '', 'No Sabe', 17, 0),
(46, 1, 'si', NULL, '', 'Si', 18, 0),
(47, 2, 'no', NULL, '', 'No', 18, 1),
(48, 3, 'no_sabe', NULL, '', 'No Sabe', 18, 0),
(49, 1, 'si', NULL, '', 'Si', 19, 0),
(50, 2, 'no', NULL, '', 'No', 19, 1),
(51, 3, 'no_sabe', NULL, '', 'No Sabe', 19, 0),
(52, 1, 'si', NULL, '', 'Si', 20, 0),
(53, 2, 'no', NULL, '', 'No', 20, 1),
(54, 3, 'no_sabe', NULL, '', 'No Sabe', 20, 0),
(60, 1, 'buena', NULL, NULL, 'Buena', 30, 1),
(61, 2, 'regular', NULL, NULL, 'Regular', 30, 0),
(62, 3, 'mala', NULL, NULL, 'Mala', 30, 0),
(65, 1, 'normal', NULL, NULL, 'Normal', 33, 1),
(66, 2, 'anormal', NULL, NULL, 'Anormal', 33, 0),
(72, 1, 'normal', NULL, NULL, 'Normal', 36, 1),
(73, 2, 'anormal', NULL, NULL, 'Anormal', 36, 0),
(76, 1, 'normal', NULL, NULL, 'Normal', 38, 1),
(77, 2, 'anormal', NULL, NULL, 'Anormal', 38, 0),
(78, 1, 'normal', NULL, NULL, 'Normal', 39, 1),
(79, 2, 'anormal', NULL, NULL, 'Anormal', 39, 0),
(80, 1, 'normal', NULL, NULL, 'Normal', 40, 1),
(81, 2, 'anormal', NULL, NULL, 'Anormal', 40, 0),
(82, 1, 'normal', NULL, NULL, 'Normal', 41, 1),
(83, 2, 'anormal', NULL, NULL, 'Anormal', 41, 0),
(84, 1, 'normal', NULL, NULL, 'Normal', 42, 1),
(85, 2, 'anormal', NULL, NULL, 'Anormal', 42, 0),
(86, 1, 'normal', NULL, NULL, 'Normal', 43, 1),
(87, 2, 'anormal', NULL, NULL, 'Anormal', 43, 0),
(88, 1, 'normal', NULL, NULL, 'Normal', 44, 1),
(89, 2, 'anormal', NULL, NULL, 'Anormal', 44, 0),
(90, 1, 'normal', NULL, NULL, 'Normal', 45, 1),
(91, 2, 'anormal', NULL, NULL, 'Anormal', 45, 0),
(92, 1, 'normal', NULL, NULL, 'Normal', 46, 1),
(93, 2, 'anormal', NULL, NULL, 'Anormal', 46, 0),
(94, 1, 'normal', NULL, NULL, 'Normal', 47, 1),
(95, 2, 'anormal', NULL, NULL, 'Anormal', 47, 0),
(96, 1, 'normal', NULL, NULL, 'Normal', 48, 1),
(97, 2, 'anormal', NULL, NULL, 'Anormal', 48, 0),
(98, 1, 'normal', NULL, NULL, 'Normal', 49, 1),
(99, 2, 'anormal', NULL, NULL, 'Anormal', 49, 0),
(100, 1, 'si', NULL, NULL, 'Si', 50, 0),
(101, 2, 'no', NULL, NULL, 'No', 50, 1),
(102, 1, 'si', NULL, NULL, 'Si', 51, 0),
(103, 2, 'no', NULL, NULL, 'No', 51, 1),
(104, 1, 'si', NULL, NULL, 'Si', 52, 0),
(105, 2, 'no', NULL, NULL, 'No', 52, 1),
(106, 1, 'si', NULL, NULL, 'Si', 53, 0),
(107, 2, 'no', NULL, NULL, 'No', 53, 1),
(108, 1, 'si', NULL, NULL, 'Si', 54, 0),
(109, 2, 'no', NULL, NULL, 'No', 54, 1),
(110, 1, 'si', NULL, NULL, 'Si', 55, 0),
(111, 2, 'no', NULL, NULL, 'No', 55, 1),
(112, 1, 'si', NULL, NULL, 'Si', 56, 0),
(113, 2, 'no', NULL, NULL, 'No', 56, 1),
(114, 1, 'si', NULL, NULL, 'Si', 57, 0),
(115, 2, 'no', NULL, NULL, 'No', 57, 1),
(122, 1, 'si', NULL, NULL, 'Si', 62, 0),
(123, 2, 'no', NULL, NULL, 'No', 62, 1),
(124, 1, 'si', NULL, NULL, 'Si', 64, 0),
(125, 2, 'no', NULL, NULL, 'No', 64, 1),
(126, 1, 'si', NULL, NULL, 'Si', 66, 0),
(127, 2, 'no', NULL, NULL, 'No', 66, 1),
(132, 1, 'si', NULL, NULL, 'Si', 70, 0),
(133, 2, 'no', NULL, NULL, 'No', 70, 1),
(134, 1, 'si', NULL, NULL, 'Si', 72, 0),
(135, 2, 'no', NULL, NULL, 'No', 72, 1),
(136, 1, 'si', NULL, NULL, 'Si', 74, 0),
(137, 2, 'no', NULL, NULL, 'No', 74, 1),
(138, 1, 'si', NULL, NULL, 'Si', 76, 0),
(139, 2, 'no', NULL, NULL, 'No', 76, 1),
(140, 1, 'buena', NULL, NULL, 'Buena', 81, 1),
(141, 2, 'regular', NULL, NULL, 'Regular', 81, 0),
(142, 3, 'mala', NULL, NULL, 'Mala', 81, 0),
(143, 1, 'si', NULL, NULL, 'Si', 83, 0),
(144, 2, 'no', NULL, NULL, 'No', 83, 1),
(145, 1, 'si', NULL, NULL, 'Si', 85, 0),
(146, 2, 'no', NULL, NULL, 'No', 85, 1),
(147, 1, 'si', NULL, NULL, 'Si', 87, 0),
(148, 2, 'no', NULL, NULL, 'No', 87, 1),
(149, 1, 'si', NULL, NULL, 'Si', 89, 0),
(150, 2, 'no', NULL, NULL, 'No', 89, 1),
(151, 1, 'si', NULL, NULL, 'Si', 91, 0),
(152, 2, 'no', NULL, NULL, 'No', 91, 1),
(153, 1, 'si', NULL, NULL, 'Si', 93, 0),
(154, 2, 'no', NULL, NULL, 'No', 93, 1),
(155, 1, 'de_tejidos_blandos', NULL, NULL, 'De Tejidos Blandos', 96, 0),
(156, 2, 'de_tejidos_duros', NULL, NULL, 'De Tejidos Duros', 96, 0),
(157, 3, 'endodontico', NULL, NULL, 'Endodontico', 96, 0),
(158, 4, 'periodontal', NULL, NULL, 'Periodontal', 96, 0),
(159, 5, 'oclusion_y_atm', NULL, NULL, 'Oclusión y ATM', 96, 0),
(160, 1, 'operatoria', NULL, NULL, 'Operatoria', 100, 0),
(161, 2, 'ortodoncia', NULL, NULL, 'Ortodoncia', 100, 0),
(162, 3, 'cirugia_oral', NULL, NULL, 'Cirugía Oral', 100, 0),
(163, 4, 'prevencion', NULL, NULL, 'Prevención', 100, 0),
(164, 5, 'periodoncia', NULL, NULL, 'Periodoncia', 100, 0),
(165, 6, 'medicina_oral', NULL, NULL, 'Medicina Oral', 100, 0),
(166, 7, 'endodoncia', NULL, NULL, 'Endodoncia', 100, 0),
(167, 1, 'si', NULL, NULL, 'Si', 101, 0),
(168, 2, 'no', NULL, NULL, 'No', 101, 1),
(169, 1, 'si', NULL, NULL, 'Si', 102, 0),
(170, 2, 'no', NULL, NULL, 'No', 102, 1),
(171, 1, 'si', NULL, NULL, 'Si', 103, 0),
(172, 2, 'no', NULL, NULL, 'No', 103, 1);

--
-- Volcado de datos para la tabla `Procedimiento`
--

INSERT INTO `Procedimiento` (`procedimientoId`, `descripcion`, `activo`, `codigo`) VALUES
(2, 'PROFILAXIS DENTAL', 1, '997500'),
(3, 'SELLANTES DE FOTOCURADO', 1, '997102'),
(4, 'APLICACION DE FLUOR EN GEL', 1, '997103'),
(5, 'DETARTRAGE SUPRAGINGIVAL', 1, '997300'),
(6, 'RECEMENTACION DE CORONA', 1, '234104-5'),
(7, 'DRENAJE DE DE ABSCESO INTRAORAL', 1, '270101'),
(8, 'BLANQUEAMIENTO DENTAL', 1, '237901'),
(9, 'IMPLANTE DENTAL', 1, '236300'),
(10, 'REHABILITACIÓN IMPLANTE DENTAL', 1, '236300-1'),
(11, 'REHABILITACIÓN IMPLANTE DENTAL CORONA METAL PORCELANA', 1, '236300-2'),
(12, 'REHABILITACIÓN IMPLANTE DENTAL CORONA EN CIRCONIO', 1, '236300-3'),
(13, 'CORONA INCERAM COLOCACIÓN', 1, '234104-1'),
(14, 'CORONA COLLAR LESS COLOCACIÓN', 1, '234104-2'),
(15, 'CORONA METAL PORCELANA COLOCACIÓN', 1, '234104-3'),
(16, 'CORONA CIRCONIO COLOCACIÓN', 1, '234104-4'),
(17, 'NÚCLEO METÁLICO UNIRRADICULAR', 1, '234203-1'),
(18, 'NÚCLEO METÁLICO BIRRADICULAR', 1, '234203-2'),
(19, 'NÚCLEO METÁLICO MULTIRADICULAR', 1, '234203-3'),
(20, 'ENDOPOSTE COLOCACIÓN', 1, '234203-4'),
(21, 'CORONA TEMPORAL AUTOCURADO', 1, '234104-6'),
(22, 'CORONA TEMPORAL TERMOCURADO', 1, '234104-7'),
(23, 'PRÓTESIS REMOVIBLE TOTAL CREATION', 1, '234301-1'),
(24, 'PRÓTESIS REMOVIBLE TOTAL FLEXIDENT', 1, '234301-2'),
(25, 'PRÓTESIS REMOVIBLE PARCIAL CREATION', 1, '234301-11'),
(26, 'PRÓTESIS REMOVIBLE PARCIAL FLEXIDENT', 1, '234301-21'),
(27, 'REPARACIÓN DE PRÓTESIS', 1, '234303'),
(28, 'REPARACIÓN DE DIENTES ACRÍLICOS ANTERIORES', 1, '234303-1'),
(29, 'REPARACIÓN DE DIENTES ACRÍLICOS POSTERIORES', 1, '234303-2'),
(30, 'RETENEDOR COLOCACIÓN', 1, '247300'),
(31, 'PLACA NEURO MIORELAJANTE', 1, '247300-1'),
(32, 'RESINA DE UNA SUPERFICIE', 1, '232102-1'),
(33, 'RESINA DE DOS SUPERFICIES', 1, '232102-2'),
(34, 'RESINA DE TRES SUPERFICIES', 1, '232102-3'),
(35, 'RESINA DE CUATRO SUPERFICIES SIN GARANTIA', 1, '232102-4'),
(36, 'RESINA PROFUNDA', 1, '232102-5'),
(37, 'CARILLA EN RESINA DE ALTA ESTETICA', 1, '232102-6'),
(38, 'CARILLA EN RESINA', 1, '232102-7'),
(39, 'EXODONCIA DE DIENTE PERMANENTE', 1, '230100'),
(40, 'EXODONCIA QUIRURGICA', 1, '231100'),
(41, 'EXODONCIA CORDAL', 1, '231200'),
(42, 'EXODONCIA CORDAL INCLCUIDO', 1, '231300'),
(43, 'EXODONCIA DE DIENTE TEMPORAL', 1, '230200'),
(44, 'EXODONCIA RESTO RADICULAR ANTERIOR', 1, '230100-1'),
(45, 'EXODONCIA RESTO RADICULAR POSTERIOR', 1, '230100-2'),
(46, 'OPERCULECTOMIA', 1, '240100');

--
-- Volcado de datos para la tabla `TipoPregunta`
--

INSERT INTO `TipoPregunta` (`tipoPreguntaId`, `tipoEntrada`, `descripcion`) VALUES
(1, 3, 'Si, No, No Sabe'),
(2, 3, 'Buena, Regular, Mala'),
(3, 3, 'Si, No'),
(4, 3, 'Normal, Anormal');

--
-- Volcado de datos para la tabla `UnidadAtencion`
--

INSERT INTO `UnidadAtencion` (`unidadAtencionId`, `descripcion`) VALUES
(1, 'Unidad 1 Consultorio 1'),
(2, 'Unidad 2 Consultorio 2'),
(3, 'Unidad 3 Consultorio 3'),
(4, 'Unidad 4 Consultorio 4');

--
-- Volcado de datos para la tabla `Usuario`
--

INSERT INTO `Usuario` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `locked`, `expired`, `expires_at`, `confirmation_token`, `password_requested_at`, `roles`, `credentials_expired`, `credentials_expire_at`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', 'admin@gmail.com', 1, '9c58txvjkeo8wc8o048sk8sg8wkowsg', 'tHfAUQf4lWFfWbXrTdgLGkjfszX6uaUjMu5Kc7OnhGjX6VBA9zBfWmHwqn35VL1yuFuDDPuCEYMBklB51XN9hg==', '2015-03-08 10:54:03', 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:10:"ROLE_ADMIN";}', 0, NULL),
(2, 'admin2', 'admin2', 'admin2@ejemplo.com', 'admin2@ejemplo.com', 1, 'jpk2iiy08cgwgksksgowggoows4gs0k', 'mXEabcgY6OO1db23wT7eRul9vIXCgPgyVNM1CGCRWyLAMpR54LWz6DgjVtDqdvAG1WzZOQxdiIDn+OrDvvOdqQ==', '2015-01-15 05:15:33', 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:10:"ROLE_ADMIN";}', 0, NULL),
(3, 'rrealpe', 'rrealpe', 'dental360@hotmail.com', 'dental360@hotmail.com', 1, '62itbhpymogs8800k4o44k8w0csg0ws', 'pjEHN1dM/K/KxHR0kxZ3+yFkYEbD9BygL/gGsVL0AW+qmpiTMcY41QfL0yr0RzcX5FUQwdDhlPi45Hu2f0podA==', '2015-02-15 23:09:28', 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:11:"ROLE_MEDICO";}', 0, NULL),
(5, 'medico', 'medico', 'medico@gmail.com', 'medico@gmail.com', 1, 'llja7r8vdi8gsk84ks4oow4ooo8w0os', 'pTZIalgV0mmBfH8YcuXJu9SgtRtOeSz5OtLKjjpUPylEMFk0rfb6tVCq7CsM2fQV6OC+yI8nEyEkqzsIu0Gp9w==', '2015-02-21 10:33:00', 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:11:"ROLE_MEDICO";}', 0, NULL),
(6, 'Tatiana', 'tatiana', 'tatiana.popayan@previred.com.co', 'tatiana.popayan@previred.com.co', 1, '7ylolu9bhickw8cgcwssg0g0ssw008k', 'B23e9+ypjkHep3SDfu6Te50e/BB0eUTWZtXVkX+sE5Og+M+q/nxnypPl8py2IjehnkyLzEMuKcTeG4P11NkphQ==', '2015-02-25 12:06:00', 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL),
(7, 'Esperanza', 'esperanza', 'esmupal1@gmail.com', 'esmupal1@gmail.com', 1, 'jgji6kb7acoo44w0g8oscckk8gkggw8', 'FX6egyPeaCa9MSBtbAishbhaQ3glyE/6XwncItwK6zcWHvoJ9heS+7NcmfurIV20ufIvhCVSozVhFUYg1di5Mw==', NULL, 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL),
(8, 'Nicole', 'nicole', 'nicolelunam@hotmail.com', 'nicolelunam@hotmail.com', 1, 'p4zqjd6liaok88o8oc8sss0k84wcoss', 'sX+Trc9/0kKEl9y9r2dWBAt6oc0sDMdGqQaY9rkZBHFt/dDAR6Q8LeoYOIu+aVtxHWyl5mVFtERRrtHyb+eElg==', '2015-02-25 16:12:41', 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:11:"ROLE_MEDICO";}', 0, NULL),
(9, 'Yazmin', 'yazmin', 'yazminrealpe2@hotmail.com', 'yazminrealpe2@hotmail.com', 1, 'at5obcupjiwcgksokko0sso4o0wwwkc', 'C6LvbOI/Ltljvx8dVCbpIzqbH94ArJIAwIKyYsNmn1pCWTlb26vm8aFfVQkQkpmv2KSJYExD5zNel7vvjM+OEw==', '2015-03-05 17:35:07', 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:11:"ROLE_MEDICO";}', 0, NULL),
(10, 'Karina', 'karina', 'tatisguerrero27@hotmail.com', 'tatisguerrero27@hotmail.com', 1, 'reyulagrs000owc8884ok8gogskoow0', 'QnhZMLT5hZpfK3DLRLK//USqnsHcc0sKK6lRXc2HEry3lD58LQ4tMnt9wu2DfYprMfvalh8V/Dgh/CLPnHqdlA==', NULL, 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:11:"ROLE_MEDICO";}', 0, NULL);
