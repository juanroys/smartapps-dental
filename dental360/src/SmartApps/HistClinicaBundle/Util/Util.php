<?php

namespace SmartApps\HistClinicaBundle\Util;

class Util
{
    static public function TipoPreguntaEnum(){
        return array( 0 => 'Sin definir', 
            1 => 'Texto', 
            2 => 'Numero', 
            3 => 'Radio', 
            4=> 'Check', 
            5 => 'AreaTexto', 
            6 => 'ComboBox',
            7 => 'Iframe',
            8 => 'Odontograma',
            9=>'Fecha');
    }
    
    static public function TipoIdentificacionEnum(){
        return array( 0 => 'Cédula de ciudadanía', 1 => 'Registro civil', 2 => 'Cédula extrangería', 3=> 'Tarjeta de identidad');
    }
    static public function GeneroEnum(){
        return array( '' => '', 1 => 'Masculino', 2 => 'Femenino');
    }
    static public function TipoAfiliacionEnum(){
        return array( 1 => 'Cotizante', 2 => 'Beneficiario');
    }
    static public function EstadoCivilEnum(){
        return array( '' => '', 1 => 'Soltero', 2 => 'Casado', 3 => 'Unión libre' , 4 => 'Viudo');
    }
    static public function SiNoEnum(){
        return array(  0 => 'No', 1 => 'Si');
    }
    static public function OdontConvenDienParcialEnum(){
        return array(
            0 => array("nombre" => "Caries", "icono"=>"none", "tipo"=>"color"),
            1 => array("nombre" => "Obturado", "icono"=>"obturado", "tipo"=>"imagen"),
            2 => array("nombre" => "Sellante", "icono"=>"sellante", "tipo"=>"imagen"),
            3 => array("nombre" => "Prótesis", "icono"=>"protPar", "tipo"=>"imagen")
            );
    }
    static public function OdontConvenDienCompletoEnum(){
        return array(
            0 => array("nombre" => "Corona Completa", "imagen"=>"ccompleta"),
            1 => array("nombre" => "Ausente", "imagen"=>"ausente"),
            2 => array("nombre" => "Exodoncia Indicada", "imagen"=>"exoInd"),            
            3 => array("nombre" => "Endodoncia", "imagen"=>"endodoncia"),            
            4 => array("nombre" => "Incluido", "imagen"=>"incluido"),
            5 => array("nombre" => "Endodoncia Indicada", "imagen"=>"endInd"),
            6 => array("nombre" => "Prótesis", "imagen"=>"protCom"),
            );
    }
    static public function OdontConvenColores(){
        return array(
            0 => array("nombre"=>"Negro", "color"=>"black"),
            1 => array("nombre"=>"Rojo", "color"=>"red"),
            2 => array("nombre"=>"Azul", "color"=>"blue"),
            3 => array("nombre"=>"Verde", "color"=>"green"),
        );
    }
}
