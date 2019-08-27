<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Parametrica;
use App\Persona;
use App\Empleado;

use DB;

class AdministracionController extends Controller
{
    public function empleados_index()
    {
        $empleados = Empleado::all();
        return view('administracion.empleados.index')->with('empleados',$empleados) ;
    }
   
    public function empleados_create_form()
    {
        $expedido=Parametrica::select('codigo','valor_cadena')
        					->where('tabla','expedido')
        					->where('estado','1')
        					->orderBy('valor_cadena')->get();
        $estado_civil=Parametrica::select('codigo','valor_cadena')
        					->where('tabla','estado_civil')
        					->where('estado','1')
        					->orderBy('codigo')->get();
        $ciudad=Parametrica::select('codigo','valor_cadena')
        					->where('tabla','ciudad')
        					->where('estado','1')
        					->orderBy('valor_cadena','asc')->get();
        $nivel_educacion=Parametrica::select('codigo','valor_cadena')
        					->where('tabla','nivel_educacion')
        					->where('estado','1')
        					->orderByRaw('CAST(codigo AS int)')
        					// ->orderBy('codigo')
        					->get();
        $tipo_estudio=Parametrica::select('codigo','valor_cadena')
        					->where('tabla','tipo_estudio')
        					->where('estado','1')
        					->orderBy('codigo')->get();
        $disponibilidad_tiempo=Parametrica::select('codigo','valor_cadena')
        					->where('tabla','disponibilidad_tiempo')
        					->where('estado','1')
        					->orderBy('codigo')->get();
        $horario_disponible=Parametrica::select('codigo','valor_cadena')
        					->where('tabla','horario_disponible')
        					->where('estado','1')
        					->orderBy('codigo')->get();
       
        
    	return view('administracion.empleados.create')
		    	->with('expedido',$expedido)
				->with('estado_civil',$estado_civil)
				->with('ciudad',$ciudad)
				->with('nivel_educacion',$nivel_educacion)
				->with('tipo_estudio',$tipo_estudio)
				->with('disponibilidad_tiempo',$disponibilidad_tiempo)
				->with('horario_disponible',$horario_disponible)
				->with('ciudad',$ciudad);
    }

    public function empleados_create(Request $request)
    {
        $persona = new Persona($request->all());
        $persona->save();
        $empleado = new Empleado($request->all());
        $empleado -> persona_id = $persona ->id;
        $empleado->save();


            return redirect()->route('inicio')->with('mensaje',"Su registro a sido creado exitosamente. "); 

    }
}
