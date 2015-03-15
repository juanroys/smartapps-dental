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
    static public function TipoIdentificacionMinEnum(){
        return array( 0 => 'CC', 1 => 'RC', 2 => 'CE', 3=> 'TI');
    }
    static public function GeneroEnum(){
        return array( 1 => 'Masculino', 2 => 'Femenino');
    }
    static public function TipoAfiliacionEnum(){
        return array(0 => 'Ninguno', 1 => 'Cotizante', 2 => 'Beneficiario');
    }
    static public function EstadoCivilEnum(){
        return array(1 => 'Soltero', 2 => 'Casado', 3 => 'Unión libre' , 4 => 'Viudo');
    }
    static public function SiNoEnum(){
        return array(  0 => 'No', 1 => 'Si');
    }
    static public function OdontConvenDienParcialEnum(){
        return array(
            0 => array("nombre" => "Caries", 
                "icono"=>"none", 
                "tipo"=>"color",
                "color"=>"red"),
            1 => array("nombre" => "Obturado Resina", 
                "icono"=>"none", 
                "tipo"=>"color",
                "color"=>"blue"),
            2 => array("nombre" => "Obturado Amalgama", 
                "icono"=>"none", 
                "tipo"=>"color",
                "color"=>"black"),            
            3 => array("nombre" => "Desadaptada", 
                "icono"=>"none", 
                "tipo"=>"color",
                "color"=>"green"),
            4 => array("nombre" => "Sellante", 
                "icono"=>"sellante_blue", 
                "tipo"=>"imagen",
                "color"=>"blue"),
            5 => array("nombre" => "Prótesis", 
                "icono"=>"protPar_blue", 
                "tipo"=>"imagen",
                "color"=>"blue"),
            5 => array("nombre" => "Bracket", 
                "icono"=>"bracket_black", 
                "tipo"=>"imagen",
                "color"=>"black")

            );
    }
    static public function OdontConvenDienCompletoEnum(){
        return array(
            0 => array("nombre" => "Corona Completa", "imagen"=>"ccompleta_blue"),
            1 => array("nombre" => "Ausente", "imagen"=>"ausente_blue"),
            2 => array("nombre" => "Exodoncia Indicada", "imagen"=>"exoInd_red"),            
            3 => array("nombre" => "Endodoncia", "imagen"=>"endodoncia_blue"),            
            4 => array("nombre" => "Incluido", "imagen"=>"incluido_blue"),            
            6 => array("nombre" => "Prótesis", "imagen"=>"protCom_blue"),
            5 => array("nombre" => "Endodoncia Indicada", "imagen"=>"endInd_red"),
            7 => array("nombre" => "Implante", "imagen"=>"implante_black"),
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
