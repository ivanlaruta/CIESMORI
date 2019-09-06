<?php

use Illuminate\Database\Seeder;

class DepartamentoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('departamento')->insert([
        'id' => '1',
        'nombre' => 'SUCRE',
        'nombre_corto' => 'CH',
      ]);
      DB::table('departamento')->insert([
        'id' => '2',
        'nombre' => 'LA PAZ',
        'nombre_corto' => 'LP',
      ]);
      DB::table('departamento')->insert([
        'id' => '3',
        'nombre' => 'COCHABAMBA',
        'nombre_corto' => 'CB',
      ]);
      DB::table('departamento')->insert([
        'id' => '4',
        'nombre' => 'ORURO',
        'nombre_corto' => 'OR',
      ]);
      DB::table('departamento')->insert([
        'id' => '5',
        'nombre' => 'POTOSI',
        'nombre_corto' => 'PT',
      ]);
      DB::table('departamento')->insert([
        'id' => '6',
        'nombre' => 'TARIJA',
        'nombre_corto' => 'TJ',
      ]);
      DB::table('departamento')->insert([
        'id' => '7',
        'nombre' => 'SANTA CRUZ',
        'nombre_corto' => 'SC',
      ]);
      DB::table('departamento')->insert([
        'id' => '8',
        'nombre' => 'TRINIDAD',
        'nombre_corto' => 'BN',
      ]);
      DB::table('departamento')->insert([
        'id' => '9',
        'nombre' => 'COBIJA',
        'nombre_corto' => 'PN',
      ]);
    }
}
