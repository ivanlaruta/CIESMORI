<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	$this->call(ParametricaGeneroTableSeeder::class);
        $this->call(CiudadTableSeeder::class);
        $this->call(ParametricaDisponibilidadTiempoTableSeeder::class);
    	$this->call(ParametricaEstadoCivTableSeeder::class);
        $this->call(ParametricaCargoTableSeeder::class);
        $this->call(DepartamentoTableSeeder::class);
        $this->call(ParametricaHorarioDisponibleTableSeeder::class);
        $this->call(ParametricaNivelEduTableSeeder::class);
        $this->call(ParametricaTipoEstudioTableSeeder::class);
        $this->call(ParametricaPosicionesSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(PersonaTableSeeder::class);
        $this->call(EncuestadorTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(imagenTableSeeder::class);

    }
}
