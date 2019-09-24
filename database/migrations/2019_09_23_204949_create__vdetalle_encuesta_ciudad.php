<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVdetalleEncuestaCiudad extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
            create view detalle_encuestas_ciudad as
                select d.id_encuesta,d.ciudad,e.total_encuesta total_encuesta,count(d.id_encuesta) cantidad, (count(d.id_encuesta)*100/e.total_encuesta) porcentaje
                from v_encuesta_detalle d
                 left join (select id_encuesta,count(*) total_encuesta from v_encuesta_detalle group by id_encuesta) e on e.id_encuesta=d.id_encuesta
                group by id_encuesta,ciudad,e.total_encuesta
        ");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_encuestas_ciudad');
    }
}
