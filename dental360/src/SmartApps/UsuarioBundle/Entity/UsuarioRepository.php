<?php

namespace SmartApps\HistClinicaBundle\Entity;

use Doctrine\ORM\EntityRepository;

class UsuarioRepository extends EntityRepository{
    
    public function queryTodosLosUsuarios(){
        $em=  $this->getEntityManager();
        $consulta=$em->createQuery("SELECT u FROM UsuarioBundle:Usuario u");
        return $consulta;
    }
}