<?php

use Illuminate\Database\Seeder;

class ParametricaCswebSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('parametrica')->insert([
        'tabla' => 'RANGO_VS1',
        'codigo' => '1',
        'valor_cadena' => 'De 18 a 25 años',
      ]);
      DB::table('parametrica')->insert([
        'tabla' => 'RANGO_VS1',
        'codigo' => '2',
        'valor_cadena' => 'De 26 a 35 años',
      ]);
      DB::table('parametrica')->insert([
        'tabla' => 'RANGO_VS1',
        'codigo' => '3',
        'valor_cadena' => 'De 36 a 45 años',
      ]);
      DB::table('parametrica')->insert([
        'tabla' => 'RANGO_VS1',
        'codigo' => '4',
        'valor_cadena' => '46 años y más',
      ]);
      DB::table('parametrica')->insert([
        'tabla' => 'NSE_VS1',
        'codigo' => '1',
        'valor_cadena' => 'ABC',
      ]);
      DB::table('parametrica')->insert([
        'tabla' => 'NSE_VS1',
        'codigo' => '2',
        'valor_cadena' => 'C2',
      ]);
      DB::table('parametrica')->insert([
        'tabla' => 'NSE_VS1',
        'codigo' => '3',
        'valor_cadena' => 'C3',
      ]);
      DB::table('parametrica')->insert([
        'tabla' => 'NSE_VS1',
        'codigo' => '4',
        'valor_cadena' => 'D',
      ]);
      DB::table('parametrica')->insert([
        'tabla' => 'NSE_VS1',
        'codigo' => '5',
        'valor_cadena' => 'E',
      ]);
      DB::table('parametrica')->insert([
        'tabla' => 'SUPERVISION_VS1',
        'codigo' => '1',
        'valor_cadena' => 'SI',
      ]);

      DB::table('parametrica')->insert([
        'tabla' => 'SUPERVISION_VS1',
        'codigo' => '2',
        'valor_cadena' => 'NO',
      ]);
      DB::table('parametrica')->insert([
        'tabla' => 'TIPO_SUP_VS1',
        'codigo' => '1',
        'valor_cadena' => 'In situ',
      ]);
      DB::table('parametrica')->insert([
        'tabla' => 'TIPO_SUP_VS1',
        'codigo' => '2',
        'valor_cadena' => 'Post encuesta (en personas)',
      ]);
      DB::table('parametrica')->insert([
        'tabla' => 'TIPO_SUP_VS1',
        'codigo' => '3',
        'valor_cadena' => 'Audio',
      ]);
      DB::table('parametrica')->insert([
        'tabla' => 'TIPO_SUP_VS1',
        'codigo' => '4',
        'valor_cadena' => 'Post encuesta (por teléfono)',
      ]);
      DB::table('parametrica')->insert([
        'tabla' => 'RESULTADO_VS1',
        'codigo' => '1',
        'valor_cadena' => 'Éxito',
      ]);
      DB::table('parametrica')->insert([
        'tabla' => 'RESULTADO_VS1',
        'codigo' => '2',
        'valor_cadena' => 'Rechazo',
      ]);
      DB::table('parametrica')->insert([
        'tabla' => 'RESULTADO_VS1',
        'codigo' => '3',
        'valor_cadena' => 'Boleta incompleta',
      ]);
      DB::table('parametrica')->insert([
        'tabla' => 'RESULTADO_VS1',
        'codigo' => '4',
        'valor_cadena' => 'No está la persona responsable',
      ]);
      DB::table('parametrica')->insert([
        'tabla' => 'RESULTADO_VS1',
        'codigo' => '5',
        'valor_cadena' => 'No cumple filtro',
      ]);

    }
}
