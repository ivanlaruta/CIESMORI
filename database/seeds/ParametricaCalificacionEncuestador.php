<?php

use Illuminate\Database\Seeder;

class ParametricaCalificacionEncuestador extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('parametrica')->insert([
          'tabla' => 'CALIFICACION',
          'codigo' => '1',
          'valor_cadena' => 'Muy bueno',
          ]);
      DB::table('parametrica')->insert([
          'tabla' => 'CALIFICACION',
          'codigo' => '2',
          'valor_cadena' => 'Bueno',
          ]);
      DB::table('parametrica')->insert([
          'tabla' => 'CALIFICACION',
          'codigo' => '3',
          'valor_cadena' => 'Regular',
          ]);
      DB::table('parametrica')->insert([
          'tabla' => 'CALIFICACION',
          'codigo' => '4',
          'valor_cadena' => 'Malo',
          ]);
      DB::table('parametrica')->insert([
          'tabla' => 'CALIFICACION',
          'codigo' => '5',
          'valor_cadena' => 'Muy Malo',
          ]);

    }
}
