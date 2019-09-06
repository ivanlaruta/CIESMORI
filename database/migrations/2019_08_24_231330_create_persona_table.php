<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persona', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ci')->unique();
            $table->string('cod_expedido');
            $table->string('primer_nombre');
            $table->string('segundo_nombre')->nullable();
            $table->string('apellido_paterno');
            $table->string('apellido_materno')->nullable();
            $table->string('cod_genero');
            $table->date('fecha_nacimiento');
            $table->string('cod_estado_civil');
            $table->string('cod_residencia');
            $table->string('zona')->nullable();
            $table->string('direccion')->nullable();
            $table->string('telefono1')->nullable();
            $table->string('telefono2')->nullable();
            $table->string('cod_nivel_educacion')->nullable();
            $table->string('nivel_curso')->nullable();
            $table->integer('imagen_id')->default(1);

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
        Schema::dropIfExists('persona');
    }
}
