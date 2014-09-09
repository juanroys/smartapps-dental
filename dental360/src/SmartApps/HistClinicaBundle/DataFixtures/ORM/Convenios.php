<?php

namespace SmartApps\HistClinicaBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use SmartApps\HistClinicaBundle\Entity\Convenio;

class Convenios implements FixtureInterface{
    
    public function load(ObjectManager $manager) {
        for($i=0;$i<30;$i++){
            $convenio=new Convenio();
            $convenio->setNombreConvenio('Convenio_'.$i);
            $manager->persist($convenio);
        }
        $manager->flush();
    }

}