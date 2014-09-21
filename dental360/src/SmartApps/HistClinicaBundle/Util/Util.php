<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/* abstract class BasicEnum {
    //private static $constCacheArray = NULL;

    public static function getArray(){
        return NULL;
    }
           
    public static function getValue($key){
        $array = getArray();
        return $array[$key];
    }
  
}

abstract class SexoEnum extends BasicEnum {
    const values = array( 0 => '' , 1 => 'Masculino', 2 => 'Femenino');
    
     public static function getArray(){  return values; }
}

abstract class TipoIdentificacionEnum extends BasicEnum {
    const values = array( 0 => '' , 1 => 'Cédula de ciudadanía', 2 => 'Registro civil', 3 => 'Cédula extrangería', 4=> 'Tarjeta de identidad');
    
     public static function getArray(){  return values; }
}
*/
namespace SmartApps\HistClinicaBundle\Util;

class Util
{
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
}
