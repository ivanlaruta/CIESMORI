<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Encuestador_encuesta extends Model
{
     protected $table = "encuestador_encuesta";
    protected $fillable = [
    	'encuestador_id','encuesta_id','observacion','estado'
    ];
     public $incrementing=false;

    public function encuesta()
    {
        return $this->belongsTo(Encuesta::class,'encuesta_id');
    }
}
