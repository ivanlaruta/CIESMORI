<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Encuestador_turno extends Model
{
     protected $table = "encuestador_horario_disponible";
    protected $fillable = [
    	'encuestador_id','cod_horario_disponible','observacion','estado'
    ];

    public function horario_disponible_p()
    {
         $v= Parametrica::where('tabla','=', 'horario_disponible')->where('codigo','=',$this->cod_horario_disponible)->get();
          return($v[0]);
    }
}
