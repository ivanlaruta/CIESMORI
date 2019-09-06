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
            'persona_id' => 1,
            'rol_id' => 5,
            'password' => bcrypt('12345'),
            ]);

        DB::table('users')->insert([
            'user' => '4865345',
            'persona_id' => 2,
            'rol_id' => 5,
            'password' => bcrypt('12345'),
            ]);

        DB::table('users')->insert([
            'user' => '6103364',
            'persona_id' => 3,
            'rol_id' => 5,
            'password' => bcrypt('12345'),
            ]);

   
    }
}
