<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EncuestaDetalle3Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('encuesta_detalle3', function (Blueprint $table) {
        //     $table->bigIncrements('id');
        //     $table->integer('id_encuesta',10);
        //     $table->string('fecha',10);
        //     $table->string('hora',10);
        //     $table->string('ci_enc',10);
        //     $table->string('ciudad',10);
        //     $table->string('estudio',10);
        //     $table->string('periodo',10);
        //     $table->string('contador',10);
        //     $table->string('horainisis',10);
        //     $table->string('horafinsis',10);
        //     $table->string('duracion',10);
        //     $table->string('latitud_a',10);
        //     $table->string('longitud_a',10);
        //     $table->string('entrevistado',10);
        //     $table->string('edad',10);
        //     $table->string('rango_edad',10);
        //     $table->string('genero',10);
        //     $table->string('nse',10);
        //     $table->string('telf',10);
        //     $table->string('ci',10);
        //     $table->string('email',10);
        //     $table->string('zona',10);
        //     $table->string('manzano',10);
        //     $table->string('manzano1',10);
        //     $table->string('direccion',10);
        //     $table->string('num_casa',10);
        //     $table->string('referencia',10);
        //     $table->string('nomb_enc',10);
        //     $table->string('cod_enc',10);
        //     $table->string('supervision',10);
        //     $table->string('tipo_supervision',10);
        //     $table->string('nom_supervisor',10);
        //     $table->string('cod_supervisor',10);
        //     $table->string('id_auxiliar',10);
        //     $table->string('dataint1',10);
        //   $table->string('dataint2',10);
        //   $table->string('dataint3',10);
        //   $table->string('dataint4',10);
        //   $table->string('dataint5',10);
        //   $table->string('dataint6',10);
        //   $table->string('dataint7',10);
        //   $table->string('dataint8',10);
        //   $table->string('dataint9',10);
        //   $table->string('dataint10',10);
        //   $table->string('data1',10);
        //   $table->string('data2',10);
        //   $table->string('data3',10);
        //   $table->string('data4',10);
        //   $table->string('data5',10);
        //   $table->string('data6',10);
        //   $table->string('data7',10);
        //   $table->string('data8',10);
        //   $table->string('data9',10);
        //   $table->string('data10',10);
        //   $table->string('resultado',10);
        //   $table->string('nom_zona',10);
        //   $table->string('nom_emp',10);
        //   $table->string('telf_emp',10);
        //   $table->string('cargo',10);
        //   $table->string('direc_c1',10);
        //   $table->string('direc_calle2',10);
        //   $table->string('latitud_b',10);
        //   $table->string('longitud_b',10);
        //   $table->string('upm',10);
        //   $table->string('distrito',10);
        //   $table->string('uni_censal',10);
        //   $table->string('latitud_c',10);
        //   $table->string('longitud_c',10);
        //   $table->string('ap_enc',10);
        //   $table->string('id_disp',10);
        //     $table->string('observacion',10)->nullable();
        //     $table->integer('estado')->default(1);
        //     $table->string('created_by')->nullable();
        //     $table->string('updated_by')->nullable();
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('encuesta_detalle3');
    }
}
