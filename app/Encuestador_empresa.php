<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Encuestador_empresa extends Model
{
     protected $table = "encuestador_empresa";
    protected $fillable = [
    	'encuestador_id','empresa','observacion','estado'
    ];
}
