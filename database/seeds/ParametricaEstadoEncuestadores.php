<?php

use Illuminate\Database\Seeder;

class ParametricaEstadoEncuestadores extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('parametrica')->insert([
          'tabla' => 'ESTADO_ENCUESTADORES',
          'codigo' => '1',
          'valor_cadena' => 'ACTIVO',
          ]);
      DB::table('parametrica')->insert([
          'tabla' => 'ESTADO_ENCUESTADORES',
          'codigo' => '2',
          'valor_cadena' => 'INACTIVO',
          ]);
      DB::table('parametrica')->insert([
          'tabla' => 'ESTADO_ENCUESTADORES',
          'codigo' => '3',
          'valor_cadena' => 'NO PARTICIPA MAS DE 1 AÑO',
          ]);
      DB::table('parametrica')->insert([
          'tabla' => 'ESTADO_ENCUESTADORES',
          'codigo' => '4',
          'valor_cadena' => 'OBSERVADO',
          ]);
      DB::table('parametrica')->insert([
          'tabla' => 'ESTADO_ENCUESTADORES',
          'codigo' => '5',
          'valor_cadena' => 'SUSPENDIDO TEMPORAL',
          ]);
      DB::table('parametrica')->insert([
          'tabla' => 'ESTADO_ENCUESTADORES',
          'codigo' => '6',
          'valor_cadena' => 'SUSPENDIDO PERMANTE',
          ]);
      DB::table('parametrica')->insert([
          'tabla' => 'ESTADO_ENCUESTADORES',
          'codigo' => '7',
          'valor_cadena' => 'FRAUDULENTO',
          ]);
    }
}
