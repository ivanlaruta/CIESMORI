<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEncuestaDetalleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('encuesta_detalle', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fecha');
            $table->string('hora');
            $table->string('ci_enc');
            $table->string('ciudad');
            $table->string('estudio');
            $table->string('periodo');
            $table->string('contador');
            $table->string('horainisis');
            $table->string('horafinsis');
            $table->string('duracion');
            $table->string('latitud_a');
            $table->string('longitud_a');
            $table->string('entrevistado');
            $table->string('edad');
            $table->string('rango_edad');
            $table->string('genero');
            $table->string('nse');
            $table->string('telf');
            $table->string('ci');
            $table->string('email');
            $table->string('zona');
            $table->string('manzano');
            $table->string('manzano1');
            $table->string('direccion');
            $table->string('num_casa');
            $table->string('referencia');
            $table->string('nomb_enc');
            $table->string('cod_enc');
            $table->string('supervision');
            $table->string('tipo_supervision');
            $table->string('nom_supervisor');
            $table->string('cod_supervisor');
            $table->string('id_auxiliar');

            $table->string('observacion')->nullable();
            $table->integer('estado')->default(1);
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('encuesta_detalle');
    }
}
