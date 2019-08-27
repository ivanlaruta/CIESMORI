<?php

use Illuminate\Database\Seeder;

class EmpleadoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('empleado')->delete();
        
        DB::table('empleado')->insert([
			'persona_id' => 1,
			'cargo' => 'Desarrollador',
			'cod_tipo_estudio' => '7',
			'cod_disponibilidad_tiempo' => '1',
			'cod_horario_disponible' => '1',
			'horas_que_puede_trabajar' => 5,
			'experiencia' => 3,
        ]);  

        DB::table('empleado')->insert([
			'persona_id' => 2,
			'cargo' => 'Desarrollador',
			'cod_tipo_estudio' => '7',
			'cod_disponibilidad_tiempo' => '1',
			'cod_horario_disponible' => '1',
			'horas_que_puede_trabajar' => 5,
			'experiencia' => 3,
        ]);  

        DB::table('empleado')->insert([
			'persona_id' => 3,
			'cargo' => 'Desarrollador',
			'cod_tipo_estudio' => '7',
			'cod_disponibilidad_tiempo' => '1',
			'cod_horario_disponible' => '1',
			'horas_que_puede_trabajar' => 5,
			'experiencia' => 3,
        ]);  
    }
}
