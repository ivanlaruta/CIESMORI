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
            ,(count(d.id_encuesta)*100/e.total_encuesta) porcentaje
            from encuesta_detalle d
            left join ciudad c on c.nombre = d.ciudad
            left join departamento de on de.id = c.departamento_id
             left join 
                                (select id_encuesta,count(id_encuesta) total_encuesta 
                                    from encuesta_detalle 
                                    group by id_encuesta) e on e.id_encuesta=d.id_encuesta
            group by id_encuesta,de.nombre,e.total_encuesta
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('v_detalle_encuestas_departamento');
    }
}
