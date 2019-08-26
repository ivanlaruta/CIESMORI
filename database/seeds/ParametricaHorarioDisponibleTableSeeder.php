<?php

use Illuminate\Database\Seeder;

class ParametricaHorarioDisponibleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('parametrica')->insert([
        'tabla' => 'horario_disponible',
        'codigo' => '1',
        'valor_cadena' => 'Mañana',
      ]);
      DB::table('parametrica')->insert([
        'tabla' => 'horario_disponible',
        'codigo' => '2',
        'valor_cadena' => 'Tarde',
      ]);
      DB::table('parametrica')->insert([
        'tabla' => 'horario_disponible',
        'codigo' => '3',
        'valor_cadena' => 'Noche',
      ]);
    }
}
