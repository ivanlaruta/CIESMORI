<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('roles')->delete();

        DB::table('roles')->insert([
            'descripcion' => 'Gestor',
            ]);
        DB::table('roles')->insert([
            'descripcion' => 'Supervisor',
            ]);
        DB::table('roles')->insert([
            'descripcion' => 'Codificador',
            ]);
        DB::table('roles')->insert([
            'descripcion' => 'Cliente',
            ]);
        DB::table('roles')->insert([
            'descripcion' => 'ADMINISTRADOR',
            ]);
    }
}
