<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table = "persona";
    protected $fillable = [
        'ci','cod_expedido','primer_nombre','segundo_nombre','apellido_paterno','apellido_materno','cod_genero','fecha_nacimiento','cod_estado_civil','cod_residencia','zona','direccion','telefono1','telefono2','cod_nivel_educacion','nivel_curso','imagen_id'
    ];

    public function ciudad()
    {
        return $this->belongsTo(Ciudad::class,'cod_residencia');
    }
    public function foto()
    {
        return $this->belongsTo(Imagen::class,'imagen_id');
    }
    public function expedido()
    {
        return $this->belongsTo(Departamento::class,'cod_expedido');
    }
    public function genero()
    {
        $v= Parametrica::where('tabla','=', 'genero')->where('codigo','=',$this->cod_genero)->get();
        return($v[0]->valor_cadena);
    } 
    public function estado_civil()
    {
        $v= Parametrica::where('tabla','=', 'estado_civil')->where('codigo','=',$this->cod_estado_civil)->get();
        return($v[0]->valor_cadena);
    }
    public function nivel_educacion()
    {
        $v= Parametrica::where('tabla','=', 'nivel_educacion')->where('codigo','=',$this->cod_nivel_educacion)->get();
        return($v[0]->valor_cadena);
    }
    
}
