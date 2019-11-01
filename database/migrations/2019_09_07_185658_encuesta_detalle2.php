<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EncuestaDetalle2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('encuesta_detalle2', function (Blueprint $table) {
          $table->bigIncrements('id');
            $table->integer('id_encuesta');
            $table->date('fecha');
            $table->time('hora');
            $table->string('ci_enc');
            $table->string('ciudad');
          $table->string('dataint1');
          $table->string('dataint2');
          $table->string('dataint3');
          $table->string('dataint4');
          $table->string('dataint5');
          $table->string('dataint6');
          $table->string('dataint7');
          $table->string('dataint8');
          $table->string('dataint9');
          $table->string('dataint10');
          $table->string('data1');
          $table->string('data2');
          $table->string('data3');
          $table->string('data4');
          $table->string('data5');
          $table->string('data6');
          $table->string('data7');
          $table->string('data8');
          $table->string('data9');
          $table->string('data10');
          $table->string('resultado');
          $table->string('nom_zona');
          $table->string('nom_emp');
          $table->string('telf_emp');
          $table->string('cargo');
          $table->string('direc_c1');
          $table->string('direc_calle2');
          $table->string('latitud_b');
          $table->string('longitud_b');
          $table->string('upm');
          $table->string('distrito');
          $table->string('uni_censal');
          $table->string('latitud_c');
          $table->string('longitud_c');
          $table->string('ap_enc');
          $table->string('id_disp');
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
          Schema::dropIfExists('encuesta_detalle2');
    }
}
