<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleEncuestaView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
            create view v_encuesta_detalle as
            select d1.id_encuesta,d1.id,d1.fecha,d1.hora,d1.ci_enc,d1.ciudad,d1.estudio,d1.periodo,d1.contador,d1.horainisis,d1.horafinsis,d1.duracion,d1.latitud_a,d1.longitud_a,d1.entrevistado,d1.edad,d1.rango_edad,d1.genero,d1.nse,d1.telf,d1.ci,d1.email,d1.zona,d1.manzano,d1.manzano1,d1.direccion,d1.num_casa,d1.referencia,d1.nomb_enc,d1.cod_enc,d1.supervision,d1.tipo_supervision,d1.nom_supervisor,d1.cod_supervisor,d1.id_auxiliar,d2.dataint1,d2.dataint2,d2.dataint3,d2.dataint4,d2.dataint5,d2.dataint6,d2.dataint7,d2.dataint8,d2.dataint9,d2.dataint10,d2.data1,d2.data2,d2.data3,d2.data4,d2.data5,d2.data6,d2.data7,d2.data8,d2.data9,d2.data10,d2.resultado,d2.nom_zona,d2.nom_emp,d2.telf_emp,d2.cargo,d2.direc_c1,d2.direc_calle2,d2.latitud_b,d2.longitud_b,d2.upm,d2.distrito,d2.uni_censal,d2.latitud_c,d2.longitud_c,d2.ap_enc,d2.id_disp
            from encuesta e
            left join encuesta_detalle d1 on d1.id_encuesta = e.id
            left join encuesta_detalle2 d2 on d1.id_encuesta = d2.id_encuesta and d1.ci_enc = d2.ci_enc and d1.fecha and d2.fecha and d1.hora = d2.hora and d1.ciudad = d2.ciudad
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         DB::statement("DROP VIEW v_encuesta_detalle");
    }
}
