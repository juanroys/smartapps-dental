<?php

namespace SmartApps\HistClinicaBundle\Entity;

use Doctrine\ORM\EntityRepository;

class HistoriaClinicaRepository extends EntityRepository{
    
    public function queryTodasLasHistoriasClinicas(){
        $em=  $this->getEntityManager();
        $consulta=$em->createQuery("SELECT h FROM HistClinicaBundle:HistoriaClinica h");
        return $consulta;
    }
    
    public function findHistoriaClinicaPorPaciente($id){
        $em=  $this->getEntityManager();
        $consulta = $em->createQuery("SELECT h FROM HistClinicaBundle:HistoriaClinica h "
                . "JOIN h.paciente p WHERE p.id = :id");
        $consulta->setParameter('id', $id);
        return $consulta->getSingleResult();
    }
}
