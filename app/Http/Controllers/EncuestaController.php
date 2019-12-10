<?php

namespace App\Http\Controllers;

use App\Encuesta;
use App\Parametrica;
use App\LibroDatos;
use App\CuotaCiudad;
use App\Ciudad;
use App\EncuestaDetalle;
use App\V_detalle_encuesta;
use App\EncuestaCliente;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DB;


class EncuestaController extends Controller
{
    public function gis(Request $request)
    {
        $encuestas=Encuesta::all();

        $ciudades=EncuestaDetalle::select('ciudad')->distinct()->get();
        $cantidad = 0;
        $encuesta = Encuesta::find($request->id);

        $ubicacon_a=$ubicacon_b=$ubicacon_c =[];
        if(!empty($request ->id)){
            $cantidad=DB::table('v_encuesta_detalle')->where('v_encuesta_detalle.id_encuesta', '=', $request->id)->count();


            $ubicacon_a=DB::table('v_encuesta_detalle')
               ->where('v_encuesta_detalle.id_encuesta', '=', $request->id)
              ->where('v_encuesta_detalle.longitud_a', '!=', '')
              ->where('v_encuesta_detalle.longitud_a', '!=', 0);

             $ubicacon_b=DB::table('v_encuesta_detalle')
               ->where('v_encuesta_detalle.id_encuesta', '=', $request->id)
              ->where('v_encuesta_detalle.longitud_b', '!=', '')
              ->where('v_encuesta_detalle.longitud_b', '!=', 0);

             $ubicacon_c=DB::table('v_encuesta_detalle')
               ->where('v_encuesta_detalle.id_encuesta', '=', $request->id)
              ->where('v_encuesta_detalle.longitud_c', '!=', '')
              ->where('v_encuesta_detalle.longitud_c', '!=', 0);

            if(!empty($request ->fecha)){
                $ubicacon_a=$ubicacon_a->where('v_encuesta_detalle.fecha', '>=', $request->fecha);
                $ubicacon_b=$ubicacon_b->where('v_encuesta_detalle.fecha', '>=', $request->fecha);
                $ubicacon_c=$ubicacon_c->where('v_encuesta_detalle.fecha', '>=', $request->fecha);
            }
            if(!empty($request ->fecha2)){
                $ubicacon_a=$ubicacon_a->where('v_encuesta_detalle.fecha', '<=', $request->fecha2);
                $ubicacon_b=$ubicacon_b->where('v_encuesta_detalle.fecha', '<=', $request->fecha2);
                $ubicacon_c=$ubicacon_c->where('v_encuesta_detalle.fecha', '<=', $request->fecha2);
            }
            if(!empty($request ->ciudad)){
                $ubicacon_a=$ubicacon_a->where('v_encuesta_detalle.ciudad', '=', $request->ciudad);
                $ubicacon_b=$ubicacon_b->where('v_encuesta_detalle.ciudad', '=', $request->ciudad);
                $ubicacon_c=$ubicacon_c->where('v_encuesta_detalle.ciudad', '=', $request->ciudad);
            }
            if(!empty($request ->ci)){
                $ubicacon_a=$ubicacon_a->where('v_encuesta_detalle.ci_enc', '=', $request->ci);
                $ubicacon_b=$ubicacon_b->where('v_encuesta_detalle.ci_enc', '=', $request->ci);
                $ubicacon_c=$ubicacon_c->where('v_encuesta_detalle.ci_enc', '=', $request->ci);
            }


            $ubicacon_a=$ubicacon_a->get()->toArray();
            $ubicacon_b=$ubicacon_b->get()->toArray();
            $ubicacon_c=$ubicacon_c->get()->toArray();
            // dd($ubicacon_a);

        }
        return view('encuestas.gis.indexx')
        ->with('ubicacon_a',$ubicacon_a)
        ->with('ubicacon_b',$ubicacon_b)
        ->with('ubicacon_c',$ubicacon_c)
        ->with('encuesta',$encuesta)
        ->with('ciudades',$ciudades)
        ->with('cantidad',$cantidad)
        ->with('request',$request)
        ->with('encuestas',$encuestas);
    }

    public function map()
    {
        return view('encuestas.gis.map');
    }

    public function dashboard()
    {

        $total_encuestas=Encuesta::count();
        $total_detalle_encuestas=V_detalle_encuesta::count();


        $id_user = Auth::user()->rol_id;
        if(Auth::user()->rol->descripcion == 'CLIENTE'){

            $encuestas=Encuesta::whereIn('id', function($query) use ($id_user) {
            $query->select('encuesta_id')
            ->from(with(new EncuestaCliente)->getTable())
            ->where('usuario_id',$id_user);
        })->get();
        }
        else
        {

            $encuestas=Encuesta::all();
        }


        return view('encuestas.dashboard.index')
        ->with('total_encuestas',$total_encuestas)
        ->with('total_detalle_encuestas',$total_detalle_encuestas)
        ->with('encuestas',$encuestas);
    }

    public function libroDatos(Request $request)
    {
       $librodatos =LibroDatos::
                            where('encuesta_id',$request ->id)
                            ->orderBy('campo')->get();

        return view('encuestas.migracion.libroDatos')

         ->with('librodatos',$librodatos);
    }


    public function admin_libro()
    {
        $librodatos =LibroDatos::all();

        $encuestas=Encuesta::all();
        $parametrica=Parametrica::select('codigo')
                            ->where('tabla','libro_datos')
                            ->where('estado','1')
                            ->orderBy('codigo')->get();

        return view('encuestas.migracion.admin_libro')
         ->with('parametrica',$parametrica)
         ->with('librodatos',$librodatos)
        ->with('encuestas',$encuestas);
    }




    public function migracion()
    {
        $name_db = DB::select( DB::raw("SHOW DATABASES"));
        return view('encuestas.migracion.migrate_form')->with('name_db',$name_db);
    }


    public function baja_libro(Request $request)
    {
        $librodatos =LibroDatos::
                            where('encuesta_id',$request ->id)
                            ->delete();
        // dd($request->all());


        return redirect()->route('encuesta.admin_libro')->with('mensaje',"Se agrego correctamene. ");

    }

    public function store_libro(Request $request)
    {
        $libro = new LibroDatos();
        $libro -> encuesta_id = $request ->encuesta_id;
        $libro -> campo = $request ->parametrica_libro;
        $libro -> codigo = $request ->codigo;
        $libro -> valor = $request ->valor;
        // dd($libro);
        $libro -> save();

        return redirect()->route('encuesta.admin_libro')->with('mensaje',"Se agrego correctamene. ");

    }

    public function update_form(Request $request)
    {
        $encuesta_id= $request->id;
        $encuesta = Encuesta::find($encuesta_id);
        return view('encuestas.migracion.edita')
        ->with('encuesta',$encuesta);
    }

    public function cuota_cuidad(Request $request)
    {
        $encuesta_id= $request->id;

        $cuotas = CuotaCiudad::where('id_encuesta',$encuesta_id)->get();

        $ciudades = DB::select( DB::raw("

            SELECT distinct c.id,c.nombre
            FROM ciudad c
            join encuesta_detalle d on d.ciudad = c.nombre and d.id_encuesta =".$encuesta_id."
            and not EXISTS (select 1 from cuota_ciudad o where o.id_ciudad = c.id and o.id_encuesta = d.id_encuesta)

            "));
            return view('encuestas.opciones.cuota_ciudad')
        ->with('encuesta_id',$encuesta_id)
        ->with('cuotas',$cuotas)
        ->with('ciudades',$ciudades);

    }

    public function cuota_cuidad_store(Request $request)
    {
        $Cuota = new CuotaCiudad($request->all());
        $Cuota->save();
        return redirect()->route('encuesta.index')->with('mensaje',"Se asigno correctamente");
    }

    public function cuota_cuidad_delete(Request $request)
    {
        $Cuota=CuotaCiudad::
            where('id',$request->id_encuesta_txt)
          ->delete();
        return redirect()->route('encuesta.index')->with('mensaje',"Se elimino correctamente");
    }

    public function asigna_cliente(Request $request)
    {
        $encuesta_id= $request->id;

        $usersss = DB::table('users')
            ->join('roles', 'users.rol_id', '=', 'roles.id')
            ->where('roles.descripcion','CLIENTE')
            ->get();

         $users = DB::select( DB::raw("

            SELECT c.*
            FROM users c
            join roles d on d.id = c.rol_id and d.descripcion ='CLIENTE'
            and not EXISTS (select 1 from encuesta_cliente o where o.usuario_id = c.id and o.encuesta_id = ".$encuesta_id.")

            "));
         // dd($users);
        $clientes = EncuestaCliente::where('encuesta_id',$encuesta_id)->get();
        // dd($clientes);
        return view('encuestas.opciones.encuesta_clientes')
        ->with('encuesta_id',$encuesta_id)
        ->with('users',$users)
        ->with('clientes',$clientes);
    }

     public function asigna_cliente_store(Request $request)
    {
        // dd($request->all());
        $EncuestaCliente = new EncuestaCliente($request->all());
        $EncuestaCliente->save();
        return redirect()->route('encuesta.index')->with('mensaje',"Se asigno correctamente");
    }

    public function asigna_cliente_delete(Request $request)
    {
        $EncuestaCliente=EncuestaCliente::
            where('id',$request->id_encuesta_txt)
          ->delete();
        return redirect()->route('encuesta.index')->with('mensaje',"Se elimino correctamente");
    }



    public function editar(Request $request)
    {
        $encuesta = Encuesta::find($request->id);
        $encuesta -> nombre = $request ->nombre;
        $encuesta -> meta_estudio = $request ->meta_estudio;
        $encuesta -> carpeta_audios = str_replace("\\","/", $request ->carpeta_audios);
        $encuesta -> carpeta_imagenes = str_replace("\\","/", $request ->carpeta_imagenes);
        $encuesta -> observacion = $request ->observacion;
        $encuesta -> updated_at = date("Y-m-d h:i:s");
        $encuesta -> save();

        return redirect()->route('encuesta.index')->with('mensaje',"Se a editado la encuesta exitosamente. ");

    }

    public function listar_tablas_db(Request $request)
    {
        $encuestas_cargadas = Encuesta::select('nombre_tabla')->get()->ToArray();
        $tabla_encuestas = array_column($encuestas_cargadas, 'nombre_tabla');

        if(empty($tabla_encuestas)){

             $tablas_db = DB::select( DB::raw("
                    SELECT TABLE_NAME AS tables
                    FROM INFORMATION_SCHEMA.TABLES
                    WHERE TABLE_SCHEMA = '".$request->name_db."'


            "));
         }
        else{
            $tablas = '';
            for ($i=0; $i < sizeof($tabla_encuestas); $i++) {
                   $tablas = $tablas."'".$tabla_encuestas[$i]."'";
                   if($i < (sizeof($tabla_encuestas))-1){
                    $tablas = $tablas.",";
                   }
                }
            $tablas_db = DB::select( DB::raw("
                    SELECT TABLE_NAME AS tables
                    FROM INFORMATION_SCHEMA.TABLES
                    WHERE TABLE_SCHEMA = '".$request->name_db."'
                    AND TABLE_NAME not in (".$tablas.")

            "));

        }




       return($tablas_db);

    }

    public function migrar(Request $request)
    {

        $campos_tabla =  DB::select( DB::raw("SHOW COLUMNS FROM `".$request -> db."`.".$request ->origen));
        //dd($campos_tabla);


        if (sizeof($campos_tabla)==23 and $campos_tabla[0]->Field == 'guid' and $campos_tabla[1]->Field == 'caseids') {
                $encuesta = new Encuesta();
                $encuesta -> nombre = $request ->nombre;
                $encuesta -> nombre_tabla = $request ->origen;
                $encuesta -> nombre_db = $request ->db;
                $encuesta -> meta_estudio = $request ->meta_estudio;
                $encuesta -> carpeta_audios = str_replace("\\","/", $request ->carpeta_audios);
                $encuesta -> carpeta_imagenes = str_replace("\\","/", $request ->carpeta_imagenes);
                $encuesta -> observacion = $request ->observacion;
                $encuesta -> save();

                DB::insert("
            insert into encuesta_detalle
                (id_encuesta,fecha,hora,ci_enc,ciudad,estudio,periodo,contador,horainisis,horafinsis,duracion,latitud_a,longitud_a,entrevistado,edad,rango_edad,genero,nse,telf,ci,email,zona,manzano,manzano1,direccion,num_casa,referencia,nomb_enc,cod_enc,supervision,tipo_supervision,nom_supervisor,cod_supervisor,id_auxiliar)
            select
            ".$encuesta -> id." encuestaid
            ,IFNULL(cast(SUBSTR(a.questionnaire,2,6) as date),'') Fecha
            ,IFNULL(SUBSTR(a.questionnaire,8,6),'')  Hora
            ,SUBSTR(a.questionnaire,14,8) CI_del_Encuestador
            ,IFNULL(c.nombre,'SIN CIUDAD') ciudad
            ,SUBSTR(a.questionnaire,23,4) Estudio
            ,SUBSTR(a.questionnaire,27,4) Periodo
            ,SUBSTR(a.questionnaire,31,3) Contador
            ,SUBSTR(a.questionnaire,34,6)  Hora_de_Inicio_del_Sistema
            ,SUBSTR(a.questionnaire,40,6)  Hora_de_Finalización_del_Sistema
            ,SUBSTR(a.questionnaire,46,6) Duracion
            ,SUBSTR(a.questionnaire,52,13) Latitud_A
            ,SUBSTR(a.questionnaire,65,13) Longitud_A
            ,SUBSTR(a.questionnaire,78,80) Entrevistado
            ,SUBSTR(a.questionnaire,158,2) Edad
            ,SUBSTR(a.questionnaire,160,1) Rango_de_edad
            ,SUBSTR(a.questionnaire,161,1) Genero
            ,SUBSTR(a.questionnaire,162,1) NSE
            ,SUBSTR(a.questionnaire,163,30) Teléfono
            ,SUBSTR(a.questionnaire,193,15) Carnet_de_Identidad
            ,SUBSTR(a.questionnaire,208,100) Email
            ,SUBSTR(a.questionnaire,308,3) Zona
            ,SUBSTR(a.questionnaire,311,4) Manzano
            ,SUBSTR(a.questionnaire,315,20) Manzano_1
            ,SUBSTR(a.questionnaire,335,120) Direccion
            ,SUBSTR(a.questionnaire,455,10) Número_de_casa
            ,SUBSTR(a.questionnaire,465,250) Referencia
            ,SUBSTR(a.questionnaire,715,80) Nombre_de_la_encuestador
            ,SUBSTR(a.questionnaire,795,4) Código_del_encuestador
            ,SUBSTR(a.questionnaire,799,1) Supervisión
            ,SUBSTR(a.questionnaire,800,1) Tipo_de_Supervisión
            ,SUBSTR(a.questionnaire,801,80) Nombre_del_supervisor
            ,SUBSTR(a.questionnaire,881,4) Código_del_supervisor
            ,SUBSTR(a.questionnaire,885,34) Id_auxiliar
            from `".$request -> db."`.".$encuesta -> nombre_tabla." a
            LEFT JOIN ciudad c on c.id = SUBSTR(a.questionnaire,22,1)
            where ltrim(rtrim(SUBSTR(a.questionnaire,2219,2)))='1'
            ");

        DB::insert("
        insert into encuesta_detalle2
                (id_encuesta,fecha,hora,ci_enc,ciudad,dataint1,dataint2,dataint3,dataint4,dataint5,dataint6,dataint7,dataint8,dataint9,dataint10,data1,data2,data3,data4,data5,data6,data7,data8,data9,data10,resultado,nom_zona,nom_emp,telf_emp,cargo,direc_c1,direc_calle2,latitud_b,longitud_b,upm,distrito,uni_censal,latitud_c,longitud_c,ap_enc,id_disp)
            select
            ".$encuesta -> id." encuestaid
            ,SUBSTR(a.questionnaire,2,6) Fecha
            ,SUBSTR(a.questionnaire,8,6) Hora
            ,SUBSTR(a.questionnaire,14,8) CI_del_Encuestador
            ,SUBSTR(a.questionnaire,22,1) Ciudad

            ,SUBSTR(a.questionnaire,919,10) DATAINT1
            ,SUBSTR(a.questionnaire,929,10) DATAINT2
            ,SUBSTR(a.questionnaire,939,10) DATAINT3
            ,SUBSTR(a.questionnaire,949,10) DATAINT4
            ,SUBSTR(a.questionnaire,959,10) DATAINT5
            ,SUBSTR(a.questionnaire,969,10) DATAINT6
            ,SUBSTR(a.questionnaire,979,10) DATAINT7
            ,SUBSTR(a.questionnaire,989,10) DATAINT8
            ,SUBSTR(a.questionnaire,999,10) DATAINT9
            ,SUBSTR(a.questionnaire,1009,10) DATAINT10
            ,SUBSTR(a.questionnaire,1019,120) DATA1
            ,SUBSTR(a.questionnaire,1139,120) DATA2
            ,SUBSTR(a.questionnaire,1259,120) DATA3
            ,SUBSTR(a.questionnaire,1379,120) DATA4
            ,SUBSTR(a.questionnaire,1499,120) DATA5
            ,SUBSTR(a.questionnaire,1619,120) DATA6
            ,SUBSTR(a.questionnaire,1739,120) DATA7
            ,SUBSTR(a.questionnaire,1859,120) DATA8
            ,SUBSTR(a.questionnaire,1979,120) DATA9
            ,SUBSTR(a.questionnaire,2099,120) DATA10
            ,SUBSTR(a.questionnaire,2219,2) RESULTADO
            ,SUBSTR(a.questionnaire,2221,300) Nombre_de_la_zona
            ,SUBSTR(a.questionnaire,2521,100) Nombre_de_la_empresa_o_negocio
            ,SUBSTR(a.questionnaire,2621,30) Teléfono_de_la_empresa
            ,SUBSTR(a.questionnaire,2651,80) Cargo
            ,SUBSTR(a.questionnaire,2731,100) Dirección_calle_1
            ,SUBSTR(a.questionnaire,2831,100) Dirección_calle_2
            ,SUBSTR(a.questionnaire,2931,13) Latitud_B
            ,SUBSTR(a.questionnaire,2944,13) Longitud_B
            ,SUBSTR(a.questionnaire,2957,8) UPM
            ,SUBSTR(a.questionnaire,2965,2) Distrito
            ,SUBSTR(a.questionnaire,2967,4) Unidad_censal
            ,SUBSTR(a.questionnaire,2971,13) Latitud_C
            ,SUBSTR(a.questionnaire,2984,13) Longitud_C
            ,SUBSTR(a.questionnaire,2997,80) Apellido_encuestador
            ,SUBSTR(a.questionnaire,3077,30) Id_del_dispositivo
            from `".$request -> db."`.".$encuesta -> nombre_tabla." a
            where ltrim(rtrim(SUBSTR(a.questionnaire,2219,2)))='1'

            ");


                 $ruta_audios = $encuesta -> carpeta_audios;
                 $ruta_imagenes = $encuesta -> carpeta_imagenes;
                 if (is_dir($ruta_audios))
               	{
                       // Abre un gestor de directorios para la ruta indicada
                       $gestor_audios = opendir($ruta_audios);
                       // Recorre todos los elementos del directorio
                       while (($archivo_audios = readdir($gestor_audios)) !== false)
               		{
                           $ruta_completa_audios = $ruta_audios . "/" . $archivo_audios;
                           // Se muestran todos los archivos y carpetas excepto "." y ".."
                           if ($archivo_audios != "." && $archivo_audios != "..")
               			{
                               // Si es un directorio se recorre recursivamente
                               if (is_dir($ruta_completa_audios))
               				{
                                   // Si es una directorio se recorre recursivamente
                               }
               				else
               				{
               					// Extrae el codigo de la ciudad de las posiciones segun lo indicado del 21,22,23 del nombre del directorio
               					if(substr($archivo_audios , -4) == ".3gp")
               					{
               						//$ciudad => substr($archivo, 20, 3);
                           DB::insert("
                           insert into archivos
                                   (id_encuesta,nombre_archivo,codigo_ciudad,tipo)

                               values

                               (".$encuesta -> id.",'".$archivo_audios."',". (int) substr($archivo_audios, 20, 3) .",'audio')


                               ");
                       					}
                               }
                           }
                       }
                       // Cierra el gestor de directorios
                       closedir($gestor_audios);
                   }

                   if (is_dir($ruta_imagenes))
                 	{
                         // Abre un gestor de directorios para la ruta indicada
                         $gestor_imagenes = opendir($ruta_imagenes);
                         // Recorre todos los elementos del directorio
                         while (($archivo_imagenes = readdir($gestor_imagenes)) !== false)
                 		{
                             $ruta_completa_imagenes = $ruta_imagenes . "/" . $archivo_imagenes;
                             // Se muestran todos los archivos y carpetas excepto "." y ".."
                             if ($archivo_imagenes != "." && $archivo_imagenes != "..")
                 			{
                                 // Si es un directorio se recorre recursivamente
                                 if (is_dir($ruta_completa_imagenes))
                 				{
                                     // Si es una directorio se recorre recursivamente
                                 }
                 				else
                 				{
                 					// Extrae el codigo de la ciudad de las posiciones segun lo indicado del 21,22,23 del nombre del directorio
                 					if(substr($archivo_imagenes , -4) == ".jpg")
                 					{
                 						//$ciudad => substr($archivo, 20, 3);
                             DB::insert("
                             insert into archivos
                                     (id_encuesta,nombre_archivo,codigo_ciudad,tipo)

                                 values

                                 (".$encuesta -> id.",'".$archivo_imagenes."',". (int) substr($archivo_imagenes, 20, 3) .",'imagen')

                                   ");
                         					}
                                 }
                             }
                         }
                         // Cierra el gestor de directorios
                         closedir($gestor_imagenes);
                     }

             return redirect()->route('encuesta.index')->with('mensaje',"Se a enlazado la encuesta exitosamente. ");

            }
            else
            {
                 return redirect()->route('encuesta.index')->with('mensaje_error',"La tabla seleccionada no se encuentra en el formato requerido. ");
            }


        }


    public function actualizar(Request $request)
    {
        $encuesta = Encuesta::find($request->id_encuesta);
        $encuesta -> updated_at = date("Y-m-d h:i:s");
        $encuesta -> save();

        $borrar = DB::select(  DB::raw("delete from encuesta_detalle where id_encuesta =  (".$encuesta -> id.")"));
        $borrar = DB::select(  DB::raw("delete from encuesta_detalle2 where id_encuesta =  (".$encuesta -> id.")"));
        $borrar = DB::select(  DB::raw("delete from archivos where id_encuesta =  (".$encuesta -> id.")"));

        // dd($encuesta);
        DB::insert("
            insert into encuesta_detalle
                (id_encuesta,fecha,hora,ci_enc,ciudad,id_ciudad,estudio,periodo,contador,horainisis,horafinsis,duracion,latitud_a,longitud_a,entrevistado,edad,rango_edad,genero,nse,telf,ci,email,zona,manzano,manzano1,direccion,num_casa,referencia,nomb_enc,cod_enc,supervision,tipo_supervision,nom_supervisor,cod_supervisor,id_auxiliar)
            select
            ".$encuesta -> id." encuestaid
            ,IFNULL(cast(SUBSTR(a.questionnaire,2,6) as date),'') Fecha
            ,IFNULL(SUBSTR(a.questionnaire,8,6),'')  Hora
            ,SUBSTR(a.questionnaire,14,8) CI_del_Encuestador
            ,IFNULL(c.nombre,'SIN CIUDAD') ciudad
            ,SUBSTR(a.questionnaire,22,1) Ciudad2
            ,SUBSTR(a.questionnaire,23,4) Estudio
            ,SUBSTR(a.questionnaire,27,4) Periodo
            ,SUBSTR(a.questionnaire,31,3) Contador
            ,SUBSTR(a.questionnaire,34,6)  Hora_de_Inicio_del_Sistema
            ,SUBSTR(a.questionnaire,40,6)  Hora_de_Finalización_del_Sistema
            ,SUBSTR(a.questionnaire,46,6) Duración
            ,SUBSTR(a.questionnaire,52,13) Latitud_A
            ,SUBSTR(a.questionnaire,65,13) Longitud_A
            ,SUBSTR(a.questionnaire,78,80) Entrevistado
            ,SUBSTR(a.questionnaire,158,2) Edad
            ,SUBSTR(a.questionnaire,160,1) Rango_de_edad
            ,SUBSTR(a.questionnaire,161,1) Genero
            ,SUBSTR(a.questionnaire,162,1) NSE
            ,SUBSTR(a.questionnaire,163,30) Teléfono
            ,SUBSTR(a.questionnaire,193,15) Carnet_de_Identidad
            ,SUBSTR(a.questionnaire,208,100) Email
            ,SUBSTR(a.questionnaire,308,3) Zona
            ,SUBSTR(a.questionnaire,311,4) Manzano
            ,SUBSTR(a.questionnaire,315,20) Manzano_1
            ,SUBSTR(a.questionnaire,335,120) Direccion
            ,SUBSTR(a.questionnaire,455,10) Número_de_casa
            ,SUBSTR(a.questionnaire,465,250) Referencia
            ,SUBSTR(a.questionnaire,715,80) Nombre_de_la_encuestador
            ,SUBSTR(a.questionnaire,795,4) Código_del_encuestador
            ,SUBSTR(a.questionnaire,799,1) Supervisión
            ,SUBSTR(a.questionnaire,800,1) Tipo_de_Supervisión
            ,SUBSTR(a.questionnaire,801,80) Nombre_del_supervisor
            ,SUBSTR(a.questionnaire,881,4) Código_del_supervisor
            ,SUBSTR(a.questionnaire,885,34) Id_auxiliar
            from `".$encuesta -> nombre_db."`.".$encuesta -> nombre_tabla." a
             LEFT JOIN ciudad c on c.id = SUBSTR(a.questionnaire,22,1)
             where ltrim(rtrim(SUBSTR(a.questionnaire,2219,2)))='1'
            ");

        DB::insert("
        insert into encuesta_detalle2
                (id_encuesta,fecha,hora,ci_enc,ciudad,dataint1,dataint2,dataint3,dataint4,dataint5,dataint6,dataint7,dataint8,dataint9,dataint10,data1,data2,data3,data4,data5,data6,data7,data8,data9,data10,resultado,nom_zona,nom_emp,telf_emp,cargo,direc_c1,direc_calle2,latitud_b,longitud_b,upm,distrito,uni_censal,latitud_c,longitud_c,ap_enc,id_disp)
            select
            ".$encuesta -> id." encuestaid
            ,SUBSTR(a.questionnaire,2,6) Fecha
            ,SUBSTR(a.questionnaire,8,6) Hora
            ,SUBSTR(a.questionnaire,14,8) CI_del_Encuestador
            ,SUBSTR(a.questionnaire,22,1) Ciudad

            ,SUBSTR(a.questionnaire,919,10) DATAINT1
            ,SUBSTR(a.questionnaire,929,10) DATAINT2
            ,SUBSTR(a.questionnaire,939,10) DATAINT3
            ,SUBSTR(a.questionnaire,949,10) DATAINT4
            ,SUBSTR(a.questionnaire,959,10) DATAINT5
            ,SUBSTR(a.questionnaire,969,10) DATAINT6
            ,SUBSTR(a.questionnaire,979,10) DATAINT7
            ,SUBSTR(a.questionnaire,989,10) DATAINT8
            ,SUBSTR(a.questionnaire,999,10) DATAINT9
            ,SUBSTR(a.questionnaire,1009,10) DATAINT10
            ,SUBSTR(a.questionnaire,1019,120) DATA1
            ,SUBSTR(a.questionnaire,1139,120) DATA2
            ,SUBSTR(a.questionnaire,1259,120) DATA3
            ,SUBSTR(a.questionnaire,1379,120) DATA4
            ,SUBSTR(a.questionnaire,1499,120) DATA5
            ,SUBSTR(a.questionnaire,1619,120) DATA6
            ,SUBSTR(a.questionnaire,1739,120) DATA7
            ,SUBSTR(a.questionnaire,1859,120) DATA8
            ,SUBSTR(a.questionnaire,1979,120) DATA9
            ,SUBSTR(a.questionnaire,2099,120) DATA10
            ,SUBSTR(a.questionnaire,2219,2) RESULTADO
            ,SUBSTR(a.questionnaire,2221,300) Nombre_de_la_zona
            ,SUBSTR(a.questionnaire,2521,100) Nombre_de_la_empresa_o_negocio
            ,SUBSTR(a.questionnaire,2621,30) Teléfono_de_la_empresa
            ,SUBSTR(a.questionnaire,2651,80) Cargo
            ,SUBSTR(a.questionnaire,2731,100) Dirección_calle_1
            ,SUBSTR(a.questionnaire,2831,100) Dirección_calle_2
            ,SUBSTR(a.questionnaire,2931,13) Latitud_B
            ,SUBSTR(a.questionnaire,2944,13) Longitud_B
            ,SUBSTR(a.questionnaire,2957,8) UPM
            ,SUBSTR(a.questionnaire,2965,2) Distrito
            ,SUBSTR(a.questionnaire,2967,4) Unidad_censal
            ,SUBSTR(a.questionnaire,2971,13) Latitud_C
            ,SUBSTR(a.questionnaire,2984,13) Longitud_C
            ,SUBSTR(a.questionnaire,2997,80) Apellido_encuestador
            ,SUBSTR(a.questionnaire,3077,30) Id_del_dispositivo
            from `".$encuesta -> nombre_db."`.".$encuesta -> nombre_tabla." a
            where ltrim(rtrim(SUBSTR(a.questionnaire,2219,2)))='1'
            ");
            $ruta_audios = $encuesta -> carpeta_audios;
            $ruta_imagenes = $encuesta -> carpeta_imagenes;
            if (is_dir($ruta_audios))
           {
                  // Abre un gestor de directorios para la ruta indicada
                  $gestor_audios = opendir($ruta_audios);
                  // Recorre todos los elementos del directorio
                  while (($archivo_audios = readdir($gestor_audios)) !== false)
             {
                      $ruta_completa_audios = $ruta_audios . "/" . $archivo_audios;
                      // Se muestran todos los archivos y carpetas excepto "." y ".."
                      if ($archivo_audios != "." && $archivo_audios != "..")
               {
                          // Si es un directorio se recorre recursivamente
                          if (is_dir($ruta_completa_audios))
                 {
                              // Si es una directorio se recorre recursivamente
                          }
                 else
                 {
                   // Extrae el codigo de la ciudad de las posiciones segun lo indicado del 21,22,23 del nombre del directorio
                   if(substr($archivo_audios , -4) == ".3gp")
                   {
                     //$ciudad => substr($archivo, 20, 3);
                      DB::insert("
                      insert into archivos
                              (id_encuesta,nombre_archivo,codigo_ciudad,tipo)

                          values

                          (".$encuesta -> id.",'".$archivo_audios."',". (int) substr($archivo_audios, 20, 3) .",'audio')


                          ");
                           }
                          }
                      }
                  }
                  // Cierra el gestor de directorios
                  closedir($gestor_audios);
              }

              if (is_dir($ruta_imagenes))
             {
                    // Abre un gestor de directorios para la ruta indicada
                    $gestor_imagenes = opendir($ruta_imagenes);
                    // Recorre todos los elementos del directorio
                    while (($archivo_imagenes = readdir($gestor_imagenes)) !== false)
               {
                        $ruta_completa_imagenes = $ruta_imagenes . "/" . $archivo_imagenes;
                        // Se muestran todos los archivos y carpetas excepto "." y ".."
                        if ($archivo_imagenes != "." && $archivo_imagenes != "..")
                 {
                            // Si es un directorio se recorre recursivamente
                            if (is_dir($ruta_completa_imagenes))
                   {
                                // Si es una directorio se recorre recursivamente
                            }
                   else
                   {
                     // Extrae el codigo de la ciudad de las posiciones segun lo indicado del 21,22,23 del nombre del directorio
                     if(substr($archivo_imagenes , -4) == ".jpg")
                     {
                       //$ciudad => substr($archivo, 20, 3);
                        DB::insert("
                        insert into archivos
                                (id_encuesta,nombre_archivo,codigo_ciudad,tipo)

                            values

                            (".$encuesta -> id.",'".$archivo_imagenes."',". (int) substr($archivo_imagenes, 20, 3) .",'imagen')

                              ");
                             }
                            }
                        }
                    }
                    // Cierra el gestor de directorios
                    closedir($gestor_imagenes);
                }


         return redirect()->route('encuesta.index')->with('mensaje',"Se actualizo encuesta exitosamente. ");


    }

    public function index()
    {

        $id_user = Auth::user()->rol_id;
        if(Auth::user()->rol->descripcion == 'CLIENTE'){

            $encuesta=Encuesta::whereIn('id', function($query) use ($id_user) {
            $query->select('encuesta_id')
            ->from(with(new EncuestaCliente)->getTable())
            ->where('usuario_id',$id_user);
        })->get();
        }
        else
        {

            $encuesta=Encuesta::all();
        }


        $campos_tabla =  DB::select( DB::raw("SHOW COLUMNS FROM v_encuesta_detalle"));
        // dd($campos_tabla);
        return view('encuestas.index')->with('encuesta',$encuesta)->with('campos_tabla',$campos_tabla);
    }

    public function contenido_detalle(Request $request)
    {
        $encuesta_Cab = Encuesta::find($request->id_encuesta);
        $array_campos = $request->lista_campos;
        if(empty($array_campos))
        {
            $detalle = V_detalle_encuesta::where('id_encuesta',$request->id_encuesta)->get();
            $campos_tabla =  DB::select( DB::raw("SHOW COLUMNS FROM v_encuesta_detalle"));

            for ($i = 0; $i < sizeof($campos_tabla); $i++)
            {
                $array_campos[$i] = $campos_tabla[$i]->Field;
            }
        }
        else
        {
            $cadena ="";
            for ($i = 0; $i < sizeof($array_campos); $i++)
            {
                $cadena = $cadena.$array_campos[$i];
                if($i < (sizeof($array_campos))-1){
                $cadena = $cadena.',';
               }
            }
            $detalle = V_detalle_encuesta::query();
            $detalle = $detalle->select(DB::raw($cadena));
            $detalle = $detalle->where('id_encuesta',$request->id_encuesta)->get();
        }
        return view('encuestas.detalle_content')
                ->with('encuesta_Cab',$encuesta_Cab)
                ->with('array_campos',$array_campos)
                ->with('detalle',$detalle);
    }



    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Encuesta  $encuesta
     * @return \Illuminate\Http\Response
     */
    public function show(Encuesta $encuesta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Encuesta  $encuesta
     * @return \Illuminate\Http\Response
     */
    public function edit(Encuesta $encuesta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Encuesta  $encuesta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Encuesta $encuesta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Encuesta  $encuesta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Encuesta $encuesta)
    {
        //
    }

}
