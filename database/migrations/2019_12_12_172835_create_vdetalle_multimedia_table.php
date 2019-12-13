<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVdetalleMultimediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      DB::statement("
          create view V_detalle_multimedia as
          SELECT d.id_encuesta,e.nombre,d.ciudad, d.nomb_enc, a.tipo, substr(d.id_auxiliar,1,26) as id_auxiliar, substr(a.nombre_archivo,1,26) as nombre_archivo
          FROM ciesmoridb.encuesta_detalle d
          LEFT JOIN ciesmoridb.archivos a on a.nombre_archivo= d.id_auxiliar
          INNER JOIN ciesmoridb.encuesta e ON e.id = d.id_encuesta
          order by d.nomb_enc

        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
          DB::statement("DROP VIEW V_detalle_multimedia");
    }
}
