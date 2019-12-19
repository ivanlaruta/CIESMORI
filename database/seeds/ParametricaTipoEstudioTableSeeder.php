<?php

use Illuminate\Database\Seeder;

class ParametricaTipoEstudioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          DB::table('parametrica')->insert([
            'tabla' => 'tipo_estudio',
            'codigo' => '1',
            'valor_cadena' => 'PDVs.',
          ]);
          DB::table('parametrica')->insert([
            'tabla' => 'tipo_estudio',
            'codigo' => '2',
            'valor_cadena' => 'Hogares',
          ]);
          DB::table('parametrica')->insert([
            'tabla' => 'tipo_estudio',
            'codigo' => '3',
            'valor_cadena' => 'Casi',
          ]);
          DB::table('parametrica')->insert([
            'tabla' => 'tipo_estudio',
            'codigo' => '4',
            'valor_cadena' => 'Punto de Encuentros',
          ]);

          DB::table('parametrica')->insert([
            'tabla' => 'tipo_estudio',
            'codigo' => '5',
            'valor_cadena' => 'Audiencias, evolución y tendencias',
          ]);
          DB::table('parametrica')->insert([
            'tabla' => 'tipo_estudio',
            'codigo' => '6',
            'valor_cadena' => 'Auditorias Industriales de mercado en punto de venta',
          ]);
          DB::table('parametrica')->insert([
            'tabla' => 'tipo_estudio',
            'codigo' => '7',
            'valor_cadena' => 'Auditorias de calidad de servicio / Mystery Shopper',
          ]);
          DB::table('parametrica')->insert([
            'tabla' => 'tipo_estudio',
            'codigo' => '8',
            'valor_cadena' => 'Auditorias de mercado en Punto de Venta',
          ]);
          DB::table('parametrica')->insert([
            'tabla' => 'tipo_estudio',
            'codigo' => '9',
            'valor_cadena' => 'Brand Equity Tracking',
          ]);
          DB::table('parametrica')->insert([
            'tabla' => 'tipo_estudio',
            'codigo' => '10',
            'valor_cadena' => 'Censos dirigidos Geo Localizados',
          ]);
          DB::table('parametrica')->insert([
            'tabla' => 'tipo_estudio',
            'codigo' => '11',
            'valor_cadena' => 'Clima Laboral',
          ]);
          DB::table('parametrica')->insert([
            'tabla' => 'tipo_estudio',
            'codigo' => '12',
            'valor_cadena' => 'Diagnostico General del mercado',
          ]);

          DB::table('parametrica')->insert([
            'tabla' => 'tipo_estudio',
            'codigo' => '13',
            'valor_cadena' => 'Encuesta linea de base para campaña electoral',
          ]);
          DB::table('parametrica')->insert([
            'tabla' => 'tipo_estudio',
            'codigo' => '14',
            'valor_cadena' => 'Encuestas Asistidas por Tablets-Pc',
          ]);
          DB::table('parametrica')->insert([
            'tabla' => 'tipo_estudio',
            'codigo' => '15',
            'valor_cadena' => 'Encuestas Pre electorales - Pronósticos electorales',
          ]);
          DB::table('parametrica')->insert([
            'tabla' => 'tipo_estudio',
            'codigo' => '16',
            'valor_cadena' => 'Estudios Adhoc de desarrollo local, social, sectorial o grupos etarios',
          ]);

          DB::table('parametrica')->insert([
            'tabla' => 'tipo_estudio',
            'codigo' => '17',
            'valor_cadena' => 'Encuesta linea de base para campaña electoral',
          ]);
          DB::table('parametrica')->insert([
            'tabla' => 'tipo_estudio',
            'codigo' => '18',
            'valor_cadena' => 'Estudios de Opinión Pública: Gestión gubernamental, de autoridades, entidades públicas',
          ]);
          DB::table('parametrica')->insert([
            'tabla' => 'tipo_estudio',
            'codigo' => '19',
            'valor_cadena' => 'Factibilidad de medios y/o programas',
          ]);
          DB::table('parametrica')->insert([
            'tabla' => 'tipo_estudio',
            'codigo' => '20',
            'valor_cadena' => 'Hábitos, Actitudes, Motivaciones de compra y Consumo',
          ]);
          DB::table('parametrica')->insert([
            'tabla' => 'tipo_estudio',
            'codigo' => '21',
            'valor_cadena' => 'Imagen Corporativa',
          ]);
          DB::table('parametrica')->insert([
            'tabla' => 'tipo_estudio',
            'codigo' => '22',
            'valor_cadena' => 'Imagen y posicionamiento',
          ]);
          DB::table('parametrica')->insert([
            'tabla' => 'tipo_estudio',
            'codigo' => '23',
            'valor_cadena' => 'Medición de audiencia de TV (Rating)',
          ]);
          DB::table('parametrica')->insert([
            'tabla' => 'tipo_estudio',
            'codigo' => '24',
            'valor_cadena' => 'Monitor de Opinión Pública (Encuesta Permanente en Hogares) - Vagon',
          ]);
          DB::table('parametrica')->insert([
            'tabla' => 'tipo_estudio',
            'codigo' => '25',
            'valor_cadena' => 'Proyectos Internos',
          ]);
          DB::table('parametrica')->insert([
            'tabla' => 'tipo_estudio',
            'codigo' => '26',
            'valor_cadena' => 'Satisfacción Clientes',
          ]);
          DB::table('parametrica')->insert([
            'tabla' => 'tipo_estudio',
            'codigo' => '27',
            'valor_cadena' => 'Segmentación y Perfiles de Consumidores/ Clusters',
          ]);
          DB::table('parametrica')->insert([
            'tabla' => 'tipo_estudio',
            'codigo' => '28',
            'valor_cadena' => 'Test o evaluación de concepto, productos (servicios) y empaque (etiqueta)',
          ]);
          DB::table('parametrica')->insert([
            'tabla' => 'tipo_estudio',
            'codigo' => '29',
            'valor_cadena' => 'Test o evaluación de publicidad o promociones',
          ]);
          DB::table('parametrica')->insert([
            'tabla' => 'tipo_estudio',
            'codigo' => '30',
            'valor_cadena' => 'Tracking de intención de voto y temas de campaña',
          ]);

    }
}
