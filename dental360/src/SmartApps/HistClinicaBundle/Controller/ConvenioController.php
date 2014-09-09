<?php

namespace SmartApps\HistClinicaBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use SmartApps\HistClinicaBundle\Entity\Convenio;
use SmartApps\HistClinicaBundle\Form\ConvenioType;

/**
 * Convenio controller.
 *
 */
class ConvenioController extends Controller
{

    /**
     * Lists all Convenio entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $paginador=  $this->get('ideup.simple_paginator');
        $entities=$paginador->paginate(
                $em->getRepository("HistClinicaBundle:Convenio")->queryTodosLosConvenios()
                )->getResult();

        //$entities = $em->getRepository('HistClinicaBundle:Convenio')->findAll();

        return $this->render('HistClinicaBundle:Convenio:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Convenio entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Convenio();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('convenio_show', array('id' => $entity->getId())));
        }

        return $this->render('HistClinicaBundle:Convenio:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Convenio entity.
     *
     * @param Convenio $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Convenio $entity)
    {
        $form = $this->createForm(new ConvenioType(), $entity, array(
            'action' => $this->generateUrl('convenio_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Convenio entity.
     *
     */
    public function newAction()
    {
        $entity = new Convenio();
        $form   = $this->createCreateForm($entity);

        return $this->render('HistClinicaBundle:Convenio:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Convenio entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HistClinicaBundle:Convenio')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Convenio entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('HistClinicaBundle:Convenio:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Convenio entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HistClinicaBundle:Convenio')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Convenio entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('HistClinicaBundle:Convenio:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Convenio entity.
    *
    * @param Convenio $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Convenio $entity)
    {
        $form = $this->createForm(new ConvenioType(), $entity, array(
            'action' => $this->generateUrl('convenio_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Convenio entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HistClinicaBundle:Convenio')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Convenio entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('convenio_edit', array('id' => $id)));
        }

        return $this->render('HistClinicaBundle:Convenio:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Convenio entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('HistClinicaBundle:Convenio')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Convenio entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('convenio'));
    }

    /**
     * Creates a form to delete a Convenio entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('convenio_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
