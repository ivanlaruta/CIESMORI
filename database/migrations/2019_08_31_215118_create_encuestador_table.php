<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEncuestadorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('encuestador', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('persona_id');
           
            $table->string('cargo');
            $table->string('cod_disponibilidad_tiempo')->nullable();
            $table->integer('horas_que_puede_trabajar');
            $table->integer('experiencia');

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
        Schema::dropIfExists('encuestador');
    }
}
