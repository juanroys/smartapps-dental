<?php

namespace SmartApps\HistClinicaBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use SmartApps\HistClinicaBundle\Entity\OpcionRespuesta;
use SmartApps\HistClinicaBundle\Form\OpcionRespuestaType;

/**
 * OpcionRespuesta controller.
 *
 */
class OpcionRespuestaController extends Controller
{

    /**
     * Lists all OpcionRespuesta entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('HistClinicaBundle:OpcionRespuesta')->findAll();

        return $this->render('HistClinicaBundle:OpcionRespuesta:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new OpcionRespuesta entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new OpcionRespuesta();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('opcionrespuesta_show', array('id' => $entity->getId())));
        }

        return $this->render('HistClinicaBundle:OpcionRespuesta:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a OpcionRespuesta entity.
     *
     * @param OpcionRespuesta $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(OpcionRespuesta $entity)
    {
        $form = $this->createForm(new OpcionRespuestaType(), $entity, array(
            'action' => $this->generateUrl('opcionrespuesta_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new OpcionRespuesta entity.
     *
     */
    public function newAction()
    {
        $entity = new OpcionRespuesta();
        $form   = $this->createCreateForm($entity);

        return $this->render('HistClinicaBundle:OpcionRespuesta:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a OpcionRespuesta entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HistClinicaBundle:OpcionRespuesta')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find OpcionRespuesta entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('HistClinicaBundle:OpcionRespuesta:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing OpcionRespuesta entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HistClinicaBundle:OpcionRespuesta')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find OpcionRespuesta entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('HistClinicaBundle:OpcionRespuesta:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a OpcionRespuesta entity.
    *
    * @param OpcionRespuesta $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(OpcionRespuesta $entity)
    {
        $form = $this->createForm(new OpcionRespuestaType(), $entity, array(
            'action' => $this->generateUrl('opcionrespuesta_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing OpcionRespuesta entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HistClinicaBundle:OpcionRespuesta')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find OpcionRespuesta entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('opcionrespuesta_edit', array('id' => $id)));
        }

        return $this->render('HistClinicaBundle:OpcionRespuesta:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a OpcionRespuesta entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('HistClinicaBundle:OpcionRespuesta')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find OpcionRespuesta entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('opcionrespuesta'));
    }

    /**
     * Creates a form to delete a OpcionRespuesta entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('opcionrespuesta_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
