<?php

namespace SmartApps\AgendaBundle\Entity;

use Doctrine\ORM\EntityRepository;

class DisponibilidadRepository extends EntityRepository{
    
    public function getPorMedicoYFecha($idmedico, $fechainicio, $fechafin){
        $em=  $this->getEntityManager();
        $consulta=$em->createQuery(
                "SELECT d "
                . "FROM AgendaBundle:Disponibilidad d JOIN d.medico m "
                . "WHERE m.id = :id AND d.fechaDesde <= :fechafin AND d.fechaHasta >= :fechainicio ");
        $consulta->setParameter('id', $idmedico);
        $consulta->setParameter('fechafin', $fechafin);
        $consulta->setParameter('fechainicio', $fechainicio);
        return $consulta->getResult();
    }    
}