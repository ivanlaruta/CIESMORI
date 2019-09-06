<?php

use Illuminate\Database\Seeder;

class EncuestadorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('encuestador')->delete();

       //  DB::table('encuestador')->insert([
    			// 'persona_id' => 1,
    			// 'cargo' => 'Encuestador',
    			// 'cod_disponibilidad_tiempo' => '1',
    			// 'horas_que_puede_trabajar' => 5,
    			// 'experiencia' => 3,
       //  ]);

       //  DB::table('encuestador')->insert([
    			// 'persona_id' => 2,
    			// 'cargo' => 'Encuestador',
    			// 'cod_disponibilidad_tiempo' => '1',
    			// 'horas_que_puede_trabajar' => 5,
    			// 'experiencia' => 3,
       //  ]);

       //  DB::table('encuestador')->insert([
    			// 'persona_id' => 3,
    			// 'cargo' => 'Encuestador',
    			// 'cod_disponibilidad_tiempo' => '1',
    			// 'horas_que_puede_trabajar' => 5,
    			// 'experiencia' => 3,
       //  ]);
    }
}
