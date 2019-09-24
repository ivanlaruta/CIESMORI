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

    public function num_registros()
    {
      return DB::table('v_encuesta_detalle')->where('id_encuesta','=',$this->id)->count();
    }

   	 public function lista_ciudades()
    {
        return $this->hasMany('App\V_detalle_encuesta_ciudad','id_encuesta');
    }

}
