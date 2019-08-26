<?php

use Illuminate\Database\Seeder;

class ParametricaExpedidoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('parametrica')->insert([
        'tabla' => 'expedido',
        'codigo' => '1',
        'valor_cadena' => 'SUCRE',
      ]);
      DB::table('parametrica')->insert([
        'tabla' => 'expedido',
        'codigo' => '2',
        'valor_cadena' => 'LA PAZ',
      ]);
      DB::table('parametrica')->insert([
        'tabla' => 'expedido',
        'codigo' => '3',
        'valor_cadena' => 'COCHABAMBA',
      ]);
      DB::table('parametrica')->insert([
        'tabla' => 'expedido',
        'codigo' => '4',
        'valor_cadena' => 'ORURO',
      ]);
      DB::table('parametrica')->insert([
        'tabla' => 'expedido',
        'codigo' => '5',
        'valor_cadena' => 'POTOSI',
      ]);
      DB::table('parametrica')->insert([
        'tabla' => 'expedido',
        'codigo' => '6',
        'valor_cadena' => 'TARIJA',
      ]);
      DB::table('parametrica')->insert([
        'tabla' => 'expedido',
        'codigo' => '7',
        'valor_cadena' => 'SANTA CRUZ',
      ]);
      DB::table('parametrica')->insert([
        'tabla' => 'expedido',
        'codigo' => '8',
        'valor_cadena' => 'TRINIDAD',
      ]);
      DB::table('parametrica')->insert([
        'tabla' => 'expedido',
        'codigo' => '9',
        'valor_cadena' => 'COBIJA',
      ]);
    }
}
