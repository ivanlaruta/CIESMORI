<?php

use Illuminate\Database\Seeder;

class ParametricaDisponibilidadTiempoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('parametrica')->insert([
        'tabla' => 'disponibilidad_tiempo',
        'codigo' => '1',
        'valor_cadena' => 'Parcial',
      ]);
      DB::table('parametrica')->insert([
        'tabla' => 'disponibilidad_tiempo',
        'codigo' => '2',
        'valor_cadena' => 'Total',
      ]);
    }
}
