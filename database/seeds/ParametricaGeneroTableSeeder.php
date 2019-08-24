<?php

use Illuminate\Database\Seeder;

class ParametricaGeneroTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('parametrica')->delete();

        DB::table('parametrica')->insert([
            'tabla' => 'genero',
            'codigo' => '1',
            'valor_cadena' => 'Masculino',
            ]);
        DB::table('parametrica')->insert([
            'tabla' => 'genero',
            'codigo' => '2',
            'valor_cadena' => 'Femenino',
            ]);
        
    }
}
