<?php

namespace SmartApps\AgendaBundle\Entity;

use Doctrine\ORM\EntityRepository;

class TarifaMedicoProcRepository extends EntityRepository{
    
    public function queryTarifasPorMedico($idmedico){
        $em=  $this->getEntityManager();
        $consulta=$em->createQuery("SELECT t "
                . "FROM AgendaBundle:TarifaMedicoProc t JOIN t.medico m "
                . "WHERE m.id = :id");
        $consulta->setParameter('id', $idmedico);
        return $consulta->getResult();;
    }
    
    
    
}