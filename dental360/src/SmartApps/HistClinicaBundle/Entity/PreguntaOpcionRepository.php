<?php

namespace SmartApps\HistClinicaBundle\Entity;

use Doctrine\ORM\EntityRepository;

class PreguntaOpcionRepository extends EntityRepository{
    
    public function queryOpcionesPorPregunta($idpregunta){
        $em=  $this->getEntityManager();
        $consulta=$em->createQuery("SELECT g "
                . "FROM HistClinicaBundle:PreguntaOpcion g "
                . "WHERE g.pregunta = " . $idpregunta);
        return $consulta;
    }
    
}