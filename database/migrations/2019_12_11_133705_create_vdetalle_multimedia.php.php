<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVdetalleMultimedia.php extends Migration
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
          SELECT e.nomb_enc , substr(e.id_auxiliar,1,26),  substr(a.nombre_archivo,1,26), a.id_encuesta, a.nombre_archivo, a.codigo_ciudad,c.nombre,a.tipo,e.id_encuesta, a.id_encuesta
          , ee.nombre
          from ciesmoridb.encuesta_detalle e
          INNER JOIN ciesmoridb.archivos a ON e.id_encuesta= a.id_encuesta
          and a.nombre_archivo= e.id_auxiliar
          INNER JOIN ciesmoridb.ciudad c ON c.id= a.id_encuesta
          INNER JOIN ciesmoridb.encuesta ee ON ee.id= e.id_encuesta
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
