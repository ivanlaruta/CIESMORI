<?php

use Illuminate\Database\Seeder;

class ParametricaCargoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('parametrica')->insert([
            'tabla' => 'cargo',
            'codigo' => '1',
            'valor_cadena' => 'ENCUESTADOR',
            ]);
        DB::table('parametrica')->insert([
            'tabla' => 'cargo',
            'codigo' => '2',
            'valor_cadena' => 'AUDITOR',
            ]);
        DB::table('parametrica')->insert([
            'tabla' => 'cargo',
            'codigo' => '3',
            'valor_cadena' => 'RECLUTADOR',
            ]);
        DB::table('parametrica')->insert([
            'tabla' => 'cargo',
            'codigo' => '4',
            'valor_cadena' => 'SUPERVISOR',
            ]);
        DB::table('parametrica')->insert([
            'tabla' => 'cargo',
            'codigo' => '5',
            'valor_cadena' => 'ENTREVISTADOR',
            ]);
        DB::table('parametrica')->insert([
            'tabla' => 'cargo',
            'codigo' => '6',
            'valor_cadena' => 'COLABORADOR',
            ]);
        DB::table('parametrica')->insert([
            'tabla' => 'cargo',
            'codigo' => '7',
            'valor_cadena' => 'JEFE DE CAMPO',
            ]);
        DB::table('parametrica')->insert([
            'tabla' => 'cargo',
            'codigo' => '8',
            'valor_cadena' => 'EMPADRONADOR',
            ]);
        DB::table('parametrica')->insert([
            'tabla' => 'cargo',
            'codigo' => '9',
            'valor_cadena' => 'TRANSCRIPTOR',
            ]);
        DB::table('parametrica')->insert([
            'tabla' => 'cargo',
            'codigo' => '10',
            'valor_cadena' => 'CODIFICADOR',
            ]);
        DB::table('parametrica')->insert([
            'tabla' => 'cargo',
            'codigo' => '11',
            'valor_cadena' => 'EDITOR',
            ]);
        DB::table('parametrica')->insert([
            'tabla' => 'cargo',
            'codigo' => '12',
            'valor_cadena' => 'REVISOR',
            ]);
        DB::table('parametrica')->insert([
            'tabla' => 'cargo',
            'codigo' => '13',
            'valor_cadena' => 'INVESTIGADOR',
            ]);
        DB::table('parametrica')->insert([
            'tabla' => 'cargo',
            'codigo' => '14',
            'valor_cadena' => 'PROGRAMADOR',
            ]);
	}
}
