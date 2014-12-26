<?php

namespace SmartApps\HistClinicaBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use SmartApps\HistClinicaBundle\Entity\Procedimiento;
use SmartApps\HistClinicaBundle\Form\ProcedimientoType;

/**
 * Procedimiento controller.
 *
 * @Route("/procedimiento")
 */
class ProcedimientoController extends Controller
{

    /**
     * Lists all Procedimiento entities.
     *
     * @Route("/", name="procedimiento")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        //$entities = $em->getRepository('HistClinicaBundle:Procedimiento')->findAll();
        $paginador=  $this->get('ideup.simple_paginator');
        $entities=$paginador->paginate(
                $em->getRepository("HistClinicaBundle:Procedimiento")->queryTodosLosProcedimientos()
                )->getResult();
        return $this->render('HistClinicaBundle:Procedimiento:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    public function searchAction() {
        $search=filter_input(INPUT_POST, 'search',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $em = $this->getDoctrine()->getManager();
        $paginador = $this->get('ideup.simple_paginator');
        $paginador->paginate($em->getRepository("HistClinicaBundle:Procedimiento")->queryBuscarProcedimientos($search));
        if ($paginador->getTotalItems() > 0) {
            $paginador->setItemsPerPage($paginador->getTotalItems());
        }
        $entities = $paginador->paginate(
                        $em->getRepository("HistClinicaBundle:Procedimiento")->queryBuscarProcedimientos($search)
                )->getResult();
        return $this->render('HistClinicaBundle:Procedimiento:index.html.twig', array(
                    'entities' => $entities,
                    'search' => $search
        ));
    }
    /**
     * Creates a new Procedimiento entity.
     *
     * @Route("/", name="procedimiento_create")
     * @Method("POST")
     * @Template("HistClinicaBundle:Procedimiento:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Procedimiento();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('procedimiento'));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Procedimiento entity.
     *
     * @param Procedimiento $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Procedimiento $entity)
    {
        $form = $this->createForm(new ProcedimientoType(), $entity, array(
            'action' => $this->generateUrl('procedimiento_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Procedimiento entity.
     *
     * @Route("/new", name="procedimiento_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Procedimiento();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Procedimiento entity.
     *
     * @Route("/{id}", name="procedimiento_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HistClinicaBundle:Procedimiento')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Procedimiento entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Procedimiento entity.
     *
     * @Route("/{id}/edit", name="procedimiento_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HistClinicaBundle:Procedimiento')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Procedimiento entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a Procedimiento entity.
    *
    * @param Procedimiento $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Procedimiento $entity)
    {
        $form = $this->createForm(new ProcedimientoType(), $entity, array(
            'action' => $this->generateUrl('procedimiento_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Procedimiento entity.
     *
     * @Route("/{id}", name="procedimiento_update")
     * @Method("PUT")
     * @Template("HistClinicaBundle:Procedimiento:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HistClinicaBundle:Procedimiento')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Procedimiento entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('procedimiento'));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Procedimiento entity.
     *
     * @Route("/{id}", name="procedimiento_delete")
     * @Method("DELETE")
     */
    public function deleteAction($id)
    {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('HistClinicaBundle:Procedimiento')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Procedimiento entity.');
            }

            $em->remove($entity);
            $em->flush();       

        return $this->redirect($this->generateUrl('procedimiento'));
    }

    /**
     * Creates a form to delete a Procedimiento entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('procedimiento_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
