<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Encuestador_tipo_estudio extends Model
{
    protected $table = "encuestador_tipo_estudio";
    protected $fillable = [
    	'encuestador_id','cod_tipo_estudio','observacion','estado'
    ];
    public function tipo_estudio_p()
    {
         $v= Parametrica::where('tabla','=', 'tipo_estudio')->where('codigo','=',$this->cod_tipo_estudio)->get();
          return($v[0]);
    }
}
