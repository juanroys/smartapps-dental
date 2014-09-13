<?php
namespace SmartApps\HistClinicaBundle\Entity;

use Doctrine\ORM\EntityRepository;

class CostoProcedimientoRepository extends EntityRepository{
    
    public function queryTodosLosCostos(){
        $em=  $this->getEntityManager();
        $consulta=$em->createQuery("SELECT c FROM HistClinicaBundle:CostoProcedimiento c");
        return $consulta;
    }
}
