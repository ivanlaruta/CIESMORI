<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parametrica extends Model
{
    protected $table = "parametrica";

    protected $fillable = [
		'tabla','codigo','valor_cadena','valor_cadena_corto','valor_entero','valor_numerico','descripcion','observacion'
    ];
}
