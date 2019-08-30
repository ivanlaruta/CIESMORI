<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Parametrica;
use App\Persona;
use App\Empleado;
use App\Empleado_empresa;
use App\Rol;

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
        ->where('empleado.estado',1)
        ->select(DB::raw('empleado.*, pte.valor_cadena as tipo_estudio,pdt.valor_cadena as disponibilidad_tiempo,phd.valor_cadena as horario_disponible,   p.ci,pe.valor_cadena_corto as expedido,p.primer_nombre,p.segundo_nombre,p.apellido_paterno,p.apellido_materno,pg.valor_cadena as genero,p.fecha_nacimiento,pec.valor_cadena as estado_civil,pr.valor_cadena as residencia,p.zona,p.direccion,p.telefono1,p.telefono2,ped.valor_cadena as nivel_educacion,p.nivel_curso,p.observacion,p.estado,p.created_by,p.updated_by,p.created_at,p.updated_at'))

        ->get();
        
        // dd($empleados);


        return view('administracion.empleados.index')->with('empleados',$empleados) ;
    }
   
    public function empleados_create_form(Request $request)
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
       
        switch ($request->formulario) {
            case 'nuevo':
                return view('administracion.empleados.create_new')
                ->with('expedido',$expedido)
                ->with('estado_civil',$estado_civil)
                ->with('ciudad',$ciudad)
                ->with('nivel_educacion',$nivel_educacion)
                ->with('tipo_estudio',$tipo_estudio)
                ->with('disponibilidad_tiempo',$disponibilidad_tiempo)
                ->with('horario_disponible',$horario_disponible)
                ->with('ciudad',$ciudad);
                break;
            case 1:
                echo "i es igual a 1";
                break;
            default:
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
    	
    }

    public function empleados_create(Request $request)
    {
        $persona = new Persona($request->all());
        $persona->save();
        $empleado = new Empleado($request->all());
        $empleado -> persona_id = $persona ->id;
        $empleado->save();

        $array_empresas = explode(",", $request->empresas);

        for ($i=0; $i < count($array_empresas); $i++) 
        {
            $empleado_empresa = new Empleado_empresa();
            $empleado_empresa -> empleado_id = $empleado ->id;
            $empleado_empresa -> empresa = $array_empresas[$i];
            $empleado_empresa ->save();
        }


        if(\Auth::check()){
            return redirect()->route('administracion.empleados.index')->with('mensaje',"El registro a sido creado exitosamente. "); 
        }
        else{

            return redirect()->route('inicio')->with('mensaje',"El registro a sido creado exitosamente. "); 
        }
    }

    public function empleados_baja(Request $request)
    {
        // dd($request->all());

               $empleado=Empleado::find($request->id_empleado_txt);
                $empleado->estado =0;
                $empleado->save();
                return redirect()->route('administracion.empleados.index')->with('mensaje',"El registro a sido dado de baja exitosamente. "); 
    }

    /*================================*/

    public function usuarios_index()
    {
        $usuario =User::where('estado',1)->get();
        return view('administracion.usuarios.index')->with('usuario',$usuario) ;
    }

    public function usuarios_baja(Request $request)
    {
        // dd($request->all());

               $usuario=User::find($request->id_usuarios_txt);
                $usuario->estado =0;
                $usuario->save();
                return redirect()->route('administracion.usuarios.index')->with('mensaje',"El registro a sido dado de baja exitosamente. "); 
    }
    public function usuarios_create_form(Request $request)
    {

        $roles = rol::where('estado',1)->get();
        $empleados = Empleado::where('estado',1)->get();


        switch ($request->formulario) {
            case 'nuevo':
                return view('administracion.usuarios.create')
                ->with('roles',$roles)
                ->with('empleados',$empleados)
                ->with('request',$request);
                break;
            case 1:
                echo "i es igual a 1";
                break;
            
        }
        
    }

     public function usuarios_finder(Request $request)
    {
        $term = trim($request->q);

        if (empty($term)) {
            return \Response::json([]);
        }

        // $tags = Trf_Cliente::search($term)->limit(5)->get();
        $tags =DB::select( DB::raw("
           select e.*,p.ci,p.primer_nombre,p.segundo_nombre,p.apellido_paterno,apellido_materno from empleado e join persona p on p.id=e.persona_id where concat(p.primer_nombre,' ',IFNULL( p.segundo_nombre, ''),' ',p.apellido_paterno,' ',IFNULL( p.apellido_materno, ''),' ',p.ci) like '%".$term."%'
            "));
       

        $formatted_tags = [];

        foreach ($tags as $tag) {
            $formatted_tags[] = ['id' => $tag->id, 'text' => $tag->primer_nombre.' '.$tag->apellido_paterno.' '.$tag->apellido_materno.' '.$tag->ci ];
        }

        return \Response::json($formatted_tags);
    }


     public function usuarios_create(Request $request)
    {
              // dd($request->all());
        if($request->formulario=="nuevo")
        {
            $user = new User($request->all());
            $user->rol_id = $request->rol_id;
            $user->password = bcrypt($request->password);
            $user->save();
            return redirect()->route('administracion.usuarios.index')->with('mensaje',"El registro a sido creado exitosamente. "); 
        }
        // else
        // {
        //     // if($request->tipo=="editar")
        //     // {
        //     //     $user=User::find($request->id_usuario);
        //     //     $user->fill($request->all());
        //     //     $user->password = bcrypt($request->password);
        //     //     $user->save();
        //     //     return redirect()->route('administracion.index_users')->with('mensaje',"Editado exitosamente."); 
        //     // }

        // }
    
       

            // return redirect()->route('administracion.empleados.index')->with('mensaje',"El registro a sido creado exitosamente. "); 
// 
    }

}
