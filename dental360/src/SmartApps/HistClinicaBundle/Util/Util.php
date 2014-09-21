<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

abstract class BasicEnum {
    //private static $constCacheArray = NULL;

    public static function getArray(){
        return NULL;
    }
           
    public static function getValue($key){
        $array = getArray();
        return $array[$key];
    }
  
}

abstract class PacienteSexoEnum extends BasicEnum {
    const values = array( 0 => 'Mujer' , 1 => 'Hombre');
    
     public static function getArray(){
        return values;
    }
}
