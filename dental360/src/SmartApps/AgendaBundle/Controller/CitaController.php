<?php

namespace SmartApps\AgendaBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use SmartApps\AgendaBundle\Entity\Cita;
use SmartApps\AgendaBundle\Form\CitaType;
use Symfony\Component\HttpFoundation\Response;
use DateTime;
use DateTimeZone;
use DateInterval;

// PHP will fatal error if we attempt to use the DateTime class without this being set.
date_default_timezone_set('UTC');

// Date Utilities
//----------------------------------------------------------------------------------------------


// Parses a string into a DateTime object, optionally forced into the given timezone.
function parseDateTimeCita($string, $timezone=null) {
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

class CitaEvent {

	// Tests whether the given ISO8601 string has a time-of-day or not
	const ALL_DAY_REGEX = '/^\d{4}-\d\d-\d\d$/'; // matches strings like "2013-12-29"

	public $title;
	public $allDay; // a boolean
	public $start; // a DateTime
	public $end; // a DateTime, or null
	public $properties = array(); // an array of other misc properties
        public $id;
        public $color;
        
	public function __construct($id, $title, $start, $end, $timezone=null)
	{
		$this->title = $title;
		$this->start = parseDateTimeCita($start, $timezone);
		$this->end = parseDateTimeCita($end, $timezone);
                $this->id = $id;
                $this->color = "#428BCA";
	}
      
	// Converts this Event object back to a plain data array, to be used for generating JSON
	public function toArray() {

		// Start with the misc properties (don't worry, PHP won't affect the original array)
		$array = $this->properties;
		$array['title'] = $this->title;
                $array['id'] = $this->id;
                $array['backgroundColor'] = $this->color;
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
        //$formato = 'Y-m-d';                 
        //$inicio = date("Y-m-d", time());
         $em = $this->getDoctrine()->getManager();
        $medicos = $em->getRepository('AgendaBundle:Medico')->findAll();
        $pacientes = $em->getRepository('HistClinicaBundle:Paciente')->findAll();
        //$tratamientos = $em->getRepository('HistClinicaBundle:Tratamiento')->findAll();
        $unidades = $em->getRepository('AgendaBundle:UnidadAtencion')->findAll();
        $convenios = $em->getRepository('HistClinicaBundle:Convenio')->findAll();
        //$hasta = DateTime::createFromFormat($formato, $inicio); //->add(new DateInterval('P90D'));        
        //$desde = DateTime::createFromFormat($formato, $inicio);
        //$horario =  $this->getHorarioLaboral($desde->format("Y-m-d"), $hasta->format("Y-m-d"));
        
        return $this->render('AgendaBundle:Cita:programacion.html.twig', array(
            'pacientes' => $pacientes, 
            'medicos' => $medicos,
            'unidades' => $unidades,
            'convenios' => $convenios,
        ));
    }
    
     public function citasmedicoAction()
    {    
        //$formato = 'Y-m-d';                 
        //$inicio = date("Y-m-d", time());
         $medicoId = -1;
        if(isset($_POST['medicoId']))
        {
         $medicoId = $_POST['medicoId'];   
        }         
         $em = $this->getDoctrine()->getManager();
        $medicos = $em->getRepository('AgendaBundle:Medico')->findAll();
        $pacientes = $em->getRepository('HistClinicaBundle:Paciente')->findAll();
        //$tratamientos = $em->getRepository('HistClinicaBundle:Tratamiento')->findAll();
        $unidades = $em->getRepository('AgendaBundle:UnidadAtencion')->findAll();
        $convenios = $em->getRepository('HistClinicaBundle:Convenio')->findAll();
        //$hasta = DateTime::createFromFormat($formato, $inicio); //->add(new DateInterval('P90D'));        
        //$desde = DateTime::createFromFormat($formato, $inicio);
        //$horario =  $this->getHorarioLaboral($desde->format("Y-m-d"), $hasta->format("Y-m-d"));        
        return $this->render('AgendaBundle:Cita:citasmedico.html.twig', array(
            'pacientes' => $pacientes, 
            'medicos' => $medicos,
            'unidades' => $unidades,
            'convenios' => $convenios,
            'idmedico' => $medicoId,
        ));
    }
    
    public function getDisponibilidades($startDate, $endDate)
    {
         /* $start = $_GET['start'];
        $end = $_GET['end'];        
        $formato = 'Y-m-d';                
        $interval = new DateInterval( "P1D" ); 
        $interval->invert = 1;        
        $startDate = DateTime::createFromFormat($formato, $start)->add($interval);        
        $endDate = DateTime::createFromFormat($formato, $end);
        */
        
        $em = $this->getDoctrine()->getManager();                
        $dispos = $em->getRepository('AgendaBundle:Disponibilidad')->getPorFecha( $startDate, $endDate);
        
        // Parse the timezone parameter if it is present.
        $timezone = null;
        if (isset($_GET['timezone'])) {
                $timezone = new DateTimeZone($_GET['timezone']);
        } 
        
        $output_arrays = array();
        
        foreach($dispos as $oDispo)
        {            
            $dispStartDate = $oDispo->getFechaDesde();
            if($dispStartDate < $startDate ){
                $dispStartDate = clone $startDate;
            }
            //$origHasta = clone $oDispo->getFechaHasta();
            $dispEndDate = $oDispo->getFechaHasta()->add(new DateInterval('P1D'));
            if($dispEndDate > $endDate){
                //echo 'fambia fecha hasta';
                $dispEndDate = clone $endDate;                        
            }                       
            $recorre = $dispStartDate;            
            while($recorre <= $dispEndDate)
            {   
                if($this->includeDate($recorre,$oDispo->getDiasSemana()))
                {
                    $contenido = '';
                    $contenido = $oDispo->getMedico()->getId();
                    /*if($conttype == 1)
                    {
                        if($oDispo->getFechaDesde() != $origHasta){
                                $contenido = $contenido . 'Desde: ' . $oDispo->getFechaDesde()->format('Y/m/d') . ' Hasta: ' . $oDispo->getFechaHasta()->format('Y/m/d') . ' ';
                            $contenido = $contenido . 'Días: ' . $this->getDiasString($oDispo->getDiasSemana()) ;
                        }                        
                    } */
                    $event = new CitaEvent($oDispo->getId(), $contenido, 
                                                $recorre->format('Y-m-d') . ' ' . $oDispo->getHoraInicio()->format('H:i:s'), 
                                                $recorre->format('Y-m-d') . ' ' . $oDispo->getHoraFin()->format('H:i:s'));
                    $output_arrays[] = $event;
                }                                
                $recorre = $recorre->add(new DateInterval('P1D'));
            } 
        }
        // Sort by start date
        /*usort($output_arrays, function($a, $b) {
              if ($a->start == $b->start) {
                return 0;
              }
              return $a->start < $b->start ? 1 : -1;
        });  */
        return $output_arrays;
    }
    
    public function getDisponibilidadesMedico($startDate, $endDate, $medicoid)
    {
         /* $start = $_GET['start'];
        $end = $_GET['end'];        
        $formato = 'Y-m-d';                
        $interval = new DateInterval( "P1D" ); 
        $interval->invert = 1;        
        $startDate = DateTime::createFromFormat($formato, $start)->add($interval);        
        $endDate = DateTime::createFromFormat($formato, $end);
        */
        
        $em = $this->getDoctrine()->getManager();                
        $dispos = $em->getRepository('AgendaBundle:Disponibilidad')->getPorMedicoYFecha($medicoid, $startDate, $endDate);
        
        // Parse the timezone parameter if it is present.
        $timezone = null;
        if (isset($_GET['timezone'])) {
                $timezone = new DateTimeZone($_GET['timezone']);
        } 
        
        $output_arrays = array();
        
        foreach($dispos as $oDispo)
        {            
            $dispStartDate = $oDispo->getFechaDesde();
            if($dispStartDate < $startDate ){
                $dispStartDate = clone $startDate;
            }
            //$origHasta = clone $oDispo->getFechaHasta();
            $dispEndDate = $oDispo->getFechaHasta()->add(new DateInterval('P1D'));
            if($dispEndDate > $endDate){
                //echo 'fambia fecha hasta';
                $dispEndDate = clone $endDate;                        
            }                       
            $recorre = $dispStartDate;            
            while($recorre <= $dispEndDate)
            {   
                if($this->includeDate($recorre,$oDispo->getDiasSemana()))
                {
                    $contenido = '';
                    $contenido = $oDispo->getMedico()->getId();
                    /*if($conttype == 1)
                    {
                        if($oDispo->getFechaDesde() != $origHasta){
                                $contenido = $contenido . 'Desde: ' . $oDispo->getFechaDesde()->format('Y/m/d') . ' Hasta: ' . $oDispo->getFechaHasta()->format('Y/m/d') . ' ';
                            $contenido = $contenido . 'Días: ' . $this->getDiasString($oDispo->getDiasSemana()) ;
                        }                        
                    } */
                    $event = new CitaEvent($oDispo->getId(), $contenido, 
                                                $recorre->format('Y-m-d') . ' ' . $oDispo->getHoraInicio()->format('H:i:s'), 
                                                $recorre->format('Y-m-d') . ' ' . $oDispo->getHoraFin()->format('H:i:s'));
                    $output_arrays[] = $event;
                }                                
                $recorre = $recorre->add(new DateInterval('P1D'));
            } 
        }
        // Sort by start date
        /*usort($output_arrays, function($a, $b) {
              if ($a->start == $b->start) {
                return 0;
              }
              return $a->start < $b->start ? 1 : -1;
        });  */
        return $output_arrays;
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
    
    public function getMedicCalendarAction($medicoid)
    {
        $start = $_GET['start'];
        $end = $_GET['end'];        
        $formato = 'Y-m-d';                
        $interval = new DateInterval( "P1D" ); 
        $interval->invert = 1;        
        $startDate = DateTime::createFromFormat($formato, $start)->add($interval);
        
        $endDate = DateTime::createFromFormat($formato, $end);
        
        $em = $this->getDoctrine()->getManager();                
        $citas = $em->getRepository('AgendaBundle:Cita')->getPorFechaMedico( $startDate, $endDate, $medicoid);
        
        /* ***************************************** */
        // Parse the timezone parameter if it is present.
        $timezone = null;
        if (isset($_GET['timezone'])) {
                $timezone = new DateTimeZone($_GET['timezone']);
        } 
        $output_arrays = array();
        foreach($citas as $cita)
        {               
            $contenido = $cita->getPaciente()->getNombreCompleto();
            
            $event = new CitaEvent($cita->getId(), $contenido, 
            $cita->getFecha()->format('Y-m-d') . ' ' . $cita->getHoraInicio()->format('H:i:s'), 
            $cita->getFecha()->format('Y-m-d') . ' ' . $cita->getHoraFin()->format('H:i:s'));
            $output_arrays[] = $event->toArray();
                        
        }
        // Send JSON to the client.
        //echo json_encode($output_arrays);
        
        // Se obtienen todas las disponibilidades
        $disponibilidades = $this->getDisponibilidadesMedico($startDate, $endDate, $medicoid);
        // Se genera un array para poder encontrar las no-disponibilidades
        $lst_end_start = array();
        foreach($disponibilidades as $dispo)
        {
            $lst_end_start[] = Array( "type" => "A",
                                      "time" =>  $dispo->start->format('YmdHis'),
                                      "realTime" => $dispo->start);
            $lst_end_start[] = Array( "type" => "B",
                                      "time" =>  $dispo->end->format('YmdHis'),
                                      "realTime" => $dispo->end);
        }        
        usort($lst_end_start, function($a, $b) { 
            $rdiff = $a['time'] - $b['time'];
            if ($rdiff) return $rdiff; 
            return $a['type'] - $b['type']; 
        });
        // Se recorre el array de marcas de disponibilidad para generar las no-disponibilidades
        $noStart = clone $startDate;        
        $stack = array();
        foreach($lst_end_start as $item)
        {
            if($item['type'] == 'A')
            {
                // Si la cola esta vacia es porque se termina una no-disponibilidad
                if(count($stack) == 0)
                {
                    $noEnd = clone $item['realTime'];
                    $event = new CitaEvent('nodisp' , '', 
                    $noStart->format('Y-m-d') . ' ' . $noStart->format('H:i:s'), 
                    $noEnd->format('Y-m-d') . ' ' . $noEnd->format('H:i:s'));
                    $event->color = "#1CA9A3";
                    $output_arrays[] = $event->toArray();
                }
                array_push($stack, 'A');                
            }
            else
            {
                array_pop($stack);
            }
            // si la cola queda vacia se inicia una no-disponibilidad
            if(count($stack) == 0)
            {
                $noStart = clone $item['realTime'];
            }            
        }
        $noEnd = clone $endDate;
        $event = new CitaEvent('nodisp'  , '', 
        $noStart->format('Y-m-d') . ' ' . $noStart->format('H:i:s'), 
        $noEnd->format('Y-m-d') . ' ' . $noEnd->format('H:i:s'));
        $event->color = "#1CA9A3";
        $output_arrays[] = $event->toArray();
        
       // echo json_encode($lst_end_start);
        
        return new Response(json_encode($output_arrays));
        
    }
    
    // Genera un listado de eventos que corresponden a las citas programadas entre dos fechas
    public function getAllCalendarAction()
    {
        $start = $_GET['start'];
        $end = $_GET['end'];        
        $formato = 'Y-m-d';                
        $interval = new DateInterval( "P1D" ); 
        $interval->invert = 1;        
        $startDate = DateTime::createFromFormat($formato, $start)->add($interval);
        
        $endDate = DateTime::createFromFormat($formato, $end);
        
        $em = $this->getDoctrine()->getManager();                
        $citas = $em->getRepository('AgendaBundle:Cita')->getPorFecha( $startDate, $endDate);
        
        /* ***************************************** */
        // Parse the timezone parameter if it is present.
        $timezone = null;
        if (isset($_GET['timezone'])) {
                $timezone = new DateTimeZone($_GET['timezone']);
        } 
        $output_arrays = array();
        foreach($citas as $cita)
        {               
            $contenido = $cita->getPaciente()->getNombreCompleto();
            
            $event = new CitaEvent($cita->getId(), $contenido, 
            $cita->getFecha()->format('Y-m-d') . ' ' . $cita->getHoraInicio()->format('H:i:s'), 
            $cita->getFecha()->format('Y-m-d') . ' ' . $cita->getHoraFin()->format('H:i:s'));
            $output_arrays[] = $event->toArray();
                        
        }
        // Send JSON to the client.
        //echo json_encode($output_arrays);
        
        // Se obtienen todas las disponibilidades
        $disponibilidades = $this->getDisponibilidades($startDate, $endDate);
        // Se genera un array para poder encontrar las no-disponibilidades
        $lst_end_start = array();
        foreach($disponibilidades as $dispo)
        {
            $lst_end_start[] = Array( "type" => "A",
                                      "time" =>  $dispo->start->format('YmdHis'),
                                      "realTime" => $dispo->start);
            $lst_end_start[] = Array( "type" => "B",
                                      "time" =>  $dispo->end->format('YmdHis'),
                                      "realTime" => $dispo->end);
        }        
        usort($lst_end_start, function($a, $b) { 
            $rdiff = $a['time'] - $b['time'];
            if ($rdiff) return $rdiff; 
            return $a['type'] - $b['type']; 
        });
        // Se recorre el array de marcas de disponibilidad para generar las no-disponibilidades
        $noStart = clone $startDate;        
        $stack = array();
        foreach($lst_end_start as $item)
        {
            if($item['type'] == 'A')
            {
                // Si la cola esta vacia es porque se termina una no-disponibilidad
                if(count($stack) == 0)
                {
                    $noEnd = clone $item['realTime'];
                    $event = new CitaEvent('nodisp' , '', 
                    $noStart->format('Y-m-d') . ' ' . $noStart->format('H:i:s'), 
                    $noEnd->format('Y-m-d') . ' ' . $noEnd->format('H:i:s'));
                    $event->color = "#1CA9A3";
                    $output_arrays[] = $event->toArray();
                }
                array_push($stack, 'A');                
            }
            else
            {
                array_pop($stack);
            }
            // si la cola queda vacia se inicia una no-disponibilidad
            if(count($stack) == 0)
            {
                $noStart = clone $item['realTime'];
            }            
        }
        $noEnd = clone $endDate;
        $event = new CitaEvent('nodisp'  , '', 
        $noStart->format('Y-m-d') . ' ' . $noStart->format('H:i:s'), 
        $noEnd->format('Y-m-d') . ' ' . $noEnd->format('H:i:s'));
        $event->color = "#1CA9A3";
        $output_arrays[] = $event->toArray();
        
       // echo json_encode($lst_end_start);
        
        return new Response(json_encode($output_arrays));
        
    }
    
    public function registerAction()
    {
        $medicoId = $_POST['medicoId'];
        $unidadId = $_POST['unidadId'];
        $pacienteId = $_POST['pacienteId'];
        $fecha = $_POST['fecha'];
        $horainicio = $_POST['horaInicio'];
        $horafin = $_POST['horaFin'];
        $estado = $_POST['estado'];
        $citaId = $_POST['citaId'];
        
        $em = $this->getDoctrine()->getManager();
        if($citaId != -1){
            $entity = $em->getRepository('AgendaBundle:Cita')->find($citaId);    
        }
        else{
            $entity = new Cita();            
        }
                
        if($medicoId > 0){            
            $entity->setMedico($em->getRepository('AgendaBundle:Medico')->find($medicoId));                    
        }
        if($unidadId > 0)
        {
            $entity->setUnidadAtencion($em->getRepository('AgendaBundle:UnidadAtencion')->find($unidadId));
        }
        if($pacienteId > 0)
        {
            $entity->setPaciente($em->getRepository('HistClinicaBundle:Paciente')->find($pacienteId));
        }
        $formato = 'Y-m-d H:i:s';
        $oFecha = DateTime::createFromFormat($formato, $fecha . ' 00:00:00' );
        $oInicio = DateTime::createFromFormat($formato, '1900-01-01 ' . $horainicio);
        $oFin = DateTime::createFromFormat($formato, '1900-01-01 ' . $horafin);
        
        $entity->setFecha($oFecha);
        $entity->setHoraInicio($oInicio);
        $entity->setHoraFin($oFin);
        $entity->setEstado($estado);
       
        $em->persist($entity);
        $em->flush();            
        
         $response = array(
            "sucess" => "ok"
        );
         
        return new Response(json_encode($response));
    }
    
    public function getCitaAction()
    {
        $id = $_POST['citaId'];
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AgendaBundle:Cita')->find($id);

        if (!$entity) {
             $response = array(
                "sucess" => "error",
                "error" => "¡La cita no existe!"
            );
            return new Response(json_encode($response));
        }

        $medicoId = -1;
        if($entity->getMedico() != null)
            $medicoId  = $entity->getMedico()->getId();
        $unidadId = -1;
       if($entity->getUnidadAtencion()!= null)
                $unidadId = $entity->getUnidadAtencion()->getId();
        $pacienteId = -1;
        if($entity->getPaciente() != null)
            $pacienteId = $entity->getPaciente()->getId();
        $response = array(
            "sucess" => "ok",
            "fecha" => $entity->getFecha()->format('Y-m-d'),
            "horaInicio" => $entity->getHoraInicio()->format('H:i'),
            "horaFin" => $entity->getHoraFin()->format('H:i'),
            "medicoId" => $medicoId,
            "unidadId" => $unidadId,
            "pacienteId" => $pacienteId,
            "estado" => $entity->getEstado(),
        );
        return new Response(json_encode($response));
    }
    
    public function removeAction()
    {
        $em = $this->getDoctrine()->getManager();
        $id = $_POST['citaId']; 
        $entity = $em->getRepository('AgendaBundle:Cita')->find($id);
        $em->remove($entity);
        $em->flush();
        $response = array(
            "sucess" => "ok",
        );
        return new Response(json_encode($response));
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
