<?php

use Illuminate\Database\Seeder;

class ParametricaEstadoCivTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('parametrica')->insert([
            'tabla' => 'estado_civil',
            'codigo' => '1',
            'valor_cadena' => 'Soltero/a',
            ]);
        DB::table('parametrica')->insert([
            'tabla' => 'estado_civil',
            'codigo' => '2',
            'valor_cadena' => 'Casado/a',
            ]);
        DB::table('parametrica')->insert([
            'tabla' => 'estado_civil',
            'codigo' => '3',
            'valor_cadena' => 'Separado/a',
            ]);
        DB::table('parametrica')->insert([
            'tabla' => 'estado_civil',
            'codigo' => '4',
            'valor_cadena' => 'Conviviente o en concubinato',
            ]);
        DB::table('parametrica')->insert([
            'tabla' => 'estado_civil',
            'codigo' => '5',
            'valor_cadena' => 'Divoriado/a',
            ]);
        DB::table('parametrica')->insert([
            'tabla' => 'estado_civil',
            'codigo' => '6',
            'valor_cadena' => 'Viudo/a',
            ]);

    }
}
