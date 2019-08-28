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
        'valor_cadena_corto' => 'CH',
      ]);
      DB::table('parametrica')->insert([
        'tabla' => 'expedido',
        'codigo' => '2',
        'valor_cadena' => 'LA PAZ',
        'valor_cadena_corto' => 'LP',
      ]);
      DB::table('parametrica')->insert([
        'tabla' => 'expedido',
        'codigo' => '3',
        'valor_cadena' => 'COCHABAMBA',
        'valor_cadena_corto' => 'CB',
      ]);
      DB::table('parametrica')->insert([
        'tabla' => 'expedido',
        'codigo' => '4',
        'valor_cadena' => 'ORURO',
        'valor_cadena_corto' => 'OR',
      ]);
      DB::table('parametrica')->insert([
        'tabla' => 'expedido',
        'codigo' => '5',
        'valor_cadena' => 'POTOSI',
        'valor_cadena_corto' => 'PT',
      ]);
      DB::table('parametrica')->insert([
        'tabla' => 'expedido',
        'codigo' => '6',
        'valor_cadena' => 'TARIJA',
        'valor_cadena_corto' => 'TJ',
      ]);
      DB::table('parametrica')->insert([
        'tabla' => 'expedido',
        'codigo' => '7',
        'valor_cadena' => 'SANTA CRUZ',
        'valor_cadena_corto' => 'SC',
      ]);
      DB::table('parametrica')->insert([
        'tabla' => 'expedido',
        'codigo' => '8',
        'valor_cadena' => 'TRINIDAD',
        'valor_cadena_corto' => 'BN',
      ]);
      DB::table('parametrica')->insert([
        'tabla' => 'expedido',
        'codigo' => '9',
        'valor_cadena' => 'COBIJA',
        'valor_cadena_corto' => 'PN',
      ]);
    }
}
