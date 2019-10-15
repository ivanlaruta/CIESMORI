<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LibroDatos extends Model
{
    protected $table = "libro_datos";

    public function encuesta()
    {
        return $this->belongsTo(Encuesta::class,'encuesta_id');
    }
}
