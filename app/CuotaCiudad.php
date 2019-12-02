<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CuotaCiudad extends Model
{
    protected $table = "cuota_ciudad";

    public function encuesta()
    {
        return $this->belongsTo(Encuesta::class,'encuesta_id');
    }
}
