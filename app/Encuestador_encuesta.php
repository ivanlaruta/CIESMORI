<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Encuestador_encuesta extends Model
{
     protected $table = "encuestador_empresa";
    protected $fillable = [
    	'encuestador_id','encuesta_id','observacion','estado'
    ];
}
