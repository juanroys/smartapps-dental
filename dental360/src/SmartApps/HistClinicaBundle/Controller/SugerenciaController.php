<?php

namespace SmartApps\HistClinicaBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use SmartApps\HistClinicaBundle\Entity\Sugerencia;
use Symfony\Component\HttpFoundation\Response;
use DateTime;

class SugerenciaController extends Controller {

    public function newAction($historiaId) {
        $em = $this->getDoctrine()->getManager();
        $procedimientos = $em->getRepository('HistClinicaBundle:Procedimiento')->findAll();
        $historiaClinica = $em->getRepository('HistClinicaBundle:HistoriaClinica')->find($historiaId);
        $sugerencias = $em->getRepository('HistClinicaBundle:Sugerencia')->findSugerenciaPorHistoria($historiaId);
        $paciente = $historiaClinica->getPaciente();
        return $this->render('HistClinicaBundle:Sugerencia:new.html.twig', array(
                    'procedimientos' => $procedimientos,
                    'paciente' => $paciente,
                    'sugerencias' => $sugerencias,
        ));
    }
    public function exportarAction($historiaId) {
        $em = $this->getDoctrine()->getManager();
        $historiaClinica = $em->getRepository('HistClinicaBundle:HistoriaClinica')->find($historiaId);
        $sugerencias = $em->getRepository('HistClinicaBundle:Sugerencia')->findSugerenciaPorHistoria($historiaId);
        $paciente = $historiaClinica->getPaciente();
        return $this->render('HistClinicaBundle:Sugerencia:exportar.html.twig', array(
                    'paciente' => $paciente,
                    'sugerencias' => $sugerencias,
        ));
    }

    public function createAction() {
        $datos = $_POST;
        //recuperacion de datos
        $fechaPost = $datos["fecha"];
        $formato = 'Y-m-d';
        $fecha = DateTime::createFromFormat($formato, $fechaPost);
        $costo = $datos["costoProcedimiento"];
        $procedimientoId = $datos["procedimientoId"];
        $pacienteId = $datos["pacienteId"];

        //cargando historia clinica del paciente
        $em = $this->getDoctrine()->getManager();
        $historia = $em->getRepository('HistClinicaBundle:HistoriaClinica')->findHistoriaClinicaPorPaciente($pacienteId);
        //cargando procedimiento 
        $procedimiento = $em->getRepository('HistClinicaBundle:Procedimiento')->find($procedimientoId);
        ///creando y persistiendo la sugerencia
        $sugerencia = new Sugerencia();
        $sugerencia->setCosto($costo);
        $sugerencia->setHistoriaClinica($historia);
        $sugerencia->setProcedimiento($procedimiento);
        $sugerencia->setFechaPlanificacion($fecha);
        $em->persist($sugerencia);
        $em->flush();
        //respuesta como Json
        $response = array("fecha" => $fecha->format('Y-m-d'),
            "costo" => $costo,
            "procedimiento" => $procedimiento->getDescripcion(),
            "sugerenciaId" => $sugerencia->getId()
        );
        return new Response(json_encode($response));
    }

    public function cargarPrecioAction() {
        $datos = $_POST;
        $pacienteId = $datos["pacienteId"];
        $procedimientoId = $datos["procedimientoId"];
        $em = $this->getDoctrine()->getManager();
        $paciente = $em->getRepository('HistClinicaBundle:Paciente')->find($pacienteId);
        $convenioId = $paciente->getConvenio()->getId();
        $costoProcedimiento = 0;
        $costoProcedimientoEntity = $em->getRepository('HistClinicaBundle:CostoProcedimiento')->findCostoProcedimiento($convenioId, $procedimientoId);
        if (isset($costoProcedimientoEntity) && $costoProcedimientoEntity->getValor() != null) {
            $costoProcedimiento = $costoProcedimientoEntity->getValor();
        }
        $response = array("costoProcedimiento" => $costoProcedimiento);
        return new Response(json_encode($response));
    }

    public function deleteAction() {
        $sugerenciaId = $_POST["sugerenciaId"];
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('HistClinicaBundle:Sugerencia')->find($sugerenciaId);
        $error=false;
        if (!$entity) {
            $error = true;
        } else {
            $em->remove($entity);
            $em->flush();
        }
        $response = array("error" => $error);
        return new Response(json_encode($response));
    }
    public function loadAction(){
        $sugerenciaId=$_POST["sugerenciaId"];
        $em = $this->getDoctrine()->getManager();
        $sugerencia = $em->getRepository('HistClinicaBundle:Sugerencia')->find($sugerenciaId);
        $error=false;
        if (!$sugerencia) {
            $error = true;
            $sugerencia=new Sugerencia();
        } 
        $response = array(
            "error"=>$error,
            "fecha" => $sugerencia->getFechaPlanificacion()->format('Y-m-d'),
            "costo" => $sugerencia->getCosto(),
            "procedimientoId" => $sugerencia->getProcedimiento()->getId(),
            "sugerenciaId" => $sugerencia->getId()
        );
        return new Response(json_encode($response));
    }
    public function editAction() {
        $datos = $_POST;
        //recuperacion de datos
        $fechaPost = $datos["fecha"];
        $formato = 'Y-m-d';
        $fecha = DateTime::createFromFormat($formato, $fechaPost);
        $costo = $datos["costoProcedimiento"];
        $procedimientoId = $datos["procedimientoId"];
        $pacienteId = $datos["pacienteId"];
        $sugerenciaId=$datos["sugerenciaId"];

        //cargando historia clinica del paciente
        $em = $this->getDoctrine()->getManager();
        $historia = $em->getRepository('HistClinicaBundle:HistoriaClinica')->findHistoriaClinicaPorPaciente($pacienteId);
        //cargando procedimiento 
        $procedimiento = $em->getRepository('HistClinicaBundle:Procedimiento')->find($procedimientoId);
        ///persistiendo la sugerencia
        $sugerencia = $em->getRepository('HistClinicaBundle:Sugerencia')->find($sugerenciaId);
        $sugerencia->setCosto($costo);
        $sugerencia->setHistoriaClinica($historia);
        $sugerencia->setProcedimiento($procedimiento);
        $sugerencia->setFechaPlanificacion($fecha);
        $em->flush();
        //respuesta como Json
        $response = array("fecha" => $fecha->format('Y-m-d'),
            "costo" => $costo,
            "procedimiento" => $procedimiento->getDescripcion(),
            "sugerenciaId" => $sugerencia->getId()
        );
        return new Response(json_encode($response));
    }

}
