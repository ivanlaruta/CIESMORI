<?php

use Illuminate\Database\Seeder;

class PosicionesEncuestadorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('posiciones_encuestador')->insert([
       'descripcion' => 'record_type',
       'campo' => '',
       'inicio' => 1,
       'longitud' => 1,
     ]);
     DB::table('posiciones_encuestador')->insert([
       'descripcion' => 'CI',
       'campo' => 'CI_ID',
       'inicio' => 2,
       'longitud' => 8,
     ]);
     DB::table('posiciones_encuestador')->insert([
       'descripcion' => 'Procedencia',
       'campo' => 'CI_PR',
       'inicio' => 10,
       'longitud' => 3,
     ]);
     DB::table('posiciones_encuestador')->insert([
       'descripcion' => 'PRIMER NOMBRE',
       'campo' => 'PRIMER_NOMBRE_E',
       'inicio' => 13,
       'longitud' => 30,
     ]);
     DB::table('posiciones_encuestador')->insert([
       'descripcion' => 'SEGUNDO NOMBRE',
       'campo' => 'SEGUNDO_NOMBRE_E',
       'inicio' => 43,
       'longitud' => 30,
     ]);
     DB::table('posiciones_encuestador')->insert([
       'descripcion' => 'APELLIDO PATERNO',
       'campo' => 'APELLIDO_PATERNO_E',
       'inicio' => 73,
       'longitud' => 30,
     ]);
     DB::table('posiciones_encuestador')->insert([
       'descripcion' => 'APELLIDO MATERNO',
       'campo' => 'APELLIDO_MATERNO_E',
       'inicio' => 103,
       'longitud' => 30,
     ]);
     DB::table('posiciones_encuestador')->insert([
       'descripcion' => 'SEXO',
       'campo' => 'GENERO_E',
       'inicio' => 133,
       'longitud' => 1,
     ]);
     DB::table('posiciones_encuestador')->insert([
       'descripcion' => 'FECHA DE NACIMIENTO',
       'campo' => 'FECHA_NACI_E',
       'inicio' => 134,
       'longitud' => 8,
     ]);
     DB::table('posiciones_encuestador')->insert([
       'descripcion' => 'ESTADO CIVIL',
       'campo' => 'ESTADO_CIVIL_E',
       'inicio' => 142,
       'longitud' => 1,
     ]);
     DB::table('posiciones_encuestador')->insert([
       'descripcion' => 'CIUDAD',
       'campo' => 'CIUDAD_E',
       'inicio' => 143,
       'longitud' => 3,
     ]);
     DB::table('posiciones_encuestador')->insert([
       'descripcion' => 'ZONA',
       'campo' => 'ZONA_E',
       'inicio' => 146,
       'longitud' => 120,
     ]);
     DB::table('posiciones_encuestador')->insert([
       'descripcion' => 'DIRECCIÓN',
       'campo' => 'DIRECCION_E',
       'inicio' => 266,
       'longitud' => 120,
     ]);
     DB::table('posiciones_encuestador')->insert([
       'descripcion' => 'TÉLEFONO',
       'campo' => 'TELEFONO_E',
       'inicio' => 386,
       'longitud' => 30,
     ]);
     DB::table('posiciones_encuestador')->insert([
       'descripcion' => 'NIVEL EDUCACIÓN (Ultimo nivel de Educación Cursado)',
       'campo' => 'EDUCACION_E',
       'inicio' => 416,
       'longitud' => 2,
     ]);
     DB::table('posiciones_encuestador')->insert([
       'descripcion' => 'NIVEL Y CURSO',
       'campo' => 'NIVEL_E',
       'inicio' => 418,
       'longitud' => 1,
     ]);
     DB::table('posiciones_encuestador')->insert([
       'descripcion' => 'CARGO DEL ENCUESTADOR',
       'campo' => 'CARGO_E',
       'inicio' => 419,
       'longitud' => 120,
     ]);
     DB::table('posiciones_encuestador')->insert([
       'descripcion' => 'TIPO DE ESTUDIO AL QUE ES ESPECIALIZADO',
       'campo' => 'ESTUDIO_E',
       'inicio' => 539,
       'longitud' => 2,
     ]);
     DB::table('posiciones_encuestador')->insert([
       'descripcion' => 'Disponibilidad de tiempo (Parcial/total)',
       'campo' => 'DISPONIBILIDAD_E',
       'inicio' => 541,
       'longitud' => 2,
     ]);
     DB::table('posiciones_encuestador')->insert([
       'descripcion' => 'HORARIO DISPONIBLE (MAÑANA/TARDE/NOCHE)',
       'campo' => 'TURNO_E',
       'inicio' => 543,
       'longitud' => 3,
     ]);
     DB::table('posiciones_encuestador')->insert([
       'descripcion' => 'HORARIO DISPONIBLE (MAÑANA/TARDE/NOCHE)',
       'campo' => 'TURNO_E1',
       'inicio' => 543,
       'longitud' => 1,
     ]);
     DB::table('posiciones_encuestador')->insert([
       'descripcion' => 'HORARIO DISPONIBLE (MAÑANA/TARDE/NOCHE)',
       'campo' => 'TURNO_E2',
       'inicio' => 544,
       'longitud' => 1,
     ]);
     DB::table('posiciones_encuestador')->insert([
       'descripcion' => 'HORARIO DISPONIBLE (MAÑANA/TARDE/NOCHE)',
       'campo' => 'TURNO_E3',
       'inicio' => 545,
       'longitud' => 1,
     ]);
     DB::table('posiciones_encuestador')->insert([
       'descripcion' => 'Horas que puede trabajar al dia',
       'campo' => 'TOTAL_HORAS_E',
       'inicio' => 546,
       'longitud' => 2,
     ]);
     DB::table('posiciones_encuestador')->insert([
       'descripcion' => 'Experiencia en realizacion de encuestas (años)',
       'campo' => 'EXPERIENCIA_E',
       'inicio' => 548,
       'longitud' => 2,
     ]);
     DB::table('posiciones_encuestador')->insert([
       'descripcion' => 'Empresa de Investigación donde trabajo (antes)',
       'campo' => 'EMPRESA_ANT_E',
       'inicio' => 550,
       'longitud' => 120,
     ]);
     DB::table('posiciones_encuestador')->insert([
       'descripcion' => 'OBSERVACIONES',
       'campo' => 'OBS_E',
       'inicio' => 670,
       'longitud' => 200,
     ]);
     DB::table('posiciones_encuestador')->insert([
       'descripcion' => 'FECHA LLENADO',
       'campo' => 'FECHA_E',
       'inicio' => 870,
       'longitud' => 8,
     ]);
     DB::table('posiciones_encuestador')->insert([
       'descripcion' => 'HORA DE LLENADO',
       'campo' => 'HORA_E',
       'inicio' => 878,
       'longitud' => 8,
     ]);
    }
}
