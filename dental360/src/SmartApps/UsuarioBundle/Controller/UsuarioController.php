<?php

namespace SmartApps\UsuarioBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use SmartApps\UsuarioBundle\Entity\Usuario;
use SmartApps\UsuarioBundle\Form\UsuarioType;

/**
 * Usuario controller.
 *
 */
class UsuarioController extends Controller
{

    /**
     * Lists all Usuario entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('UsuarioBundle:Usuario')->findAll();

        return $this->render('UsuarioBundle:Usuario:index.html.twig', array(
            'entities' => $entities,
        ));
    }
}
