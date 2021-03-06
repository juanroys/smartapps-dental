<?php

namespace SmartApps\AgendaBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use SmartApps\AgendaBundle\Entity\Medico;
use SmartApps\AgendaBundle\Form\MedicoType;

/**
 * Medico controller.
 *
 */
class MedicoController extends Controller
{

    /**
     * Lists all Medico entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        //$entities = $em->getRepository('AgendaBundle:Medico')->findAll();
        $paginador=  $this->get('ideup.simple_paginator');
        $entities=$paginador->paginate(
                $em->getRepository("AgendaBundle:Medico")->queryTodosLosMedicos()
                )->getResult();

        return $this->render('AgendaBundle:Medico:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    public function searchAction() {
        $search=filter_input(INPUT_POST, 'search',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $em = $this->getDoctrine()->getManager();
        $paginador = $this->get('ideup.simple_paginator');
        $paginador->paginate($em->getRepository("AgendaBundle:Medico")->queryBuscarMedicos($search));
        if ($paginador->getTotalItems() > 0) {
            $paginador->setItemsPerPage($paginador->getTotalItems());
        }
        $entities = $paginador->paginate(
                        $em->getRepository("AgendaBundle:Medico")->queryBuscarMedicos($search)
                )->getResult();
        return $this->render('AgendaBundle:Medico:index.html.twig', array(
                    'entities' => $entities,
                    'search' => $search
        ));
    }

    /**
     * Creates a new Medico entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Medico();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity->upload();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('medico', array('id' => $entity->getId())));
        }

        return $this->render('AgendaBundle:Medico:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Medico entity.
     *
     * @param Medico $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Medico $entity)
    {
        $form = $this->createForm(new MedicoType(), $entity, array(
            'action' => $this->generateUrl('medico_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Medico entity.
     *
     */
    public function newAction()
    {
        $entity = new Medico();
        $form   = $this->createCreateForm($entity);

        return $this->render('AgendaBundle:Medico:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Medico entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AgendaBundle:Medico')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Medico entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AgendaBundle:Medico:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Medico entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AgendaBundle:Medico')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Medico entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AgendaBundle:Medico:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Medico entity.
    *
    * @param Medico $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Medico $entity)
    {
        $form = $this->createForm(new MedicoType(), $entity, array(
            'action' => $this->generateUrl('medico_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Medico entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AgendaBundle:Medico')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Medico entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $entity->upload();
            $em->flush();

            return $this->redirect($this->generateUrl('medico', array('id' => $id)));
        }

        return $this->render('AgendaBundle:Medico:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Medico entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
       
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AgendaBundle:Medico')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Medico entity.');
            }

            $em->remove($entity);
            $em->flush();
       
        return $this->redirect($this->generateUrl('medico'));
    }

    /**
     * Creates a form to delete a Medico entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('medico_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
    
    public function disponibleAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        //$entities = $em->getRepository('AgendaBundle:Medico')->findAll();
        return $this->render('AgendaBundle:Medico:disponible.html.twig', array(
            'idmedico' => $id,
        ));
    }
}
