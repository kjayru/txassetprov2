<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public static function meses($fecha){
      
        $f = explode("-",$fecha);
        $mes  = $f[1];
        $year = $f[0];
        $dia = $f[2];

        if($mes==1){
           $mesnombre =  "Enero";
        }
        if($mes==2){
            $mesnombre = "Febrero";
        }
        if($mes==3){
            $mesnombre = "Marzo";
        }
        if($mes==4){
            $mesnombre = "Abril";
        }
        if($mes==5){
            $mesnombre = "Mayo";
        }
        if($mes==6){
            $mesnombre = "Junio";
        }
        if($mes==7){
            $mesnombre = "Julio";
        }
        if($mes==8){
            $mesnombre = "Agosto";
        }
        if($mes==9){
            $mesnombre = "Setiembre";
        }
        if($mes==10){
            $mesnombre = "Octubre";
        }
        if($mes==11){
            $mesnombre = "Noviembre";
        }
        if($mes==12){
            $mesnombre = "Diciembre";
        }
      
        $fechas= ['mes'=>$mes,"year"=>$year,"mesNombre"=>$mesnombre,'dia'=>$dia];
        
        return $fechas;
    }
}
