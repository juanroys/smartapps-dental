<?php

namespace SmartApps\HistClinicaBundle\Entity;

use Doctrine\ORM\EntityRepository;

class SugerenciaRepository extends EntityRepository{
    
    public function findSugerenciaPorHistoria($historiaId){
        $em =$this->getEntityManager();
        $consulta=$em->createQuery('SELECT s FROM HistClinicaBundle:Sugerencia s WHERE s.historiaClinica = '.$historiaId);
        return $consulta->getResult();
    }
}
