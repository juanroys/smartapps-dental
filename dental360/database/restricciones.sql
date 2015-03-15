

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
  ADD CONSTRAINT `FK_9E05355C966D222A` FOREIGN KEY (`unidadAtencionId`) REFERENCES `UnidadAtencion` (`unidadAtencionId`),
  ADD CONSTRAINT `FK_9E05355CA18FEEAF` FOREIGN KEY (`pacienteId`) REFERENCES `Paciente` (`pacienteId`),
  ADD CONSTRAINT `FK_9E05355CF179D4CC` FOREIGN KEY (`medicoId`) REFERENCES `Medico` (`medicoId`);

--
-- Filtros para la tabla `CostoProcedimiento`
--
ALTER TABLE `CostoProcedimiento`
  ADD CONSTRAINT `FK_BE6B3BFC42C7B7FD` FOREIGN KEY (`procedimientoId`) REFERENCES `Procedimiento` (`procedimientoId`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_BE6B3BFCA3FCB4` FOREIGN KEY (`convenioId`) REFERENCES `Convenio` (`convenioId`);

--
-- Filtros para la tabla `DiagnosticoDiente`
--
ALTER TABLE `DiagnosticoDiente`
  ADD CONSTRAINT `FK_CC7486697BC761ED` FOREIGN KEY (`historiaClinicaId`) REFERENCES `HistoriaClinica` (`historiaClinicaId`),
  ADD CONSTRAINT `FK_CC748669C4CEE368` FOREIGN KEY (`itemOdontogramaId`) REFERENCES `ItemOdontograma` (`itemOdontogramaId`);

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
  ADD CONSTRAINT `FK_A199ED9546E25505` FOREIGN KEY (`tipoPreguntaId`) REFERENCES `TipoPregunta` (`tipoPreguntaId`) ON DELETE CASCADE;

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
  ADD CONSTRAINT `FK_453AE4E4A64D4886` FOREIGN KEY (`preguntaId`) REFERENCES `Pregunta` (`preguntaId`) ON DELETE CASCADE;

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
-- Filtros para la tabla `TarifaMedicoProc`
--
ALTER TABLE `TarifaMedicoProc`
  ADD CONSTRAINT `FK_D7DFF00142C7B7FD` FOREIGN KEY (`procedimientoId`) REFERENCES `Procedimiento` (`procedimientoId`),
  ADD CONSTRAINT `FK_D7DFF001F179D4CC` FOREIGN KEY (`medicoId`) REFERENCES `Medico` (`medicoId`);

--
-- Filtros para la tabla `Tratamiento`
--
ALTER TABLE `Tratamiento`
  ADD CONSTRAINT `FK_E7382FAB42C7B7FD` FOREIGN KEY (`procedimientoId`) REFERENCES `Procedimiento` (`procedimientoId`),
  ADD CONSTRAINT `FK_E7382FAB6348343C` FOREIGN KEY (`atencionId`) REFERENCES `Atencion` (`atencionId`);
