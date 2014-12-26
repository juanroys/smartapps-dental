<?php

namespace SmartApps\HistClinicaBundle\Entity;

use Doctrine\ORM\EntityRepository;

class ProcedimientoRepository extends EntityRepository{
    
    public function queryTodosLosProcedimientos(){
        $em=  $this->getEntityManager();
        $consulta=$em->createQuery("SELECT p FROM HistClinicaBundle:Procedimiento p");
        return $consulta;
    }
    
    public function findProcedimientosPorConvenio($id){
        $em =$this->getEntityManager();
        $consulta=$em->createQuery('SELECT p FROM HistClinicaBundle:Convenio c'
                . 'JOIN HistClinicaBundle:CostoProcedimiento cp '
                . 'JOIN HistClinicaBundle:Procedimiento p '
                . 'WHERE c.id = cp.procedimiento.id AND p.id=cp.convenio.id');
        return $consulta->getResult();
    }
    
    public function queryBuscarProcedimientos($search){
        $em=  $this->getEntityManager();
        $consulta=$em->createQuery("SELECT p FROM HistClinicaBundle:Procedimiento p "
                . "WHERE p.descripcion LIKE :search ");
        $consulta->setParameter('search', '%'.$search.'%');
        return $consulta;
    }
}
