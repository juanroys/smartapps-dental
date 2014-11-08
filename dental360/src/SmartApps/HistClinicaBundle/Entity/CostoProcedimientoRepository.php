<?php
namespace SmartApps\HistClinicaBundle\Entity;

use Doctrine\ORM\EntityRepository;

class CostoProcedimientoRepository extends EntityRepository{
    
    public function queryTodosLosCostos(){
        $em=  $this->getEntityManager();
        $consulta=$em->createQuery("SELECT c FROM HistClinicaBundle:CostoProcedimiento c");
        return $consulta;
    }
    
    public function findCostoProcedimiento($convenioId, $procedimientoId){
        $em=  $this->getEntityManager();
        $consulta=$em->createQuery("SELECT c FROM HistClinicaBundle:CostoProcedimiento c WHERE c.convenio ="
                . $convenioId." AND c.procedimiento = ".$procedimientoId);
        return $consulta->getOneOrNullResult();
    }
    
    
    public function queryFindCostosPorConvenio($convenioId){
        $em=  $this->getEntityManager();
        $consulta=$em->createQuery("SELECT c FROM HistClinicaBundle:CostoProcedimiento c"
                . " WHERE c.convenio = :convenioId");
        $consulta->setParameter('convenioId',$convenioId);
        return $consulta;
    }
}
