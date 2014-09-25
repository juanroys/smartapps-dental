<?php

namespace SmartApps\HistClinicaBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use SmartApps\HistClinicaBundle\Entity\TipoPregunta;
use SmartApps\HistClinicaBundle\Form\TipoPreguntaType;

/**
 * TipoPregunta controller.
 *
 */
class TipoPreguntaController extends Controller
{

    /**
     * Lists all TipoPregunta entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('HistClinicaBundle:TipoPregunta')->findAll();

        return $this->render('HistClinicaBundle:TipoPregunta:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new TipoPregunta entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new TipoPregunta();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('tipopregunta_show', array('id' => $entity->getId())));
        }

        return $this->render('HistClinicaBundle:TipoPregunta:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a TipoPregunta entity.
     *
     * @param TipoPregunta $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(TipoPregunta $entity)
    {
        $form = $this->createForm(new TipoPreguntaType(), $entity, array(
            'action' => $this->generateUrl('tipopregunta_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new TipoPregunta entity.
     *
     */
    public function newAction()
    {
        $entity = new TipoPregunta();
        $form   = $this->createCreateForm($entity);

        return $this->render('HistClinicaBundle:TipoPregunta:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a TipoPregunta entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HistClinicaBundle:TipoPregunta')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TipoPregunta entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('HistClinicaBundle:TipoPregunta:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing TipoPregunta entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HistClinicaBundle:TipoPregunta')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TipoPregunta entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('HistClinicaBundle:TipoPregunta:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a TipoPregunta entity.
    *
    * @param TipoPregunta $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(TipoPregunta $entity)
    {
        $form = $this->createForm(new TipoPreguntaType(), $entity, array(
            'action' => $this->generateUrl('tipopregunta_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing TipoPregunta entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HistClinicaBundle:TipoPregunta')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TipoPregunta entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('tipopregunta_edit', array('id' => $id)));
        }

        return $this->render('HistClinicaBundle:TipoPregunta:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a TipoPregunta entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('HistClinicaBundle:TipoPregunta')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find TipoPregunta entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('tipopregunta'));
    }

    /**
     * Creates a form to delete a TipoPregunta entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('tipopregunta_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
