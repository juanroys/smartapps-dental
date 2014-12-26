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
class UsuarioController extends Controller {

    /**
     * Lists all Usuario entities.
     *
     */
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();
        $consulta = $em->createQuery("SELECT u FROM UsuarioBundle:Usuario u");
        $paginador = $this->get('ideup.simple_paginator');
        $entities = $paginador->paginate($consulta)->getResult();
        return $this->render('UsuarioBundle:Usuario:index.html.twig', array(
                    'entities' => $entities,
        ));
    }

    public function searchAction() {
        $search = $_POST['search'];
        $em = $this->getDoctrine()->getManager();
        $consulta = $em->createQuery("SELECT u FROM UsuarioBundle:Usuario u "
                . "WHERE u.username LIKE :search OR u.email LIKE :search");
        $consulta->setParameter('search', '%'.$search.'%');
        $paginador = $this->get('ideup.simple_paginator');
        $paginador->paginate($consulta);
        if ($paginador->getTotalItems() > 0) {
            $paginador->setItemsPerPage($paginador->getTotalItems());
        }
        $entities = $paginador->paginate($consulta)->getResult();
        return $this->render('UsuarioBundle:Usuario:index.html.twig', array(
                    'entities' => $entities,
                    'search' => $search
        ));
    }
    /**
     * Deletes a Medico entity.
     *
     */
    public function deleteAction($id)
    {
       
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('UsuarioBundle:Usuario')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Medico entity.');
            }

            $em->remove($entity);
            $em->flush();
       
        return $this->redirect($this->generateUrl('usuario'));
    }

}
