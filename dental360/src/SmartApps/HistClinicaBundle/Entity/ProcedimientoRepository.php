<?php

namespace SmartApps\HistClinicaBundle\Entity;

use Doctrine\ORM\EntityRepository;

class ProcedimientoRepository extends EntityRepository{
    
    public function queryTodosLosProcedimientos(){
        $em=  $this->getEntityManager();
        $consulta=$em->createQuery("SELECT p FROM HistClinicaBundle:Procedimiento p");
        return $consulta;
    }
}
