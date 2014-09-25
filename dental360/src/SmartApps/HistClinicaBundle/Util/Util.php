<?php

namespace SmartApps\HistClinicaBundle\Util;

class Util
{
    static public function TipoPreguntaEnum(){
        return array( 0 => 'Sin definir', 1 => 'Texto', 2 => 'Numero', 3 => 'Radio', 4=> 'Check', 5 => 'AreaTexto', 6 => 'ComboBox');
    }
    
    static public function TipoIdentificacionEnum(){
        return array( 1 => 'Cédula de ciudadanía', 2 => 'Registro civil', 3 => 'Cédula extrangería', 4=> 'Tarjeta de identidad');
    }
    static public function GeneroEnum(){
        return array(  1 => 'Masculino', 2 => 'Femenino');
    }
    static public function TipoAfiliacionEnum(){
        return array( 1 => 'Cotizante', 2 => 'Beneficiario');
    }
    static public function EstadoCivilEnum(){
        return array(  1 => 'Soltero', 2 => 'Casado', 3 => 'Unión libre' , 4 => 'Viudo');
    }
    
    static public function SiNoEnum(){
        return array(  0 => 'No', 1 => 'Si');
    }
}
