<?php

namespace SmartApps\HistClinicaBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use SmartApps\HistClinicaBundle\Entity\Grupo;
use SmartApps\HistClinicaBundle\Form\GrupoType;

/**
 * Grupo controller.
 *
 */
class GrupoController extends Controller
{

    /**
     * Lists all Grupo entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        //$entities = $em->getRepository('HistClinicaBundle:Grupo')->findAll();
        $paginador=  $this->get('ideup.simple_paginator');
        $entities=$paginador->paginate(
                $em->getRepository("HistClinicaBundle:Grupo")->queryTodosLosGrupos()
                )->getResult();

        return $this->render('HistClinicaBundle:Grupo:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Grupo entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Grupo();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('grupo', array('id' => $entity->getId())));
        }

        return $this->render('HistClinicaBundle:Grupo:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Grupo entity.
     *
     * @param Grupo $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Grupo $entity)
    {
        $form = $this->createForm(new GrupoType(), $entity, array(
            'action' => $this->generateUrl('grupo_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Grupo entity.
     *
     */
    public function newAction()
    {
        $entity = new Grupo();
        $form   = $this->createCreateForm($entity);

        return $this->render('HistClinicaBundle:Grupo:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Grupo entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HistClinicaBundle:Grupo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Grupo entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('HistClinicaBundle:Grupo:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Grupo entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HistClinicaBundle:Grupo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Grupo entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('HistClinicaBundle:Grupo:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Grupo entity.
    *
    * @param Grupo $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Grupo $entity)
    {
        $form = $this->createForm(new GrupoType(), $entity, array(
            'action' => $this->generateUrl('grupo_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Grupo entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HistClinicaBundle:Grupo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Grupo entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('grupo', array('id' => $id)));
        }

        return $this->render('HistClinicaBundle:Grupo:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Grupo entity.
     *
     */
    public function deleteAction( $id)
    {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('HistClinicaBundle:Grupo')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Grupo entity.');
            }

            $em->remove($entity);
            $em->flush();
        

        return $this->redirect($this->generateUrl('grupo'));
    }

    /**
     * Creates a form to delete a Grupo entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('grupo_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
