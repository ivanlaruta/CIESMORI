<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EncuestaCliente extends Model
{
    protected $table = "encuesta_cliente";
    protected $fillable = [
    	'id','encuesta_id','usuario_id'
    ];

    public function cliente()
    {
        return $this->belongsTo(User::class,'usuario_id');
    }
}