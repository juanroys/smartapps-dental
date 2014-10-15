<?php

namespace SmartApps\AgendaBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use SmartApps\AgendaBundle\Entity\Disponibilidad;
use SmartApps\AgendaBundle\Form\DisponibilidadType;
use Symfony\Component\HttpFoundation\Response;
use DateTime;
use DateTimeZone;
use DateInterval;

//--------------------------------------------------------------------------------------------------
// Utilities for our event-fetching scripts.
//
// Requires PHP 5.2.0 or higher.
//--------------------------------------------------------------------------------------------------

// PHP will fatal error if we attempt to use the DateTime class without this being set.
date_default_timezone_set('UTC');


// Date Utilities
//----------------------------------------------------------------------------------------------


// Parses a string into a DateTime object, optionally forced into the given timezone.
function parseDateTime($string, $timezone=null) {
	$date = new DateTime(
		$string,
		$timezone ? $timezone : new DateTimeZone('UTC')
			// Used only when the string is ambiguous.
			// Ignored if string has a timezone offset in it.
	);
	if ($timezone) {
		// If our timezone was ignored above, force it.
		$date->setTimezone($timezone);
	}
	return $date;
}


// Takes the year/month/date values of the given DateTime and converts them to a new DateTime,
// but in UTC.
function stripTime($datetime) {
	return new DateTime($datetime->format('Y-m-d'));
}


class CalendarEvent {

	// Tests whether the given ISO8601 string has a time-of-day or not
	const ALL_DAY_REGEX = '/^\d{4}-\d\d-\d\d$/'; // matches strings like "2013-12-29"

	public $title;
	public $allDay; // a boolean
	public $start; // a DateTime
	public $end; // a DateTime, or null
	public $properties = array(); // an array of other misc properties
        public $id;
        

	public function __construct($id, $title, $start, $end, $timezone=null)
	{
		$this->title = $title;
		$this->start = parseDateTime($start, $timezone);
		$this->end = parseDateTime($end, $timezone);
                $this->id = $id;
	}
        
	// Returns whether the date range of our event intersects with the given all-day range.
	// $rangeStart and $rangeEnd are assumed to be dates in UTC with 00:00:00 time.
	/*public function isWithinDayRange($rangeStart, $rangeEnd) {

		// Normalize our event's dates for comparison with the all-day range.
		$eventStart = stripTime($this->start);
		$eventEnd = isset($this->end) ? stripTime($this->end) : null;

		if (!$eventEnd) {
			// No end time? Only check if the start is within range.
			return $eventStart < $rangeEnd && $eventStart >= $rangeStart;
		}
		else {
			// Check if the two ranges intersect.
			return $eventStart < $rangeEnd && $eventEnd > $rangeStart;
		}
	}
        */

	// Converts this Event object back to a plain data array, to be used for generating JSON
	public function toArray() {

		// Start with the misc properties (don't worry, PHP won't affect the original array)
		$array = $this->properties;
		$array['title'] = $this->title;
                $array['id'] = $this->id;
                $array['backgroundColor'] = "#428BCA";
		// Figure out the date format. This essentially encodes allDay into the date string.
		if ($this->allDay) {
			$format = 'Y-m-d'; // output like "2013-12-29"
		}
		else {
			$format = 'c'; // full ISO8601 output, like "2013-12-29T09:00:00+08:00"
		}

		// Serialize dates into strings
		$array['start'] = $this->start->format($format);
		if (isset($this->end)) {
			$array['end'] = $this->end->format($format);
		}

		return $array;
	}

}

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
    
    /**
     * Registra una dispoinibilidad para un medico en particular
     */
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
    
    public function getEventsAction($id, $conttype){
        $start = $_GET['start'];
        $end = $_GET['end'];        
        $formato = 'Y-m-d';                
        $interval = new DateInterval( "P1D" ); 
        $interval->invert = 1;        
        $startDate = DateTime::createFromFormat($formato, $start)->add($interval);
        
        $endDate = DateTime::createFromFormat($formato, $end);
        
        $em = $this->getDoctrine()->getManager();                
        $dispos = $em->getRepository('AgendaBundle:Disponibilidad')->getPorMedicoYFecha($id, $startDate, $endDate);
        
        // Parse the timezone parameter if it is present.
        $timezone = null;
        if (isset($_GET['timezone'])) {
                $timezone = new DateTimeZone($_GET['timezone']);
        } 
        $output_arrays = array();
        foreach($dispos as $oDispo)
        {   
            //echo $oDispo->getId() . ' ';            
            $dispStartDate = $oDispo->getFechaDesde();
            if($dispStartDate < $startDate ){
                //echo 'fambia fecha desde';
                $dispStartDate = clone $startDate;
            }
            $origHasta = clone $oDispo->getFechaHasta();
            $dispEndDate = $oDispo->getFechaHasta()->add(new DateInterval('P1D'));
            if($dispEndDate > $endDate){
                //echo 'fambia fecha hasta';
                $dispEndDate = clone $endDate;                        
            }
                       
            $recorre = $dispStartDate;            
            //echo $oDispo->getId() . ' ';
            //echo $recorre->format('Y-m-d') . ' ';
            //echo $dispEndDate->format('Y-m-d') . ' ';
            while($recorre <= $dispEndDate)
            {   
                if($this->includeDate($recorre,$oDispo->getDiasSemana()))
                {
                    $contenido = '';
                    if($conttype == 1)
                    {
                        //$contenido = $oDispo->getMedico()->getNombreCompleto();
                        if($oDispo->getFechaDesde() != $origHasta){
                                $contenido = $contenido . 'Desde: ' . $oDispo->getFechaDesde()->format('Y/m/d') . ' Hasta: ' . $oDispo->getFechaHasta()->format('Y/m/d') . ' ';
                            $contenido = $contenido . 'Días: ' . $this->getDiasString($oDispo->getDiasSemana()) ;
                        }                        
                    } 
                    $event = new CalendarEvent($oDispo->getId(), $contenido, 
                    $recorre->format('Y-m-d') . ' ' . $oDispo->getHoraInicio()->format('H:i:s'), 
                    $recorre->format('Y-m-d') . ' ' . $oDispo->getHoraFin()->format('H:i:s'));
                    $output_arrays[] = $event->toArray();
                }                                
                $recorre = $recorre->add(new DateInterval('P1D'));
            } 
        }
        // Send JSON to the client.
        return new Response(json_encode($output_arrays));
        
    }
    
    
    function includeDate($fecha, $diasValue)
    {
        $diaSemana = $fecha->format('w');   
        if($diaSemana == 1){ $modulo = $diasValue % 2; }
        if($diaSemana == 2){ $modulo = $diasValue % 3; }
        if($diaSemana == 3){ $modulo = $diasValue % 5; }
        if($diaSemana == 4){ $modulo = $diasValue % 7; }
        if($diaSemana == 5){ $modulo = $diasValue % 11; }
        if($diaSemana == 6){ $modulo = $diasValue % 13; }
        if($diaSemana == 0){ $modulo = $diasValue % 17; }
        
        if($modulo == 0) 
            return true;
        else
            return false; 
    }
    
    function getDiasString($diasValue)
    {        
        $resultado = '';
        if($diasValue % 2 == 0){
            $resultado = $resultado . 'L';
        }
        if($diasValue % 3 == 0){
            if($resultado != ''){
                $resultado = $resultado . ', ';
            }
            $resultado = $resultado . 'Ma';
        }
        if($diasValue % 5 == 0){
            if($resultado != ''){
                $resultado = $resultado . ', ';
            }
            $resultado = $resultado . 'Mi';
        }
        if($diasValue % 7 == 0){
            if($resultado != ''){
                $resultado = $resultado . ', ';
            }
            $resultado = $resultado . 'J';
        }
        if($diasValue % 11 == 0){
            if($resultado != ''){
                $resultado = $resultado . ', ';
            }
            $resultado = $resultado . 'V';
        }
        if($diasValue % 13 == 0){
            if($resultado != ''){
                $resultado = $resultado . ', ';
            }
            $resultado = $resultado . 'S';
        }
        if($diasValue % 17 == 0){
            if($resultado != ''){
                $resultado = $resultado . ', ';
            }
            $resultado = $resultado . 'D';
        }
        
        return $resultado; 
    }
    
    public function deletedispoAction()
    {
        $id = $_POST['eventid'];
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AgendaBundle:Disponibilidad')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Disponibilidad entity.');
            }

            $em->remove($entity);
            $em->flush();
        
         $response = array(
            "sucess" => "ok"
        );
        return new Response(json_encode($response));
    }
    
    
}
