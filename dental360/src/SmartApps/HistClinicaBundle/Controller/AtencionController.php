<?php

namespace SmartApps\HistClinicaBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use SmartApps\HistClinicaBundle\Entity\Atencion;
use Symfony\Component\HttpFoundation\Response;
use DateTime;

class AtencionController extends Controller {

    public function newAction($historiaId) {
        $em = $this->getDoctrine()->getManager();
        $username = $this->get('security.context')->getToken()->getUser();
        $medico = $em->getRepository('AgendaBundle:Medico')->findMedicoPorUsuario($username->getId());
        $procedimientos = $em->getRepository('HistClinicaBundle:Procedimiento')->findBy(array('activo'=>1));
        $historiaClinica = $em->getRepository('HistClinicaBundle:HistoriaClinica')->find($historiaId);
        $atenciones = $em->getRepository('HistClinicaBundle:Atencion')->findAtencionPorHistoria($historiaId);
        $paciente = $historiaClinica->getPaciente();
        return $this->render('HistClinicaBundle:Atencion:new.html.twig', array(
                    'procedimientos' => $procedimientos,
                    'paciente' => $paciente,
                    'atenciones' => $atenciones,
                    'medico' => $medico,
        ));
    }
    public function exportarAction($historiaId) {
        $em = $this->getDoctrine()->getManager();
        $historiaClinica = $em->getRepository('HistClinicaBundle:HistoriaClinica')->find($historiaId);
        $atenciones = $em->getRepository('HistClinicaBundle:Atencion')->findAtencionPorHistoria($historiaId);
        $paciente = $historiaClinica->getPaciente();
        return $this->render('HistClinicaBundle:Atencion:exportar.html.twig', array(
                    'paciente' => $paciente,
                    'atenciones' => $atenciones
        ));
    }

    public function loadFileAction() {
        $pacienteId = $_POST['pacienteId'];
        $tmp_file_name = $_FILES['Filedata']['tmp_name'];
        $today = date("Y-m-d");
        //$name = 'uploads/pacientes/' . $_FILES['Filedata']['name'];
        $temp = explode(".", $_FILES["Filedata"]["name"]);
        $newfilename = 'firma_' . $pacienteId . '_' . $today . '.' . end($temp);
        $name = 'uploads/pacientes/' . $newfilename;
        $ok = move_uploaded_file($tmp_file_name, $name);
        $ok = $ok ? $newfilename : false;
        $response = $ok;
        return new Response(json_encode($response));
    }

    public function createAction() {
        $datos = $_POST;
        $fechaPost = $datos["fecha"];
        $formato = 'Y-m-d H:i:s';
        $fecha = DateTime::createFromFormat($formato, $fechaPost);
        //se cambia el nombre de procedimientos a tratamientos solo durante el envio de los datos
        $tratamientos = $datos["tratamientos"];
        $firmaPaciente = $datos["firmaPaciente"];
        //$abono = $datos["abono"];
        $abono=0;
        //$reciboNo = $datos["recibo"];
        $reciboNo=0;
        $total = $datos["total"];        
        //$saldo = $datos["saldo"];
        $saldo=$total*-1;
        $pacienteId = $datos["pacienteId"];

        //cargando historia clinica del paciente
        $em = $this->getDoctrine()->getManager();
        $historia = $em->getRepository('HistClinicaBundle:HistoriaClinica')->findHistoriaClinicaPorPaciente($pacienteId);
        //cargando datos del medico logueado
        $username = $this->get('security.context')->getToken()->getUser();
        $medico = $em->getRepository('AgendaBundle:Medico')->findMedicoPorUsuario($username->getId());
        
        //creando objeto atencion
        $atencion = new Atencion();
        $atencion->setAbono($abono);
        $atencion->setCostoTotal($total);
        $atencion->setFechaHora($fecha);
        $atencion->setFirmaPaciente($firmaPaciente);
        $atencion->setHistoriaClinica($historia);
        $atencion->setSaldo($saldo);
        $atencion->setMedico($medico);
        if (intval($abono) != 0 && trim($reciboNo)!="") {
            $recibo = new \SmartApps\ContableBundle\Entity\Recibo();
            $recibo->setAbono($abono);
            $recibo->setFecha($fecha);
            $recibo->setNumero($reciboNo);
            $recibo->setAtencion($atencion);
            $atencion->setRecibo($recibo);
            $em->persist($recibo);
        }
        $em->persist($atencion);
        
        foreach ($tratamientos as $tr){
            $tratamiento=new \SmartApps\HistClinicaBundle\Entity\Tratamiento();
            $procedimiento = $em->getRepository('HistClinicaBundle:Procedimiento')->find($tr[0]);    
            $tratamiento->setProcedimiento($procedimiento);
            $tratamiento->setDiente($tr[1]);
            $tratamiento->setCostoProcedimiento($tr[2]);
            $tratamiento->setAtencion($atencion);
            $atencion->getTratamientos()->add($tratamiento);
            $em->persist($tratamiento);
        }
        $em->flush();
        $atencionPersist=$em->getRepository('HistClinicaBundle:Atencion')->find($atencion->getId());
        //codificando respuesta para agregar a la tabla de atencion
        $response=array();
        $cont=0;
        foreach ($atencionPersist->getTratamientos() as $tr){
            $tratamiento=array();
            $tratamiento["tratamientoId"]=$tr->getId();
            $tratamiento["fecha"]=$atencionPersist->getFechaHora()->format('Y-m-d');
            $tratamiento["diente"]=$tr->getDiente();
            $tratamiento["hora"]=$atencionPersist->getFechaHora()->format('H:i:s');
            $tratamiento["procedimiento"]=$tr->getProcedimiento()->getDescripcion();
            $tratamiento["firmaOdontologo"]=$atencionPersist->getMedico()->getPathFirma();
            $tratamiento["firmaPaciente"]=$atencionPersist->getFirmaPaciente();
            $tratamiento["costoTotal"]=$tr->getCostoProcedimiento();
            
            $response[$cont]=$tratamiento;
            $cont++;
        }
        return new Response(json_encode($response));
    }

}
