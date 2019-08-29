<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table = "persona";
    protected $fillable = [
        'ci','cod_expedido','primer_nombre','segundo_nombre','apellido_paterno','apellido_materno','cod_genero','fecha_nacimiento','cod_estado_civil','cod_residencia','zona','direccion','telefono1','telefono2','cod_nivel_educacion','nivel_curso'
    ];


}
