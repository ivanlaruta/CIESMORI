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
        $empleados = Empleado::orderBy('empleado.id')
        ->join('persona as p','p.id','=','empleado.persona_id')
        ->Join('parametrica as pe', function($join)
             {  $join->on('pe.codigo', '=', 'p.cod_expedido'); $join->on('pe.tabla','=',DB::raw("'expedido'"));})
        ->Join('parametrica as pg', function($join)
             {  $join->on('pg.codigo', '=', 'p.cod_genero'); $join->on('pg.tabla','=',DB::raw("'genero'"));})
        ->Join('parametrica as pec', function($join)
             {  $join->on('pec.codigo', '=', 'p.cod_estado_civil'); $join->on('pec.tabla','=',DB::raw("'estado_civil'"));})
        ->Join('parametrica as pr', function($join)
             {  $join->on('pr.codigo', '=', 'p.cod_residencia'); $join->on('pr.tabla','=',DB::raw("'ciudad'"));})
        ->Join('parametrica as ped', function($join)
             {  $join->on('ped.codigo', '=', 'p.cod_nivel_educacion'); $join->on('ped.tabla','=',DB::raw("'nivel_educacion'"));})

        ->Join('parametrica as pte', function($join)
             {  $join->on('pte.codigo', '=', 'empleado.cod_tipo_estudio'); $join->on('pte.tabla','=',DB::raw("'tipo_estudio'"));})
        ->Join('parametrica as pdt', function($join)
             {  $join->on('pdt.codigo', '=', 'empleado.cod_disponibilidad_tiempo'); $join->on('pdt.tabla','=',DB::raw("'disponibilidad_tiempo'"));})
        ->Join('parametrica as phd', function($join)
             {  $join->on('phd.codigo', '=', 'empleado.cod_horario_disponible'); $join->on('phd.tabla','=',DB::raw("'horario_disponible'"));})
        
        ->select(DB::raw('empleado.*, pte.valor_cadena as tipo_estudio,pdt.valor_cadena as disponibilidad_tiempo,phd.valor_cadena as horario_disponible,   p.ci,pe.valor_cadena_corto as expedido,p.primer_nombre,p.segundo_nombre,p.apellido_paterno,p.apellido_materno,pg.valor_cadena as genero,p.fecha_nacimiento,pec.valor_cadena as estado_civil,pr.valor_cadena as residencia,p.zona,p.direccion,p.telefono1,p.telefono2,ped.valor_cadena as nivel_educacion,p.nivel_curso,p.observacion,p.estado,p.created_by,p.updated_by,p.created_at,p.updated_at'))
        ->get();
        
        // dd($empleados);


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
