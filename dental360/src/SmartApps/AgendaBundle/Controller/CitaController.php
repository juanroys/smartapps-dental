<?php

namespace SmartApps\AgendaBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use SmartApps\AgendaBundle\Entity\Cita;
use SmartApps\AgendaBundle\Form\CitaType;
use DateTime;
use DateTimeZone;
use DateInterval;
/**
 * Cita controller.
 *
 */
class CitaController extends Controller
{

    /**
     * Lists all Cita entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AgendaBundle:Cita')->findAll();
        
        
        return $this->render('AgendaBundle:Cita:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    
     public function programacionAction()
    {    
         $formato = 'Y-m-d';                 
         $inicio = date("Y-m-d", time());
         
        $hasta = DateTime::createFromFormat($formato, $inicio); //->add(new DateInterval('P90D'));        
        $desde = DateTime::createFromFormat($formato, $inicio);
        $horario =  $this->getHorarioLaboral($desde->format("Y-m-d"), $hasta->format("Y-m-d"));
        
        return $this->render('AgendaBundle:Cita:programacion.html.twig', array(
            'horario' => $horario,
        ));
    }
    
    /**
     * Creates a new Cita entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Cita();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('cita_show', array('id' => $entity->getId())));
        }

        return $this->render('AgendaBundle:Cita:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Cita entity.
     *
     * @param Cita $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Cita $entity)
    {
        $form = $this->createForm(new CitaType(), $entity, array(
            'action' => $this->generateUrl('cita_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Cita entity.
     *
     */
    public function newAction()
    {
        $entity = new Cita();
        $form   = $this->createCreateForm($entity);

        return $this->render('AgendaBundle:Cita:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Cita entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AgendaBundle:Cita')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Cita entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AgendaBundle:Cita:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Cita entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AgendaBundle:Cita')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Cita entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AgendaBundle:Cita:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Cita entity.
    *
    * @param Cita $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Cita $entity)
    {
        $form = $this->createForm(new CitaType(), $entity, array(
            'action' => $this->generateUrl('cita_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Cita entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AgendaBundle:Cita')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Cita entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('cita_edit', array('id' => $id)));
        }

        return $this->render('AgendaBundle:Cita:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Cita entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AgendaBundle:Cita')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Cita entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('cita'));
    }

    /**
     * Creates a form to delete a Cita entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('cita_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
    
    
    function getHorarioLaboral($desde, $hasta){
        $formato = 'Y-m-d';                
        $interval = new DateInterval( "P1D" ); 
        $interval->invert = 1;        
        $startDate = DateTime::createFromFormat($formato, $desde);//->add($interval);        
        $endDate = DateTime::createFromFormat($formato, $hasta);
    
        
        //echo $oDispo->getId() . ' ';
        //echo $recorre->format('Y-m-d') . ' ';
        //echo $dispEndDate->format('Y-m-d') . ' ';
        $resultado = array();
        while($startDate <= $endDate)
        {   
            $singular = array();
            $singular['start'] = $startDate->format('Y-m-d') . 'T08:00:00';
            $singular['end'] =   $startDate->format('Y-m-d') . 'T18:00:00';
            $singular['title'] =   "";
            $singular['cls'] =  "jornadalaboral" ;                        
            
            $resultado[] =  $singular;
            $startDate = $startDate->add(new DateInterval('P1D'));
        } 
        
        return json_encode($resultado);
    }
    
}
