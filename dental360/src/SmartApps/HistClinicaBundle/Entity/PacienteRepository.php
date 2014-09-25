<?php

namespace SmartApps\HistClinicaBundle\Entity;

use Doctrine\ORM\EntityRepository;

class PacienteRepository extends EntityRepository{
    
    public function queryTodosLosPacientes(){
        $em=  $this->getEntityManager();
        $consulta=$em->createQuery("SELECT g FROM HistClinicaBundle:Paciente g");
        return $consulta;
    }
    
}