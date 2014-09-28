<?php

namespace SmartApps\HistClinicaBundle\Entity;

use Doctrine\ORM\EntityRepository;

class OpcionRespuestaRepository extends EntityRepository{
    
    public function queryOpcionesPorTipo($idpregunta){
        $em=  $this->getEntityManager();
        $consulta=$em->createQuery("SELECT g "
                . "FROM HistClinicaBundle:OpcionRespuesta g "
                . "WHERE g.tipoPregunta = " . $idpregunta);
        return $consulta;
    }
    
}