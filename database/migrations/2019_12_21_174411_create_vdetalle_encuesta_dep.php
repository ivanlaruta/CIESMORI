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
             ,n.nro_ciudad
             from encuesta_detalle d
             left join ciudad c on c.nombre = d.ciudad
             left join departamento de on de.id = c.departamento_id
             left join
                                 (select id_encuesta,count(id_encuesta) total_encuesta
                                     from encuesta_detalle
                                     group by id_encuesta) e on e.id_encuesta=d.id_encuesta
             left join cuota_ciudad cc on cc.id_encuesta= d.id_encuesta and cc.id_ciudad = c.id
             INNER join
                   (select a.id_encuesta,count(a.ciudad) as nro_ciudad,a.ciudad from
                      (select id_encuesta,ciudad, nomb_enc, ci_enc
                       from ciesmoridb.encuesta_detalle
                       group by id_encuesta,ciudad, nomb_enc, ci_enc
                     ) as a group by a.id_encuesta ,a.ciudad) n on e.id_encuesta=n.id_encuesta and de.nombre=n.ciudad
         group by id_encuesta,de.nombre,e.total_encuesta,cc.meta,n.nro_ciudad,n.ciudad");
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
