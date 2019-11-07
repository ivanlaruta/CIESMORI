<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParametricaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parametrica', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('tabla');
            $table->string('codigo');
            $table->string('valor_cadena')->nullable();
            $table->string('valor_cadena_corto')->nullable();
            $table->string('valor_entero')->nullable();
            $table->string('valor_numerico')->nullable();
            $table->integer('inicio')->nullable();
            $table->integer('fin')->nullable();
            $table->string('descripcion')->nullable();
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
        Schema::dropIfExists('parametrica');
    }
}
