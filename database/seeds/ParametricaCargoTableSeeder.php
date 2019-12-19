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

        DB::table('parametrica')->insert([
            'tabla' => 'cargo',
            'codigo' => '15',
            'valor_cadena' => 'AUDITORIAS EN PUNTO DE VENTA',
            ]);
        DB::table('parametrica')->insert([
            'tabla' => 'cargo',
            'codigo' => '16',
            'valor_cadena' => 'EN HOGARES',
            ]);
        DB::table('parametrica')->insert([
            'tabla' => 'cargo',
            'codigo' => '17',
            'valor_cadena' => 'EN PUNTOS DE INTERCEPTACIÓN',
            ]);
        DB::table('parametrica')->insert([
            'tabla' => 'cargo',
            'codigo' => '18',
            'valor_cadena' => 'LOCACION CENTRAL',
            ]);
        DB::table('parametrica')->insert([
            'tabla' => 'cargo',
            'codigo' => '19',
            'valor_cadena' => 'GRUPOS FOCALES',
            ]);
        DB::table('parametrica')->insert([
            'tabla' => 'cargo',
            'codigo' => '20',
            'valor_cadena' => 'CENSOS',
            ]);
        DB::table('parametrica')->insert([
            'tabla' => 'cargo',
            'codigo' => '21',
            'valor_cadena' => 'ENTREVISTAS EN PROFUNDIDAD',
            ]);
        DB::table('parametrica')->insert([
            'tabla' => 'cargo',
            'codigo' => '22',
            'valor_cadena' => 'ENTREVISTAS ETNOGRAFICAS',
            ]);
        DB::table('parametrica')->insert([
            'tabla' => 'cargo',
            'codigo' => '23',
            'valor_cadena' => 'SOCIO - ECONOMICAS',
            ]);
        DB::table('parametrica')->insert([
            'tabla' => 'cargo',
            'codigo' => '24',
            'valor_cadena' => 'OPINION PUBLICA',
            ]);
        DB::table('parametrica')->insert([
            'tabla' => 'cargo',
            'codigo' => '25',
            'valor_cadena' => 'CALL CENTER',
            ]);
        DB::table('parametrica')->insert([
            'tabla' => 'cargo',
            'codigo' => '26',
            'valor_cadena' => 'PRUEBAS DE PRODUCTO',
            ]);
        DB::table('parametrica')->insert([
            'tabla' => 'cargo',
            'codigo' => '27',
            'valor_cadena' => 'OTRAS',
            ]);
	}
}
