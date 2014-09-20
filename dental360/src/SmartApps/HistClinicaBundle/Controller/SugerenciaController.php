<?php

namespace SmartApps\HistClinicaBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use SmartApps\HistClinicaBundle\Entity\Sugerencia;

class SugerenciaController extends Controller{
    public function newAction($idHistoria){
        $em=$this->getDoctrine()->getManager();
        $convenios=$em->getRepository('HistClinicaBundle:Convenio')->findAll();
        $historiaClinica=$em->getRepository('HistClinicaBundle:HistoriaClinica')->find($idHistoria);
        return $this->render('HistClinicaBundle:Sugerencia:new.html.twig', array(
            'convenios' => $convenios,
        ));
    }
}

