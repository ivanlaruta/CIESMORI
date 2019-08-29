<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $table = "empleado";
    protected $fillable = [
		'id','persona_id','cargo','cod_tipo_estudio','cod_disponibilidad_tiempo','cod_horario_disponible','horas_que_puede_trabajar','experiencia','observacion'
    ];

    public function persona()
    {
        return $this->belongsTo(Persona::class,'persona_id');
    }

    public function lista_empresas()
    {
        return $this->hasMany('App\Empleado_empresa','empleado_id');
    }

}
