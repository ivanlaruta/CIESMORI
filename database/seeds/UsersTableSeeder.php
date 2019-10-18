<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        DB::table('users')->insert([
            'user' => '8264209',

            'rol_id' => 5,
            'nombre' => 'IVAN',
            'apellido' => 'LARUTA',
            'departamento_id' => 2,
            'password' => bcrypt('12345'),
            ]);

        DB::table('users')->insert([
            'user' => '4865345',

            'rol_id' => 5,
             'nombre' => 'NATHALY',
            'apellido' => 'ALFARO',
            'departamento_id' => 2,
            'password' => bcrypt('12345'),
            ]);

        DB::table('users')->insert([
            'user' => '6103364',

            'rol_id' => 5,
            'nombre' => 'JAVIER',
            'apellido' => 'CHAVEZ',
            'departamento_id' => 2,
            'password' => bcrypt('12345'),
            ]);

        DB::table('users')->insert([
            'user' => '3347247',
            'rol_id' => 5,
            'nombre' => 'WALTER',
            'apellido' => 'PARADA', 
            'departamento_id' => 2,
            'password' => bcrypt('12345'),
            ]);


    }
}
