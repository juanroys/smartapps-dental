<?php

namespace SmartApps\HistClinicaBundle\Entity;

use Doctrine\ORM\EntityRepository;

class GrupoRepository extends EntityRepository{
    
    public function queryTodosLosGrupos(){
        $em=  $this->getEntityManager();
        $consulta=$em->createQuery("SELECT g FROM HistClinicaBundle:Grupo g");
        return $consulta;
    }
}