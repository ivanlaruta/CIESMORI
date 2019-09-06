<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Encuestador extends Model
{
    protected $table = "encuestador";
    protected $fillable = [
		'id','persona_id','cargo','cod_disponibilidad_tiempo','horas_que_puede_trabajar','experiencia','observacion'
    ];

    public function persona()
    {
        return $this->belongsTo(Persona::class,'persona_id');
    }

    public function lista_encuestas()
    {
        return $this->hasMany('App\Encuestador_encuesta','encuestador_id');
    }

    public function lista_empresas()
    {
        return $this->hasMany('App\Encuestador_empresa','encuestador_id');
    }

    public function lista_turnos()
    {
        return $this->hasMany('App\Encuestador_turno','encuestador_id');
    }

    public function lista_tipo_estudio()
    {
        return $this->hasMany('App\Encuestador_tipo_estudio','encuestador_id');
    }
    public function disponibilidad_tiempo()
    {
        $v= Parametrica::where('tabla','=', 'disponibilidad_tiempo')->where('codigo','=',$this->cod_disponibilidad_tiempo)->get();
        return($v[0]->valor_cadena);
    }
}
