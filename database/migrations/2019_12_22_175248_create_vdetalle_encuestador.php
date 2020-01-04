<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVdetalleEncuestador extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      DB::statement("
        create view v_detalle_encuestador as
        select
          p.id,
          p.ci,
          c.nombre as expedido,
          p.primer_nombre,
          p.segundo_nombre,
          p.apellido_paterno,
          p.apellido_materno,
          DATE_FORMAT(p.fecha_nacimiento, '%d/%m/%Y') as fecha_nacimiento,
          pa.valor_cadena as genero,
          pec.valor_cadena as estado_civil, 
          ciu.nombre as cod_residencia,
          p.zona,
          p.direccion,
          p.telefono1,
          niv.valor_cadena as nivel_educacion,
          p.nivel_curso,
          e.horas_que_puede_trabajar,
          e.experiencia,
          calif.valor_cadena as calificacion,
          est.valor_cadena as estado,
          e.observacion
          from encuestador e
          LEFT JOIN persona p on e.persona_id= p.id
          LEFT JOIN ciudad c on c.id = p.cod_expedido
          LEFT JOIN ciudad ciu on ciu.id = p.cod_residencia
          LEFT JOIN parametrica pa on pa.tabla = 'genero' AND pa.codigo = p.cod_genero
          LEFT JOIN parametrica pec on pec.tabla = 'estado_civil' AND pec.codigo = p.cod_estado_civil
          LEFT JOIN parametrica niv on niv.tabla = 'nivel_educacion' AND niv.codigo = p.cod_nivel_educacion
          LEFT JOIN parametrica calif on calif.tabla = 'CALIFICACION' AND calif.codigo = e.calificacion
          LEFT JOIN parametrica est on est.tabla = 'ESTADO_ENCUESTADORES' AND est.codigo = e.estado");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW v_detalle_encuestador");
    }
}
