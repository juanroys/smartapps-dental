<?php
namespace SmartApps\HistClinicaBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use SmartApps\HistClinicaBundle\Entity\Grupo;

class Grupos implements FixtureInterface{
    
    public function load(ObjectManager $manager) {
        for($i=0;$i<10;$i++){
            $grupo=new Grupo();
            $grupo->setTitulo('grupo_'.$i);
            $grupo->setOrden($i);
            $manager->persist($grupo);
        }
        
        $manager->flush();
    }
}
