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
            'password' => bcrypt('12345'),
            ]);

        DB::table('users')->insert([
            'user' => '4865345',
            'password' => bcrypt('12345'),
            ]);

        DB::table('users')->insert([
            'user' => '6103364',
            'password' => bcrypt('12345'),
            ]);

        DB::table('users')->insert([
            'user' => '12345678',
            'password' => bcrypt('12345'),
            ]);
    }
}
