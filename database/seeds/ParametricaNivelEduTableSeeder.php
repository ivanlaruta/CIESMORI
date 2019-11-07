<?php

use Illuminate\Database\Seeder;

class ParametricaNivelEduTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('parametrica')->insert([
        'tabla' => 'nivel_educacion',
        'codigo' => '0',
        'valor_cadena' => 'Ninguna',
        'inicio' => '0',
        'fin' => '0',

      ]);
      DB::table('parametrica')->insert([
        'tabla' => 'nivel_educacion',
        'codigo' => '1',
        'valor_cadena' => 'Primaria incompleta (1 a 5 años de educación)',
        'inicio' => '1',
        'fin' => '5',
      ]);
      DB::table('parametrica')->insert([
        'tabla' => 'nivel_educacion',
        'codigo' => '2',
        'valor_cadena' => 'Primaria completa (6 años de educación)',
        'inicio' => '1',
        'fin' => '6',
      ]);
      DB::table('parametrica')->insert([
        'tabla' => 'nivel_educacion',
        'codigo' => '3',
        'valor_cadena' => 'Secundaria incompleta (7 a 11 años de educación)',
        'inicio' => '7',
        'fin' => '11',
      ]);
      DB::table('parametrica')->insert([
        'tabla' => 'nivel_educacion',
        'codigo' => '4',
        'valor_cadena' => 'Secundaria completa (12 años de educación)',
        'inicio' => '1',
        'fin' => '12',
      ]);
      DB::table('parametrica')->insert([
        'tabla' => 'nivel_educacion',
        'codigo' => '5',
        'valor_cadena' => 'Educación superior (más de 12 años de educación, Técnico, Universitario, Postgrado)',
        'inicio' => '12',
        'fin' => '15',
      ]);
      DB::table('parametrica')->insert([
        'tabla' => 'nivel_educacion',
        'codigo' => '6',
        'valor_cadena' => 'Técnico medio (Instituto, academias, etc.)',
        'inicio' => '1',
        'fin' => '3',
      ]);
      DB::table('parametrica')->insert([
        'tabla' => 'nivel_educacion',
        'codigo' => '7',
        'valor_cadena' => 'Técnico superior',
        'inicio' => '1',
        'fin' => '4',
      ]);
      DB::table('parametrica')->insert([
        'tabla' => 'nivel_educacion',
        'codigo' => '8',
        'valor_cadena' => 'Universidad o nivel similar incompleto (Normal, colegio mili',
        'inicio' => '1',
        'fin' => '5',
      ]);
      DB::table('parametrica')->insert([
        'tabla' => 'nivel_educacion',
        'codigo' => '9',
        'valor_cadena' => 'Universidad o nivel similar completo',
        'inicio' => '1',
        'fin' => '5',
      ]);

      DB::table('parametrica')->insert([
        'tabla' => 'nivel_educacion',
        'codigo' => '10',
        'valor_cadena' => 'Estudios de Post-grado',
        'inicio' => '1',
        'fin' => '2',
      ]);
      DB::table('parametrica')->insert([
        'tabla' => 'nivel_educacion',
        'codigo' => '94',
        'valor_cadena' => 'Otro',

      ]);

    }
}
