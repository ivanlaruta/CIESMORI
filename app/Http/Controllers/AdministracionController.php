<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PersonaRequest;

use App\User;
use App\Parametrica;
use App\Persona;
use App\Encuestador;
use App\Encuestador_empresa;
use App\Encuestador_encuesta;
use App\Encuestador_tipo_estudio;
use App\Encuestador_Cargo;
use App\Encuestador_horario_disponible;
use App\Departamento;
use App\Ciudad;
use App\Rol;
use App\Imagen;
use Intervention\Image\ImageManagerStatic as Image;


use DB;

class AdministracionController extends Controller
{
    public function validar_ci(Request $request)
    {
        $persona = DB::table('persona')
            ->join('encuestador', 'persona.id', '=', 'encuestador.persona_id')
            ->where('persona.ci',$request->ci)
            ->get()->toArray();;

        return ($persona);
    }

    public function encuestadores_index()
    {
        $encuestadores = Encuestador::orderBy('id')
        ->where('estado',1)
        
        ->get();

        return view('administracion.encuestadores.index')->with('encuestadores',$encuestadores) ;
    }
   
    public function encuestadores_create_form(Request $request)
    {
        $expedido=Departamento::where('estado','1')
        					->orderBy('id')->get();

        $ciudad=Ciudad::where('estado','1')
        					->orderBy('id')->get();

        $estado_civil=Parametrica::select('codigo','valor_cadena')
        					->where('tabla','estado_civil')
        					->where('estado','1')
        					->orderBy('codigo')->get();
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
        $cargos=Parametrica::select('codigo','valor_cadena')
                            ->where('tabla','cargo')
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
       
        
                
        return view('administracion.encuestadores.create_content_form')
                ->with('expedido',$expedido)
                ->with('estado_civil',$estado_civil)
                ->with('ciudad',$ciudad)
                ->with('nivel_educacion',$nivel_educacion)
                ->with('cargos',$cargos)
                ->with('tipo_estudio',$tipo_estudio)
                ->with('disponibilidad_tiempo',$disponibilidad_tiempo)
                ->with('horario_disponible',$horario_disponible)
                ->with('ciudad',$ciudad);
    	
    }
    public function encuestadores_edit_form(Request $request)
    {
        // dd($request->all());
        $expedido=Departamento::where('estado','1')
                            ->orderBy('id')->get();

        $ciudad=Ciudad::where('estado','1')
                            ->orderBy('id')->get();

        $estado_civil=Parametrica::select('codigo','valor_cadena')
                            ->where('tabla','estado_civil')
                            ->where('estado','1')
                            ->orderBy('codigo')->get();
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
        $cargos=Parametrica::select('codigo','valor_cadena')
                            ->where('tabla','cargo')
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
       
        $encuestador = Encuestador::find($request->id);
        $encuestador_id = $request->id;

        $cadena_empresas = '';

        if ($encuestador->lista_empresas->count() > 0){
            foreach ($encuestador->lista_empresas as $empresa){
              $cadena_empresas .=$empresa->empresa.',';
            }
        }
            
          

        // dd($cadena_empresas);

        return view('administracion.encuestadores.edit_content_form')
                ->with('encuestador',$encuestador)
                ->with('cadena_empresas',$cadena_empresas)
                ->with('expedido',$expedido)
                ->with('estado_civil',$estado_civil)
                ->with('ciudad',$ciudad)
                ->with('nivel_educacion',$nivel_educacion)
                ->with('cargos',$cargos)
                ->with('tipo_estudio',$tipo_estudio)
                ->with('disponibilidad_tiempo',$disponibilidad_tiempo)
                ->with('horario_disponible',$horario_disponible)
                ->with('ciudad',$ciudad)
                ->with('encuestador_id',$encuestador_id);
        
    }

    public function encuestadores_create_nolog_form(Request $request)
    {

        return view('administracion.encuestadores.create_nolog'); 

    }

    public function store(Request $request)
    {
        // dd($request->all());

        $persona = new Persona($request->all());

        if($request->file('image')){
            $file = $request->file('image');
            $namefile = $request->ci.'_'.time().'.'.$file->getClientOriginalExtension();


            $image_resize = Image::make($file->getRealPath());              
            // $image_resize->resize(300, 300);

            $image_resize->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            });


            // $path = public_path().'\images\personas\\';
            // $image_resize->save($path,$namefile);
            $image_resize->save(public_path('images/personas/' .$namefile));

            $imagen = new Imagen();
            $imagen -> archivo = $namefile;
            $imagen -> carpeta = 'personas';
            $imagen->save();

            $persona -> imagen_id = $imagen ->id;
        }      
        $persona->save();

        $encuestador = new Encuestador($request->all());
        $encuestador -> persona_id = $persona ->id;
        $encuestador->save();

        $array_empresas = explode(",", $request->empresas);

        for ($i=0; $i < count($array_empresas); $i++) 
        {
            $encuestador_empresa = new Encuestador_empresa();
            $encuestador_empresa -> encuestador_id = $encuestador ->id;
            $encuestador_empresa -> empresa = strtoupper($array_empresas[$i]);
            $encuestador_empresa ->save();
        }

        for ($i=0; $i < count($request->cod_tipo_estudio); $i++) 
        {
            $encuestador_tipo_estudio = new Encuestador_tipo_estudio();
            $encuestador_tipo_estudio -> encuestador_id = $encuestador ->id;
            $encuestador_tipo_estudio -> cod_tipo_estudio = $request->cod_tipo_estudio[$i];
            $encuestador_tipo_estudio ->save();
        }


        for ($i=0; $i < count($request->cargos); $i++) 
        {
            $encuestador_cargos = new Encuestador_Cargo();
            $encuestador_cargos -> encuestador_id = $encuestador ->id;
            $encuestador_cargos -> cod_cargo = $request->cargos[$i];
            $encuestador_cargos ->save();
        }

        for ($i=0; $i < count($request->cod_horario_disponible); $i++) 
        {
            $encuestador_horario_disponible = new Encuestador_horario_disponible();
            $encuestador_horario_disponible -> encuestador_id = $encuestador ->id;
            $encuestador_horario_disponible -> cod_horario_disponible = $request->cod_horario_disponible[$i];
            $encuestador_horario_disponible ->save();
        }

        // dd('grabado');

        if(\Auth::check()){
            return redirect()->route('administracion.encuestadores.index')->with('mensaje',"El registro a sido creado exitosamente. "); 
        }
        else{

            return redirect()->route('inicio')->with('mensaje',"El registro a sido creado exitosamente. "); 
        }
    }


    public function encuestadores_editar(Request $request)
    {
        // dd($request->all());
        $encuestador = Encuestador::find($request->encuestador_id);
        $encuestador->fill($request->all());

        $persona = Persona::find($encuestador->persona_id);
        $persona->fill($request->all());



        if($request->file('image')){
            $file = $request->file('image');
            $namefile = $request->ci.'_'.time().'.'.$file->getClientOriginalExtension();
            $image_resize = Image::make($file->getRealPath());              
            // $image_resize->resize(300, 300);
            $image_resize->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            });


            // $path = public_path().'\images\personas\\';
            // $image_resize->save($path,$namefile);
            $image_resize->save(public_path('images/personas/' .$namefile));

            $imagen = new Imagen();
            $imagen -> archivo = $namefile;
            $imagen -> carpeta = 'personas';
            $imagen->save();

            $persona -> imagen_id = $imagen ->id;
        }

        $persona->save();
        $encuestador->save();

        $Encuestador_empresa=Encuestador_empresa::where('encuestador_id',$request->encuestador_id)->delete();
        $Encuestador_tipo_estudio=Encuestador_tipo_estudio::where('encuestador_id',$request->encuestador_id)->delete();
        $Encuestador_Cargo=Encuestador_Cargo::where('encuestador_id',$request->encuestador_id)->delete();
        $Encuestador_horario_disponible=Encuestador_horario_disponible::where('encuestador_id',$request->encuestador_id)->delete();

        $array_empresas = explode(",", $request->empresas);

        for ($i=0; $i < count($array_empresas); $i++) 
        {
            $encuestador_empresa = new Encuestador_empresa();
            $encuestador_empresa -> encuestador_id = $encuestador ->id;
            $encuestador_empresa -> empresa = strtoupper($array_empresas[$i]);
            $encuestador_empresa ->save();
        }

        for ($i=0; $i < count($request->cod_tipo_estudio); $i++) 
        {
            $encuestador_tipo_estudio = new Encuestador_tipo_estudio();
            $encuestador_tipo_estudio -> encuestador_id = $encuestador ->id;
            $encuestador_tipo_estudio -> cod_tipo_estudio = $request->cod_tipo_estudio[$i];
            $encuestador_tipo_estudio ->save();
        }


        for ($i=0; $i < count($request->cargos); $i++) 
        {
            $encuestador_cargos = new Encuestador_Cargo();
            $encuestador_cargos -> encuestador_id = $encuestador ->id;
            $encuestador_cargos -> cod_cargo = $request->cargos[$i];
            $encuestador_cargos ->save();
        }

        for ($i=0; $i < count($request->cod_horario_disponible); $i++) 
        {
            $encuestador_horario_disponible = new Encuestador_horario_disponible();
            $encuestador_horario_disponible -> encuestador_id = $encuestador ->id;
            $encuestador_horario_disponible -> cod_horario_disponible = $request->cod_horario_disponible[$i];
            $encuestador_horario_disponible ->save();
        }

        // dd('grabado');

        if(\Auth::check()){
            return redirect()->route('administracion.encuestadores.index')->with('mensaje',"El registro a sido modificado exitosamente. "); 
        }
        else{

            return redirect()->route('inicio')->with('mensaje',"El registro a sido creado exitosamente. "); 
        }
    }

    public function encuestadores_baja(Request $request)
    {
        // dd($request->all());

               $encuestador=Encuestador::find($request->id_encuestador_txt);
                $encuestador->estado =0;
                $encuestador->save();
                return redirect()->route('administracion.encuestadores.index')->with('mensaje',"El registro a sido dado de baja exitosamente. "); 
    }

    public function encuestadores_agrega_encuesta(Request $request)
    {
          // dd($request->all()); 

        $array_encuestas = explode(",", $request->encuestas);

        for ($i=0; $i < count($array_encuestas); $i++) 
        {
            $encuestador_encuesta = new Encuestador_encuesta();
            $encuestador_encuesta -> encuestador_id =  $request->id_encuestador_txt2;
            $encuestador_encuesta -> encuesta_id =  $request->id_encuestador_txt2;
            $encuestador_encuesta -> estado_encuesta =  $request->id_encuestador_txt2;
            $encuestador_encuesta -> observacion = strtoupper($array_encuestas[$i]);
            // dd($encuestador_encuesta); 
            $encuestador_encuesta ->save();
        }

        return redirect()->route('administracion.encuestadores.index')->with('mensaje',"Se asigno correctamente"); 
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
        $encuestadores = Encuestador::where('estado',1)->get();


        switch ($request->formulario) {
            case 'nuevo':
                return view('administracion.usuarios.create')
                ->with('roles',$roles)
                ->with('encuestadores',$encuestadores)
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
           select e.*,p.ci,p.primer_nombre,p.segundo_nombre,p.apellido_paterno,apellido_materno from encuestador e join persona p on p.id=e.persona_id where concat(p.primer_nombre,' ',IFNULL( p.segundo_nombre, ''),' ',p.apellido_paterno,' ',IFNULL( p.apellido_materno, ''),' ',p.ci) like '%".$term."%'
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
    
       

            // return redirect()->route('administracion.encuestadores.index')->with('mensaje',"El registro a sido creado exitosamente. "); 
// 
    }

}
