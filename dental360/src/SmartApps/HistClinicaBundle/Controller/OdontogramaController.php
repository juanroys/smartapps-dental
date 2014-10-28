<?php

namespace SmartApps\HistClinicaBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use SmartApps\HistClinicaBundle\Entity\Odontograma;
use Symfony\Component\HttpFoundation\Response;
use DateTime;
use SmartApps\HistClinicaBundle\Util\Util;

class OdontogramaController extends Controller {

    public function newAction($idHistoria) {
        $em = $this->getDoctrine()->getManager();
        $historiaClinica = $em->getRepository('HistClinicaBundle:HistoriaClinica')->find($idHistoria);
        $diagnosticos = $em->getRepository('HistClinicaBundle:DiagnosticoDiente')->findDiagnosticoPorHistoria($idHistoria);
        $convenParcial = Util::OdontConvenDienParcialEnum();
        $convenCompleto = Util::OdontConvenDienCompletoEnum();
        $colores = Util::OdontConvenColores();
        return $this->render('HistClinicaBundle:Odontograma:new.html.twig', array(
                    'historiaClinica' => $historiaClinica,
                    'diagnosticos' => $diagnosticos,
                    'convenParcial' => $convenParcial,
                    'convenCompleto' => $convenCompleto,
                    'colores' => $colores
        ));
    }

    public function createAction() {
        $datos = $_POST;
        $idDiente = $datos["idDiente"];
        $indiceActual = $datos["indiceActual"];
        $arrayDiagActual = $datos["arrayDiagActual"];
        $idHistoria = $datos["idHistoria"];
        list($cuadrante, $numero, $fila) = split('_', $idDiente);
        $em = $this->getDoctrine()->getManager();
        $historiaClinica = $em->getRepository('HistClinicaBundle:HistoriaClinica')->find($idHistoria);
        for ($i = 0; $i < count($arrayDiagActual); $i++) {
            $diagnostico = $em->getRepository('HistClinicaBundle:DiagnosticoDiente')->findDiagnosticoPorUbicacion($idHistoria, $cuadrante, $numero, $fila, $i);
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
                    $item = $em->getRepository('HistClinicaBundle:ItemOdontograma')->findItemPorUbicacion($cuadrante, $numero, $fila);
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

        /* for ($i = 1; $i <= 4; $i++) {
          if($i<=2){
          for($k=1;$k<=2;$k++)
          for ($j = 1; $j <= 8; $j++) {
          $item=new \SmartApps\HistClinicaBundle\Entity\ItemOdontograma();
          $item->setNoFila($i);
          $item->setNoCuadrante($k);
          $item->setNoDiente($j);
          $em->persist($item);
          }
          }else{
          for($k=3;$k<=4;$k++)
          for ($j = 1; $j <= 8; $j++) {
          $item=new \SmartApps\HistClinicaBundle\Entity\ItemOdontograma();
          $item->setNoFila($i);
          $item->setNoCuadrante($k);
          $item->setNoDiente($j);
          $em->persist($item);
          }
          }
          } */
        $response = array("ok" => true);
        return new Response(json_encode($response));
    }

}
