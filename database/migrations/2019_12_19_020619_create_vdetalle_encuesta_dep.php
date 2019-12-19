<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVdetalleEncuestaDep extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      DB::statement("
          create view v_detalle_encuestas_departamento as
          select
            d.id_encuesta
            ,IFNULL(de.nombre,'SIN DEPARTAMENTO') departamento
            ,e.total_encuesta total_encuesta
            ,count(d.id_encuesta) cantidad
            ,(e.total_encuesta*100/cc.meta) porcentaje
            from encuesta_detalle d
            left join ciudad c on c.nombre = d.ciudad
            left join departamento de on de.id = c.departamento_id
            left join
                                (select id_encuesta,count(id_encuesta) total_encuesta
                                    from encuesta_detalle
                                    group by id_encuesta) e on e.id_encuesta=d.id_encuesta
            left join cuota_ciudad cc on cc.id_encuesta= d.id_encuesta and cc.id_ciudad = c.id
            group by id_encuesta,de.nombre,e.total_encuesta,cc.meta
      ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      DB::statement("DROP VIEW v_detalle_encuestas_departamento");
    }
}
