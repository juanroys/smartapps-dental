<?php

namespace SmartApps\HistClinicaBundle\Entity;

use Doctrine\ORM\EntityRepository;

class GrupoRepository extends EntityRepository{
    
    public function queryTodosLosGrupos(){
        $em=  $this->getEntityManager();
        $consulta=$em->createQuery("SELECT g FROM HistClinicaBundle:Grupo g");
        return $consulta;
    }
    public function queryBuscarGrupos($search){
        $em=  $this->getEntityManager();
        $consulta=$em->createQuery("SELECT g FROM HistClinicaBundle:Grupo g "
                . "WHERE g.titulo LIKE :search");
        $consulta->setParameter('search', '%'.$search.'%');
        return $consulta;
    }
    public function findGruposOrdenados(){
        $em=  $this->getEntityManager();
        $consulta = $em->createQuery("SELECT g,p FROM HistClinicaBundle:Grupo g "
                . "JOIN g.preguntas p "                
                . "ORDER BY g.orden , p.orden, p.noColumna");
        //. "JOIN p.preguntaOpciones po "
        return $consulta->getResult();
    }
}