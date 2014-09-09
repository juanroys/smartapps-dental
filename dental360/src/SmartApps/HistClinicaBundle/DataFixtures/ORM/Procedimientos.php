<?php
namespace SmartApps\HistClinicaBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use SmartApps\HistClinicaBundle\Entity\Procedimiento;

Class Procedimientos implements FixtureInterface{
    public function load(ObjectManager $manager) {
        for($i=0; $i<30;$i++){
            $procedimiento=new Procedimiento();
            $procedimiento->setDescripcion('Descripcion_'.$i);
            $manager->persist($procedimiento);
        }
        $manager->flush();
    }

}
