<?php

namespace SmartApps\HistClinicaBundle\Entity;

use Doctrine\ORM\EntityRepository;

class RespuestaRepository extends EntityRepository{
    public function todasRespuestas($idHistoria){
        $em=  $this->getEntityManager();
        $consulta=$em->createQuery("SELECT r FROM HistClinicaBundle:Respuesta r WHERE r.historiaClinica = " . $idHistoria . " ORDER BY r.pregunta");
        return $consulta->getResult();
    }
}