<?php

namespace App\Http\Controllers;

use App\Encuesta;
use Illuminate\Http\Request;
use DB;


class EncuestaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function migracion()
    {
        $tablas_db = DB::select( DB::raw(" 
                    SHOW TABLES
                    FROM tablas_ciesmori
            "));
         // dd($tablas_db[0]->Tables_in_tablas_ciesmori);

        return view('encuestas.migracion.index')->with('tablas_db',$tablas_db) ;
    }

    public function migrar(Request $request)
    {
        // dd($request->all());
        $encuesta = new Encuesta();
        $encuesta -> nombre = $request ->nombre;
        $encuesta -> nombre_tabla = $request ->origen;
        $encuesta -> save();

        DB::insert("
            insert into encuesta_detalle
                (id_encuesta,fecha,hora,ci_enc,ciudad,estudio,periodo,contador,horainisis,horafinsis,duracion,latitud_a,longitud_a,entrevistado,edad,rango_edad,genero,nse,telf,ci,email,zona,manzano,manzano1,direccion,num_casa,referencia,nomb_enc,cod_enc,supervision,tipo_supervision,nom_supervisor,cod_supervisor,id_auxiliar)
            select 
            ".$encuesta -> id." encuestaid
            ,SUBSTR(a.questionnaire,2,6) Fecha
            ,SUBSTR(a.questionnaire,8,6) Hora
            ,SUBSTR(a.questionnaire,14,8) CI_del_Encuestador
            ,SUBSTR(a.questionnaire,22,1) Ciudad
            ,SUBSTR(a.questionnaire,23,4) Estudio
            ,SUBSTR(a.questionnaire,27,4) Periodo
            ,SUBSTR(a.questionnaire,31,3) Contador
            ,SUBSTR(a.questionnaire,34,6) Hora_de_Inicio_del_Sistema
            ,SUBSTR(a.questionnaire,40,6) Hora_de_Finalización_del_Sistema
            ,SUBSTR(a.questionnaire,46,6) Duración
            ,SUBSTR(a.questionnaire,52,13) Latitud_A
            ,SUBSTR(a.questionnaire,65,13) Longitud_A
            ,SUBSTR(a.questionnaire,78,80) Entrevistado
            ,SUBSTR(a.questionnaire,158,2) Edad
            ,SUBSTR(a.questionnaire,160,1) Rango_de_edad
            ,SUBSTR(a.questionnaire,161,1) Género
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
            from tablas_ciesmori.".$encuesta -> nombre_tabla." a
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
            from tablas_ciesmori.".$encuesta -> nombre_tabla." a
            ");
     



        dd('save');


        $consulta = DB::select( DB::raw(" select * from ".$request->origen));





    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
