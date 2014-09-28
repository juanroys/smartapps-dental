<?php

namespace SmartApps\HistClinicaBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use SmartApps\HistClinicaBundle\Entity\PreguntaOpcion;
use SmartApps\HistClinicaBundle\Form\PreguntaOpcionType;

/**
 * PreguntaOpcion controller.
 *
 */
class PreguntaOpcionController extends Controller
{

    /**
     * Lists all PreguntaOpcion entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('HistClinicaBundle:PreguntaOpcion')->findAll();

        return $this->render('HistClinicaBundle:PreguntaOpcion:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new PreguntaOpcion entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new PreguntaOpcion();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);
        $variablepreg =  $_POST['idpreg'] ;

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $pregunta = $em->getRepository("HistClinicaBundle:Pregunta")->find($variablepreg);

            $entity->setPregunta($pregunta);
            
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('preguntaopcion_listado', array('id' => $variablepreg)));
        }

        return $this->render('HistClinicaBundle:PreguntaOpcion:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'idpreg' => $variablepreg,
        ));
    }

    /**
     * Creates a form to create a PreguntaOpcion entity.
     *
     * @param PreguntaOpcion $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(PreguntaOpcion $entity)
    {
        $form = $this->createForm(new PreguntaOpcionType(), $entity, array(
            'action' => $this->generateUrl('preguntaopcion_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new PreguntaOpcion entity.
     *
     */
    public function newAction()
    {
        $entity = new PreguntaOpcion();
        $form   = $this->createCreateForm($entity);
        
        return $this->render('HistClinicaBundle:PreguntaOpcion:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }
    
    public function newopcionAction($idpreg)
    {
        $entity = new PreguntaOpcion();
        $form   = $this->createCreateForm($entity);
        
        $em = $this->getDoctrine()->getManager();
        $pregunta = $em->getRepository("HistClinicaBundle:Pregunta")->find($idpreg);
        
        $entity->setPregunta($pregunta);
        return $this->render('HistClinicaBundle:PreguntaOpcion:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'idpreg' => $idpreg,
        ));
    }

    public function listadoAction($id)
    {
        $em = $this->getDoctrine()->getManager();

         $paginador=  $this->get('ideup.simple_paginator');
        $entities=$paginador->paginate(
                $em->getRepository("HistClinicaBundle:PreguntaOpcion")->queryOpcionesPorPregunta($id)
                )->getResult(); 
        return $this->render('HistClinicaBundle:PreguntaOpcion:index.html.twig', array(
            'entities' => $entities,
            'idpreg' => $id,
        ));
    }
    
    /**
     * Finds and displays a PreguntaOpcion entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HistClinicaBundle:PreguntaOpcion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find PreguntaOpcion entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('HistClinicaBundle:PreguntaOpcion:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing PreguntaOpcion entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HistClinicaBundle:PreguntaOpcion')->find($id);
        $idpreg = $entity->getPregunta()->getId();
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find PreguntaOpcion entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('HistClinicaBundle:PreguntaOpcion:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
            'idpreg' => $idpreg,
        ));
    }

    /**
    * Creates a form to edit a PreguntaOpcion entity.
    *
    * @param PreguntaOpcion $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(PreguntaOpcion $entity)
    {
        $form = $this->createForm(new PreguntaOpcionType(), $entity, array(
            'action' => $this->generateUrl('preguntaopcion_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing PreguntaOpcion entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HistClinicaBundle:PreguntaOpcion')->find($id);
        $idpreg = $entity->getTipoPregunta()->getId();
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find PreguntaOpcion entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
                        
            $em->flush();
            
            return $this->redirect($this->generateUrl('preguntaopcion_listado', array('id' => $idpreg)));
        }

        return $this->render('HistClinicaBundle:PreguntaOpcion:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
            'idpreg' => $idpreg,
        ));
    }
    /**
     * Deletes a PreguntaOpcion entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('HistClinicaBundle:PreguntaOpcion')->find($id);
        $idpreg  = $entity->getPregunta()->getId();
                
            if (!$entity) {
                throw $this->createNotFoundException('Unable to find PreguntaOpcion entity.');
            }

            $em->remove($entity);
            $em->flush();
        

        return $this->redirect($this->generateUrl('preguntaopcion_listado', array('id' => $idpreg)));
    }

    /**
     * Creates a form to delete a PreguntaOpcion entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('preguntaopcion_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
