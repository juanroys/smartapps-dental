<?php

namespace SmartApps\AgendaBundle\Entity;

use Doctrine\ORM\EntityRepository;

class CitaRepository extends EntityRepository{
    
    public function getPorFecha($fechainicio, $fechafin){
        $em=  $this->getEntityManager();
        $consulta=$em->createQuery(
                "SELECT d "
                . "FROM AgendaBundle:Cita d  "
                . "WHERE d.fecha <= :fechafin AND d.fecha >= :fechainicio ");        
        $consulta->setParameter('fechafin', $fechafin);
        $consulta->setParameter('fechainicio', $fechainicio);
        return $consulta->getResult();
    }    
  
}