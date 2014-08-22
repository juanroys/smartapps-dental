<?php

namespace SmartApps\HistClinicaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('HistClinicaBundle:Default:index.html.twig', array('name' => $name));
    }
}
