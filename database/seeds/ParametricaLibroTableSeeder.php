<?php

use Illuminate\Database\Seeder;

class ParametricaLibroTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('parametrica')->insert([
        'tabla' => 'libro_datos',
        'codigo' => 'rango',
      ]);
        DB::table('parametrica')->insert([
        'tabla' => 'libro_datos',
        'codigo' => 'genero',
      ]);
        DB::table('parametrica')->insert([
        'tabla' => 'libro_datos',
        'codigo' => 'nse',
      ]);
        DB::table('parametrica')->insert([
        'tabla' => 'libro_datos',
        'codigo' => 'supervision',
      ]);
        DB::table('parametrica')->insert([
        'tabla' => 'libro_datos',
        'codigo' => 'tipo_sup',
      ]);
        DB::table('parametrica')->insert([
        'tabla' => 'libro_datos',
        'codigo' => 'resultado',
      ]);
    }
}
