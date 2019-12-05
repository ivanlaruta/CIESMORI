<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CuotaCiudad extends Model
{
    protected $table = "cuota_ciudad";
    protected $fillable = [
    	'id_ciudad','id_encuesta','meta'
    ];
    public function ciudad()
    {
        return $this->belongsTo(Ciudad::class,'id_ciudad');
    }
    public function encuesta()
    {
        return $this->belongsTo(Encuesta::class,'id_encuesta');
    }
}
