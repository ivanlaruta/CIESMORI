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
            'descripcion' => 'GESTOR',
            ]);
        DB::table('roles')->insert([
            'descripcion' => 'SUPERVISOR',
            ]);
        DB::table('roles')->insert([
            'descripcion' => 'CODIFICADOR',
            ]);
        DB::table('roles')->insert([
            'descripcion' => 'CLIENTE',
            ]);
        DB::table('roles')->insert([
            'descripcion' => 'ADMINISTRADOR',
            ]);  
        DB::table('roles')->insert([
            'descripcion' => 'GERENTE',
            ]);
        DB::table('roles')->insert([
            'descripcion' => 'EDITOR/CODIFICADOR',
            ]);
        DB::table('roles')->insert([
            'descripcion' => 'PROGRAMADOR',
            ]);
        DB::table('roles')->insert([
            'descripcion' => 'GESTOR OPERACIONES',
            ]);
        DB::table('roles')->insert([
            'descripcion' => 'GESTOR PROYECTO',
            ]);
        DB::table('roles')->insert([
            'descripcion' => 'ADM. PERSONAL',
            ]);
        DB::table('roles')->insert([
            'descripcion' => 'ADM. BD',
            ]);
        DB::table('roles')->insert([
            'descripcion' => 'USUARIO 1',
            ]);
        DB::table('roles')->insert([
            'descripcion' => 'USUARIO 2',
            ]);
        DB::table('roles')->insert([
            'descripcion' => 'USUARIO 3',
            ]);
        DB::table('roles')->insert([
            'descripcion' => 'USUARIO 4',
            ]);
    }
}
