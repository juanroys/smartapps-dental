<?php

namespace SmartApps\HistClinicaBundle\Entity;

use Doctrine\ORM\EntityRepository;

class PacienteRepository extends EntityRepository{
    
    public function queryTodosLosPacientes(){
        $em=  $this->getEntityManager();
        $consulta=$em->createQuery("SELECT p FROM HistClinicaBundle:Paciente p");
        return $consulta;
    }
    public function queryBuscarPacientes($search){
        $em=  $this->getEntityManager();
        $consulta=$em->createQuery("SELECT p FROM HistClinicaBundle:Paciente p "
                . "WHERE p.apellido1 LIKE :search OR p.apellido2 LIKE :search "
                . "OR p.nombres LIKE :search OR p.noIdentificacion LIKE :search "
                . "OR p.email LIKE :search");
        $consulta->setParameter('search','%'. $search.'%');
        return $consulta;
    }
    
}