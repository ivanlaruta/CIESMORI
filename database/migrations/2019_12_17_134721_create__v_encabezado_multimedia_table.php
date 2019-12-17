<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVEncabezadoMultimediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      DB::statement("
          create view V_encabezado_multimedia as
            select id_encuesta,nombre,ciudad,count(ciudad) as numero_boletas_cuidad,nomb_enc,count(nombre_archivo) as cantidad_de_archivos
            from v_detalle_multimedia
            group by ciudad, nombre,nomb_enc,id_encuesta
            order by nombre,ciudad,nomb_enc
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW V_encabezado_multimedia");
    }
}
