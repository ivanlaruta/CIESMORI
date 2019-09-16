<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Encuestador_Cargo extends Model
{
    protected $table = "encuestador_cargo";
    protected $fillable = [
    	'encuestador_id','cod_cargo','observacion','estado'
    ];
    public function cargo_p()
    {
         $v= Parametrica::where('tabla','=', 'cargo')->where('codigo','=',$this->cod_cargo)->get();
          return($v[0]);
    }
}
