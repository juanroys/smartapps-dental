<?php

namespace SmartApps\HistClinicaBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use SmartApps\HistClinicaBundle\Entity\Odontograma;
use Symfony\Component\HttpFoundation\Response;
use DateTime;
use SmartApps\HistClinicaBundle\Util\Util;

class OdontogramaController extends Controller {

    public function newAction($historiaId, $grupoId) {
        $em = $this->getDoctrine()->getManager();
        $historiaClinica = $em->getRepository('HistClinicaBundle:HistoriaClinica')->find($historiaId);
        $diagnosticos = $em->getRepository('HistClinicaBundle:DiagnosticoDiente')->findDiagnosticoPorHistoria($historiaId, $grupoId);
        $odontograma = $em->getRepository('HistClinicaBundle:Odontograma')->findOneBy(array('grupo' => $grupoId));
        $convenParcial = Util::OdontConvenDienParcialEnum();
        $convenCompleto = Util::OdontConvenDienCompletoEnum();
        $colores = Util::OdontConvenColores();
        return $this->render('HistClinicaBundle:Odontograma:new.html.twig', array(
                    'historiaClinica' => $historiaClinica,
                    'diagnosticos' => $diagnosticos,
                    'convenParcial' => $convenParcial,
                    'convenCompleto' => $convenCompleto,
                    'colores' => $colores,
                    'odontograma' => $odontograma
        ));
    }

    public function createAction() {
        $datos = $_POST;
        $dienteId = $datos["dienteId"];
        $indiceActual = $datos["indiceActual"];
        $arrayDiagActual = $datos["arrayDiagActual"];
        $historiaId = $datos["historiaId"];
        $odontogramaId=$datos["odontogramaId"];
        list($cuadrante, $numero, $fila) = split('_', $dienteId);
        $em = $this->getDoctrine()->getManager();
        $historiaClinica = $em->getRepository('HistClinicaBundle:HistoriaClinica')->find($historiaId);
        for ($i = 0; $i < count($arrayDiagActual); $i++) {
            $diagnostico = $em->getRepository('HistClinicaBundle:DiagnosticoDiente')->findDiagnosticoPorUbicacion($historiaId, $cuadrante, $numero, $fila, $i,$odontogramaId);
            if ($diagnostico != null) {
                if ($arrayDiagActual[$i] != null && strcmp($arrayDiagActual[$i][0], 'none') != 0) {
                    $diagnostico->setTipoIcono($arrayDiagActual[$i][1]);
                    $diagnostico->setIcono($arrayDiagActual[$i][2]);
                    $diagnostico->setTipoDiagnostico($arrayDiagActual[$i][0]);
                } else {
                    $em->remove($diagnostico);
                }
            } else {
                if ($arrayDiagActual[$i] != null && strcmp($arrayDiagActual[$i][0], 'none') != 0) {
                    $nuevoDiagnostico = new \SmartApps\HistClinicaBundle\Entity\DiagnosticoDiente();
                    $nuevoDiagnostico->setHistoriaClinica($historiaClinica);
                    $item = $em->getRepository('HistClinicaBundle:ItemOdontograma')->findItemPorUbicacion($cuadrante, $numero, $fila,$odontogramaId);
                    if ($item != null) {
                        $nuevoDiagnostico->setItemOdontograma($item);
                    }
                    $nuevoDiagnostico->setTipoDiagnostico($arrayDiagActual[$i][0]);
                    $nuevoDiagnostico->setUbicacion($i);
                    $nuevoDiagnostico->setTipoIcono($arrayDiagActual[$i][1]);
                    $nuevoDiagnostico->setIcono($arrayDiagActual[$i][2]);
                    $em->persist($nuevoDiagnostico);
                }
            }
        }
        $em->flush();
        $response = array("ok" => true);
        return new Response(json_encode($response));
    }

}
