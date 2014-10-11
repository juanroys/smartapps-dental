<?php

namespace SmartApps\AgendaBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use SmartApps\AgendaBundle\Entity\Disponibilidad;
use SmartApps\AgendaBundle\Form\DisponibilidadType;
use Symfony\Component\HttpFoundation\Response;
use DateTime;
/**
 * Disponibilidad controller.
 *
 */
class DisponibilidadController extends Controller
{

    /**
     * Lists all Disponibilidad entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AgendaBundle:Disponibilidad')->findAll();

        return $this->render('AgendaBundle:Disponibilidad:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Disponibilidad entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Disponibilidad();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('disponibilidad_show', array('id' => $entity->getId())));
        }

        return $this->render('AgendaBundle:Disponibilidad:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    public function registerAction(){
         $em = $this->getDoctrine()->getManager();
        $entity = new Disponibilidad();
        $medicoId = $_POST['medicoId'];
        $medico = $em->getRepository('AgendaBundle:Medico')->find($medicoId);
        $entity->setMedico($medico);
        
        $formato = 'Y-m-d H:i:s';
        $fechaInicio = DateTime::createFromFormat($formato, $_POST['fechaInicio'] . ' 00:00:00' );
        $fechaFin = DateTime::createFromFormat($formato, $_POST['fechaFin'] . ' 00:00:00');
        $entity->setFechaDesde($fechaInicio);
        $entity->setFechaHasta($fechaFin);
        
        $formatohora = 'Y-m-d H:i:s';
        $horaInicio = DateTime::createFromFormat($formatohora, '1900-01-01 ' . $_POST['horaInicio']);
        $horaFin = DateTime::createFromFormat($formatohora, '1900-01-01 ' .$_POST['horaFin']);
        
        $entity->setHoraInicio($horaInicio);
        $entity->setHoraFin($horaFin);        
        $entity->setDiasSemana($_POST['dias']);
        $em->persist($entity);
        $em->flush();
        
        $response = array(
            "sucess" => "ok",
            "disponibleID" => $entity->getId()
        );
        return new Response(json_encode($response));
    }
    
    /**
     * Creates a form to create a Disponibilidad entity.
     *
     * @param Disponibilidad $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Disponibilidad $entity)
    {
        $form = $this->createForm(new DisponibilidadType(), $entity, array(
            'action' => $this->generateUrl('disponibilidad_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Disponibilidad entity.
     *
     */
    public function newAction()
    {
        $entity = new Disponibilidad();
        $form   = $this->createCreateForm($entity);

        return $this->render('AgendaBundle:Disponibilidad:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }
    
    

    /**
     * Finds and displays a Disponibilidad entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AgendaBundle:Disponibilidad')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Disponibilidad entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AgendaBundle:Disponibilidad:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Disponibilidad entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AgendaBundle:Disponibilidad')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Disponibilidad entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AgendaBundle:Disponibilidad:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Disponibilidad entity.
    *
    * @param Disponibilidad $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Disponibilidad $entity)
    {
        $form = $this->createForm(new DisponibilidadType(), $entity, array(
            'action' => $this->generateUrl('disponibilidad_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Disponibilidad entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AgendaBundle:Disponibilidad')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Disponibilidad entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('disponibilidad_edit', array('id' => $id)));
        }

        return $this->render('AgendaBundle:Disponibilidad:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Disponibilidad entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AgendaBundle:Disponibilidad')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Disponibilidad entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('disponibilidad'));
    }

    /**
     * Creates a form to delete a Disponibilidad entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('disponibilidad_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
