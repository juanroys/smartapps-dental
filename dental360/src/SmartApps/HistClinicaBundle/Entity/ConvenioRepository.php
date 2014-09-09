<?php

namespace SmartApps\HistClinicaBundle\Entity;

use Doctrine\ORM\EntityRepository;

class ConvenioRepository extends EntityRepository{
    public function queryTodosLosConvenios(){
        $em=  $this->getEntityManager();
        $consulta=$em->createQuery("SELECT c FROM HistClinicaBundle:Convenio c");
        return $consulta;
    }
}
