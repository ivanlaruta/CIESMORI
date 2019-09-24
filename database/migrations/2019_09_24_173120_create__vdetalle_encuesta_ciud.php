<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVdetalleEncuestaCiud extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
            create view v_detalle_encuestas_ciudad as
                select d.id_encuesta,d.ciudad,de.nombre departamento,e.total_encuesta total_encuesta,count(d.id_encuesta) cantidad, (count(d.id_encuesta)*100/e.total_encuesta) porcentaje
                from encuesta_detalle d
                left join ciudad c on c.nombre = d.ciudad
                left join departamento de on de.id = c.departamento_id
                left join (select id_encuesta,count(*) total_encuesta from encuesta_detalle group by id_encuesta) e on e.id_encuesta=d.id_encuesta
                group by id_encuesta,ciudad,e.total_encuesta ,de.nombre 
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW v_detalle_encuestas_ciudad");
    }
}
