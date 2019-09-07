<?php

use Illuminate\Database\Seeder;

class ParametricaPosicionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('parametrica_posiciones')->insert([
        'campo' => 'Fecha',
        'inicio' => 2,
        'longitud' => 6,
      ]);
      DB::table('parametrica_posiciones')->insert([
        'campo' => 'Hora',
        'inicio' => 8,
        'longitud' => 6,
      ]);
      DB::table('parametrica_posiciones')->insert([
        'campo' => 'CI del Encuestador',
        'inicio' => 14,
        'longitud' => 8,
      ]);
      DB::table('parametrica_posiciones')->insert([
        'campo' => 'Ciudad',
        'inicio' => 22,
        'longitud' => 1,
      ]);
      DB::table('parametrica_posiciones')->insert([
        'campo' => 'Estudio',
        'inicio' => 23,
        'longitud' => 4,
      ]);
      DB::table('parametrica_posiciones')->insert([
        'campo' => 'Periodo',
        'inicio' => 27,
        'longitud' => 4,
      ]);
      DB::table('parametrica_posiciones')->insert([
        'campo' => 'Contador',
        'inicio' => 31,
        'longitud' => 3,
      ]);
      DB::table('parametrica_posiciones')->insert([
        'campo' => 'Hora de Inicio del Sistema',
        'inicio' => 34,
        'longitud' => 6,
      ]);
      DB::table('parametrica_posiciones')->insert([
        'campo' => 'Hora de Finalización del Sistema',
        'inicio' => 40,
        'longitud' => 6,
      ]);
      DB::table('parametrica_posiciones')->insert([
        'campo' => 'Duración',
        'inicio' => 46,
        'longitud' => 6,
      ]);
      DB::table('parametrica_posiciones')->insert([
        'campo' => 'Latitud A',
        'inicio' => 52,
        'longitud' => 13,
      ]);
      DB::table('parametrica_posiciones')->insert([
        'campo' => 'Longitud A',
        'inicio' => 65,
        'longitud' => 13,
      ]);
      DB::table('parametrica_posiciones')->insert([
        'campo' => 'Entrevistado',
        'inicio' => 78,
        'longitud' => 80,
      ]);
      DB::table('parametrica_posiciones')->insert([
        'campo' => 'Edad',
        'inicio' => 158,
        'longitud' => 2,
      ]);
      DB::table('parametrica_posiciones')->insert([
        'campo' => 'Rango de edad',
        'inicio' => 160,
        'longitud' => 1,
      ]);
      DB::table('parametrica_posiciones')->insert([
        'campo' => 'Género',
        'inicio' => 161,
        'longitud' => 1,
      ]);
      DB::table('parametrica_posiciones')->insert([
        'campo' => 'NSE',
        'inicio' => 162,
        'longitud' => 1,
      ]);
      DB::table('parametrica_posiciones')->insert([
        'campo' => 'Teléfono',
        'inicio' => 163,
        'longitud' => 30,
      ]);
      DB::table('parametrica_posiciones')->insert([
        'campo' => 'Carnet de Identidad',
        'inicio' => 193,
        'longitud' => 15,
      ]);
      DB::table('parametrica_posiciones')->insert([
        'campo' => 'Email',
        'inicio' => 208,
        'longitud' => 100,
      ]);
      DB::table('parametrica_posiciones')->insert([
        'campo' => 'Zona',
        'inicio' => 308,
        'longitud' => 3,
      ]);
      DB::table('parametrica_posiciones')->insert([
        'campo' => 'Manzano',
        'inicio' => 311,
        'longitud' => 4,
      ]);
      DB::table('parametrica_posiciones')->insert([
        'campo' => 'Manzano 1',
        'inicio' => 315,
        'longitud' => 20,
      ]);
      DB::table('parametrica_posiciones')->insert([
        'campo' => 'Direccion',
        'inicio' => 335,
        'longitud' => 120,
      ]);
      DB::table('parametrica_posiciones')->insert([
        'campo' => 'Número de casa',
        'inicio' => 455,
        'longitud' => 10,
      ]);
      DB::table('parametrica_posiciones')->insert([
        'campo' => 'Referencia',
        'inicio' => 465,
        'longitud' => 250,
      ]);
      DB::table('parametrica_posiciones')->insert([
        'campo' => 'Nombre de la encuestador',
        'inicio' => 715,
        'longitud' => 80,
      ]);

      DB::table('parametrica_posiciones')->insert([
        'campo' => 'Código del encuestador',
        'inicio' => 795,
        'longitud' => 4,
      ]);
      DB::table('parametrica_posiciones')->insert([
        'campo' => 'Supervisión',
        'inicio' => 799,
        'longitud' => 1,
      ]);
      DB::table('parametrica_posiciones')->insert([
        'campo' => 'Tipo de Supervisión',
        'inicio' => 800,
        'longitud' => 1,
      ]);
      DB::table('parametrica_posiciones')->insert([
        'campo' => 'Nombre del supervisor',
        'inicio' => 801,
        'longitud' => 80,
      ]);
      DB::table('parametrica_posiciones')->insert([
        'campo' => 'Código del supervisor',
        'inicio' => 881,
        'longitud' => 4,
      ]);
      DB::table('parametrica_posiciones')->insert([
        'campo' => 'Id auxiliar',
        'inicio' => 885,
        'longitud' => 34,
      ]);
      DB::table('parametrica_posiciones')->insert([
        'campo' => 'DATAINT1',
        'inicio' => 919,
        'longitud' => 10,
      ]);

      DB::table('parametrica_posiciones')->insert([
        'campo' => 'DATAINT2',
        'inicio' => 929,
        'longitud' => 10,
      ]);
      DB::table('parametrica_posiciones')->insert([
        'campo' => 'DATAINT3',
        'inicio' => 939,
        'longitud' => 10,
      ]);
      DB::table('parametrica_posiciones')->insert([
        'campo' => 'DATAINT4',
        'inicio' => 949,
        'longitud' => 10,
      ]);
      DB::table('parametrica_posiciones')->insert([
        'campo' => 'DATAINT5',
        'inicio' => 959,
        'longitud' => 10,
      ]);
      DB::table('parametrica_posiciones')->insert([
        'campo' => 'DATAINT6',
        'inicio' => 969,
        'longitud' => 10,
      ]);
      DB::table('parametrica_posiciones')->insert([
        'campo' => 'DATAINT7',
        'inicio' => 979,
        'longitud' => 10,
      ]);
      DB::table('parametrica_posiciones')->insert([
        'campo' => 'DATAINT8',
        'inicio' => 989,
        'longitud' => 10,
      ]);
      DB::table('parametrica_posiciones')->insert([
        'campo' => 'DATAINT9',
        'inicio' => 999,
        'longitud' => 10,
      ]);
      DB::table('parametrica_posiciones')->insert([
        'campo' => 'DATAINT10',
        'inicio' => 1009,
        'longitud' => 10,
      ]);
      DB::table('parametrica_posiciones')->insert([
        'campo' => 'DATA1',
        'inicio' => 1019,
        'longitud' => 120,
      ]);

      DB::table('parametrica_posiciones')->insert([
        'campo' => 'DATA2',
        'inicio' => 1139,
        'longitud' => 120,
      ]);
      DB::table('parametrica_posiciones')->insert([
        'campo' => 'DATA3',
        'inicio' => 1259,
        'longitud' => 120,
      ]);
      DB::table('parametrica_posiciones')->insert([
        'campo' => 'DATA4',
        'inicio' => 1379,
        'longitud' => 120,
      ]);
      DB::table('parametrica_posiciones')->insert([
        'campo' => 'DATA5',
        'inicio' => 1499,
        'longitud' => 120,
      ]);
      DB::table('parametrica_posiciones')->insert([
        'campo' => 'DATA6',
        'inicio' => 1619,
        'longitud' => 120,
      ]);
      DB::table('parametrica_posiciones')->insert([
        'campo' => 'DATA7',
        'inicio' => 1739,
        'longitud' => 120,
      ]);
      DB::table('parametrica_posiciones')->insert([
        'campo' => 'DATA8',
        'inicio' => 1859,
        'longitud' => 120,
      ]);
      DB::table('parametrica_posiciones')->insert([
        'campo' => 'DATA9',
        'inicio' => 1979,
        'longitud' => 120,
      ]);
      DB::table('parametrica_posiciones')->insert([
        'campo' => 'DATA10',
        'inicio' => 2099,
        'longitud' => 120,
      ]);
      DB::table('parametrica_posiciones')->insert([
        'campo' => 'RESULTADO',
        'inicio' => 2219,
        'longitud' => 2,
      ]);
      DB::table('parametrica_posiciones')->insert([
        'campo' => 'Nombre de la zona',
        'inicio' => 2221,
        'longitud' => 300,
      ]);
      DB::table('parametrica_posiciones')->insert([
        'campo' => 'Nombre de la empresa o negocio',
        'inicio' => 2521,
        'longitud' => 100,
      ]);
      DB::table('parametrica_posiciones')->insert([
        'campo' => 'Teléfono de la empresa',
        'inicio' => 2621,
        'longitud' => 30,
      ]);
      DB::table('parametrica_posiciones')->insert([
        'campo' => 'Cargo',
        'inicio' => 2651,
        'longitud' => 80,
      ]);
      DB::table('parametrica_posiciones')->insert([
        'campo' => 'Dirección calle 1',
        'inicio' => 2731,
        'longitud' => 100,
      ]);

      DB::table('parametrica_posiciones')->insert([
        'campo' => 'Dirección calle 2',
        'inicio' => 2831,
        'longitud' => 100,
      ]);
      DB::table('parametrica_posiciones')->insert([
        'campo' => 'Latitud B',
        'inicio' => 2931,
        'longitud' => 13,
      ]);
      DB::table('parametrica_posiciones')->insert([
        'campo' => 'Longitud B',
        'inicio' => 2944,
        'longitud' => 13,
      ]);
      DB::table('parametrica_posiciones')->insert([
        'campo' => 'UPM',
        'inicio' => 2957,
        'longitud' => 8,
      ]);
      DB::table('parametrica_posiciones')->insert([
        'campo' => 'Distrito',
        'inicio' => 2965,
        'longitud' => 2,
      ]);
      DB::table('parametrica_posiciones')->insert([
        'campo' => 'Unidad censal',
        'inicio' => 2967,
        'longitud' => 4,
      ]);
      DB::table('parametrica_posiciones')->insert([
        'campo' => 'Latitud C',
        'inicio' => 2971,
        'longitud' => 13,
      ]);
      DB::table('parametrica_posiciones')->insert([
        'campo' => 'Longitud C',
        'inicio' => 2984,
        'longitud' => 13,
      ]);
      DB::table('parametrica_posiciones')->insert([
        'campo' => 'Apellido encuestador',
        'inicio' => 2997,
        'longitud' => 80,
      ]);
      DB::table('parametrica_posiciones')->insert([
        'campo' => 'Id del dispositivo',
        'inicio' => 3077,
        'longitud' => 30,
      ]);

    }
}
