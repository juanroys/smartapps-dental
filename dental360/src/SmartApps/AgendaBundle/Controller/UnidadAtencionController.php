<?php

namespace SmartApps\AgendaBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use SmartApps\AgendaBundle\Entity\UnidadAtencion;
use SmartApps\AgendaBundle\Form\UnidadAtencionType;

/**
 * UnidadAtencion controller.
 *
 */
class UnidadAtencionController extends Controller
{

    /**
     * Lists all UnidadAtencion entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        //$entities = $em->getRepository('HistClinicaBundle:Grupo')->findAll();
        $paginador=  $this->get('ideup.simple_paginator');
        $entities=$paginador->paginate(
                $em->getRepository("AgendaBundle:UnidadAtencion")->queryTodasLasUnidades()
                )->getResult();

        return $this->render('AgendaBundle:UnidadAtencion:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    public function searchAction() {
        $search=filter_input(INPUT_POST, 'search',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $em = $this->getDoctrine()->getManager();
        $paginador = $this->get('ideup.simple_paginator');
        $paginador->paginate($em->getRepository("AgendaBundle:UnidadAtencion")->queryBuscarUnidades($search));
        if ($paginador->getTotalItems() > 0) {
            $paginador->setItemsPerPage($paginador->getTotalItems());
        }
        $entities = $paginador->paginate($em->getRepository("AgendaBundle:UnidadAtencion")->queryBuscarUnidades($search))->getResult();
        return $this->render('AgendaBundle:UnidadAtencion:index.html.twig', array(
                    'entities' => $entities,
                    'search' => $search
        ));
    }
    /**
     * Creates a new UnidadAtencion entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new UnidadAtencion();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('unidadatencion', array('id' => $entity->getId())));
        }

        return $this->render('AgendaBundle:UnidadAtencion:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a UnidadAtencion entity.
     *
     * @param UnidadAtencion $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(UnidadAtencion $entity)
    {
        $form = $this->createForm(new UnidadAtencionType(), $entity, array(
            'action' => $this->generateUrl('unidadatencion_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new UnidadAtencion entity.
     *
     */
    public function newAction()
    {
        $entity = new UnidadAtencion();
        $form   = $this->createCreateForm($entity);

        return $this->render('AgendaBundle:UnidadAtencion:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a UnidadAtencion entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AgendaBundle:UnidadAtencion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find UnidadAtencion entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AgendaBundle:UnidadAtencion:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing UnidadAtencion entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AgendaBundle:UnidadAtencion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find UnidadAtencion entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AgendaBundle:UnidadAtencion:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a UnidadAtencion entity.
    *
    * @param UnidadAtencion $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(UnidadAtencion $entity)
    {
        $form = $this->createForm(new UnidadAtencionType(), $entity, array(
            'action' => $this->generateUrl('unidadatencion_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing UnidadAtencion entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AgendaBundle:UnidadAtencion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find UnidadAtencion entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('unidadatencion', array('id' => $id)));
        }

        return $this->render('AgendaBundle:UnidadAtencion:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a UnidadAtencion entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AgendaBundle:UnidadAtencion')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find UnidadAtencion entity.');
            }

            $em->remove($entity);
            $em->flush();
     
        return $this->redirect($this->generateUrl('unidadatencion'));
    }

    /**
     * Creates a form to delete a UnidadAtencion entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('unidadatencion_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
