<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleado_empresa extends Model
{
    protected $table = "empleado_empresa";
    protected $fillable = [
    	'empleado_id','empresa','observacion','estado'
    ];
}
