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
        $this->call(ParametricaCiudadTableSeeder::class);
        $this->call(ParametricaDisponibilidadTiempoTableSeeder::class);
    	$this->call(ParametricaEstadoCivTableSeeder::class);
        $this->call(ParametricaExpedidoTableSeeder::class);
        $this->call(ParametricaHorarioDisponibleTableSeeder::class);
        $this->call(ParametricaNivelEduTableSeeder::class);
        $this->call(ParametricaTipoEstudioTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
    }
}
