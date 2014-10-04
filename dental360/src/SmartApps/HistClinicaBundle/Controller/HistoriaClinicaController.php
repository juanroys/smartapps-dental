<?php

namespace SmartApps\HistClinicaBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use SmartApps\HistClinicaBundle\Entity\HistoriaClinica;
use Doctrine\ORM\Query\ResultSetMapping;

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
        $grupos = $em->getRepository('HistClinicaBundle:Grupo')->findGruposOrdenados();
        $paciente = $em->getRepository('HistClinicaBundle:Paciente')->find($id);
        
        $historiaClinica = $em->getRepository('HistClinicaBundle:HistoriaClinica')->findHistoriaClinicaPorPaciente($id);    
        
        /// Se cargan todas las respuestas para la historia clinica seleccionada
        $respuestas = Array();
        if($historiaClinica != null)
        {
            $respuestas = $em->getRepository('HistClinicaBundle:Respuesta')->todasRespuestas($historiaClinica->getId());    
        }
        $totalrtas = array();
        $preguntaactual = -1;
        $contador_respuestas = 0;
        foreach($respuestas as $rta)
        {
            $preguntaId = $rta->getPregunta()->getId();
            if($preguntaactual != $preguntaId)
            {
                $contador_respuestas = 0;                        
            }
            $preguntaactual = $preguntaId ;            
            $tipoentrada = $rta->getPregunta()->getTipoEntrada();
            // Si la respuesta es para un tipo checkbox            
            if($tipoentrada != 4)
            {
                $totalrtas[$preguntaId] = $rta->getRespuestaTexto();
             //   echo $rta->getRespuestaTexto();
            }
            else
            {
                $totalrtas[$preguntaId . "|" . str_replace(' ', '_', $rta->getRespuestaTexto()) ] = true;    
                //echo $preguntaId . "|" . str_replace(' ', '_', $rta->getRespuestaTexto()) ;
            }            
        }
        //$em->flush(); 
        
        
        return $this->render('HistClinicaBundle:HistoriaClinica:new.html.twig', array(
                    'grupos' => $grupos,
                    'paciente' => $paciente,
                    'respuestas' => $totalrtas,
                    'historiaClinica'=>$historiaClinica,
        ));
    }

    public function createAction(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $datos = $_POST;
        $paciente_id = $datos["paciente_id"];
        unset($datos["paciente_id"]);
        $historiaClinica = $em->getRepository('HistClinicaBundle:HistoriaClinica')->findHistoriaClinicaPorPaciente($paciente_id);
        $inputs_keys = array_keys($datos);
        //$errores = $this->validarDatos($datos);
        $rsm = new ResultSetMapping();
        
        /// Se obtienen todas las respuestsas anteriores para la HC y se borran de la base de datos
        
        $respuestas = $em->getRepository('HistClinicaBundle:Respuesta')->todasRespuestas($historiaClinica->getId());
        foreach($respuestas as $rta)
        {
            //echo $rta->getId();
            $em->remove($rta);
        }
        $em->flush(); 
        // Para cada input se registra una respuesta
        foreach ($inputs_keys as $key) {                
            
            $pos = strrpos($key, "|");
            // si no es un tipo check
            if ($pos === false && $datos["$key"] != '') { 
                $pregunta = $em->getRepository('HistClinicaBundle:Pregunta')->find($key);
                $respuesta = new \SmartApps\HistClinicaBundle\Entity\Respuesta();
                $respuesta->setHistoriaClinica($historiaClinica);
                $respuesta->setPregunta($pregunta);
                $respuesta->setRespuestaTexto($datos["$key"]);
                $em->persist($respuesta);
            }
            else
            {
                // solamente se registra el valor si se ha chequeado una casilla
                if($datos["$key"] == true)
                {
                    $cadenas = explode("|", $key);
                    $llave = $cadenas[0];
                    $pregunta = $em->getRepository('HistClinicaBundle:Pregunta')->find($llave);
                    $respuesta = new \SmartApps\HistClinicaBundle\Entity\Respuesta();
                    $respuesta->setHistoriaClinica($historiaClinica);
                    $respuesta->setPregunta($pregunta);
                    $respuesta->setRespuestaTexto($datos["$key"]);
                    $em->persist($respuesta);
                }
                
            }                       
            //echo $respuesta->getRespuestaTexto();
        }   
        $em->flush();
        return $this->redirect($this->generateUrl('paciente'));
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
