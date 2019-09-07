<?php

use Illuminate\Database\Seeder;

class imagenTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('imagen')->delete();

        DB::table('imagen')->insert([
            'archivo' => 'default.jpg',
            'carpeta' => 'personas',
            
            ]);
    }
}
