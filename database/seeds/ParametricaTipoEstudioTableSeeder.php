<?php

use Illuminate\Database\Seeder;

class ParametricaTipoEstudioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('parametrica')->insert([
        'tabla' => 'tipo_estudio',
        'codigo' => '1',
        'valor_cadena' => 'PDVs.',
      ]);
      DB::table('parametrica')->insert([
        'tabla' => 'tipo_estudio',
        'codigo' => '2',
        'valor_cadena' => 'Hogares',
      ]);
      DB::table('parametrica')->insert([
        'tabla' => 'tipo_estudio',
        'codigo' => '3',
        'valor_cadena' => 'Casi',
      ]);
      DB::table('parametrica')->insert([
        'tabla' => 'tipo_estudio',
        'codigo' => '4',
        'valor_cadena' => 'Punto de Encuentros',
      ]);
      DB::table('parametrica')->insert([
        'tabla' => 'tipo_estudio',
        'codigo' => '5',
        'valor_cadena' => 'Recludator',
      ]);
      DB::table('parametrica')->insert([
        'tabla' => 'tipo_estudio',
        'codigo' => '6',
        'valor_cadena' => 'Entrevistador',
      ]);
      DB::table('parametrica')->insert([
        'tabla' => 'tipo_estudio',
        'codigo' => '7',
        'valor_cadena' => 'Supervision',
      ]);
    }
}
