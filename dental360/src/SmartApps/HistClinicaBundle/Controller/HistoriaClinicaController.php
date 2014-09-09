<?php

namespace SmartApps\HistClinicaBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use SmartApps\HistClinicaBundle\Entity\HistoriaClinica;

class HistoriaClinicaController extends Controller {

    public function indexAction() {
        $em = $this->getDoctrine()->getManager();
        $paginador = $this->get('ideup.simple_paginator');
        $entities = $paginador->paginate(
                        $em->getRepository("HistClinicaBundle:HistoriaClinica")->queryTodasLasHistoriasClinicas()
                )->getResult();
        return $this->render('HistClinicaBundle:HistoriaClinica:index.html.twig', array(
                    'entities' => $entities,
        ));
    }

    public function newAction($id) {
        $em = $this->getDoctrine()->getManager();
        $grupos = $em->getRepository('HistClinicaBundle:Grupo')->findAll();
        $paciente = $em->getRepository('HistClinicaBundle:Paciente')->find($id);
        return $this->render('HistClinicaBundle:HistoriaClinica:new.html.twig', array(
                    'grupos' => $grupos,
                    'paciente' => $paciente
        ));
    }

    public function createAction(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $datos = $_POST;
        $paciente_id = $datos["paciente_id"];
        unset($datos["paciente_id"]);
        $historiaClinica = $em->getRepository('HistClinicaBundle:HistoriaClinica')->findHistoriaClinicaPorPaciente($paciente_id);
        $inputs_keys = array_keys($datos);
        $errores = $this->validarDatos($datos);
        if (is_array($errores) && count($errores) == 0) {
            foreach ($inputs_keys as $key) {
                $pregunta = $em->getRepository('HistClinicaBundle:Pregunta')->find($key);
                $respuesta = new \SmartApps\HistClinicaBundle\Entity\Respuesta();
                $respuesta->setHistoriaClinica($historiaClinica);
                $respuesta->setPregunta($pregunta);
                $respuesta->setRespuestaTexto($datos["$key"]);
                $em->persist($respuesta);
                echo $respuesta->getRespuestaTexto();
            }
        }else{
            $paciente = $em->getRepository('HistClinicaBundle:Paciente')->find($paciente_id);
            $grupos = $em->getRepository('HistClinicaBundle:Grupo')->findAll();
            return $this->render('HistClinicaBundle:HistoriaClinica:new.html.twig', array(
                    'grupos' => $grupos,
                    'paciente' => $paciente,
                    'errores'=>$errores
        ));
        }
    }

    private function validarDatos(array $datos) {
        $em = $this->getDoctrine()->getManager();
        $inputs_keys = array_keys($datos);
        $errores = array();
        $todasLasPreguntas = $em->getRepository('HistClinicaBundle:Pregunta')->findAll();
        foreach ($todasLasPreguntas as $pregunta) {
            //$pregunta= $em->getRepository('HistClinicaBundle:Pregunta')->find($key);
            $index=$pregunta->getId();
            if ($pregunta->getObligatoria() == true &&
                    (!isset($datos["$index"]) ||
                    $datos["$index"] == null ||
                    strcmp($datos["$index"], '') == 0)) {
                $errores["$index"] = 'Este Campo es Requerido';
            }
        }
        return $errores;
    }

}
