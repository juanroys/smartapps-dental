<?php

namespace SmartApps\HistClinicaBundle\Entity;

use Doctrine\ORM\EntityRepository;

class PreguntaRepository extends EntityRepository{
    public function queryTodasLasPreguntas(){
        $em=  $this->getEntityManager();
        $consulta=$em->createQuery("SELECT p FROM HistClinicaBundle:Pregunta p");
        return $consulta;
    }
}