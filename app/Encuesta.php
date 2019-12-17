<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Encuesta extends Model
{
    protected $table = "encuesta";

    public function registros()
    {
        return $this->hasMany('App\V_detalle_encuesta','id_encuesta');
    }

    public function encabezado_multimedia()
    {
        return $this->hasMany('App\V_encabezado_multimedia','id_encuesta');
    }

    public function multimedia_encuestadores()
    {
        return $this->hasMany('App\V_detalle_multimedia','id_encuesta');
    }

    public function num_registros()
    {
      return DB::table('v_encuesta_detalle')->where('id_encuesta','=',$this->id)->count();
    }

   	public function lista_ciudades()
    {
        return $this->hasMany('App\V_detalle_encuesta_ciudad','id_encuesta');
    }
    public function lista_departamento()
    {
        return $this->hasMany('App\V_detalle_encuesta_departamento','id_encuesta');
    }

    public function cantidad_imagenes()
    {
        $dir = $this->carpeta_imagenes;
        if(file_exists($dir) && is_dir($dir))
        {
             $total_imagenes = count(glob($dir.'/{*.jpg,*.gif,*.png}',GLOB_BRACE));
             return($total_imagenes);
        }
        else
        {
             return(0);
        }
    }
    public function cantidad_audios()
    {
        $dir = $this->carpeta_audios;
        if(file_exists($dir) && is_dir($dir))
        {
             $total_imagenes = count(glob($dir.'/{*.mp3,*.wav,*.dct,*.wma,*.3gp}',GLOB_BRACE));
             return($total_imagenes);
        }
        else
        {
             return(0);
        }
    }

    public function cantidad_empleados()
    {
         $cantidad_empleados= DB::table('encuestador_encuesta')
         ->where('encuesta_id','=',$this->id)
         ->groupBy('encuesta_id')
         ->count();

         return($cantidad_empleados);

    }



}
