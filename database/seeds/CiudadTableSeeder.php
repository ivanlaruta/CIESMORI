<?php

use Illuminate\Database\Seeder;

class CiudadTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ciudad')->insert([
          'departamento_id' => '1',
          'codigo' => '1',
          'nombre' => 'SUCRE',
        ]);
        DB::table('ciudad')->insert([
          'departamento_id' => '2',
          'codigo' => '2',
          'nombre' => 'LA PAZ',
        ]);
        DB::table('ciudad')->insert([
          'departamento_id' => '3',
          'codigo' => '3',
          'nombre' => 'COCHABAMBA',
        ]);
        DB::table('ciudad')->insert([
          'departamento_id' => '4',
          'codigo' => '4',
          'nombre' => 'ORURO',
        ]);
        DB::table('ciudad')->insert([
          'departamento_id' => '5',
          'codigo' => '5',
          'nombre' => 'POTOSI',
        ]);
        DB::table('ciudad')->insert([
          'departamento_id' => '6',
          'codigo' => '6',
          'nombre' => 'TARIJA',
        ]);
        DB::table('ciudad')->insert([
          'departamento_id' => '7',
          'codigo' => '7',
          'nombre' => 'SANTA CRUZ',
        ]);
        DB::table('ciudad')->insert([
          'departamento_id' => '8',
          'codigo' => '8',
          'nombre' => 'TRINIDAD',
        ]);
        DB::table('ciudad')->insert([
          'departamento_id' => '9',
          'codigo' => '9',
          'nombre' => 'COBIJA',
        ]);
        DB::table('ciudad')->insert([
          'departamento_id' => '2',
          'codigo' => '21',
          'nombre' => 'EL ALTO',
        ]);
        DB::table('ciudad')->insert([
          'departamento_id' => '2',
          'codigo' => '23',
          'nombre' => 'VIACHA',
        ]);
        DB::table('ciudad')->insert([
          'departamento_id' => '2',
          'codigo' => '24',
          'nombre' => 'CARANAVI',
        ]);
        DB::table('ciudad')->insert([
          'departamento_id' => '2',
          'codigo' => '25',
          'nombre' => 'PATACAMAYA',
        ]);
        DB::table('ciudad')->insert([
          'departamento_id' => '3',
          'codigo' => '31',
          'nombre' => 'QUILLACOLLO',
        ]);
        DB::table('ciudad')->insert([
          'departamento_id' => '3',
          'codigo' => '32',
          'nombre' => 'SIPE SIPE',
        ]);
        DB::table('ciudad')->insert([
          'departamento_id' => '3',
          'codigo' => '33',
          'nombre' => 'SACABA',
        ]);
        DB::table('ciudad')->insert([
          'departamento_id' => '3',
          'codigo' => '34',
          'nombre' => 'PUNATA',
        ]);
        DB::table('ciudad')->insert([
          'departamento_id' => '4',
          'codigo' => '41',
          'nombre' => 'CHALLAPATA',
        ]);

        DB::table('ciudad')->insert([
          'departamento_id' => '5',
          'codigo' => '51',
          'nombre' => 'VILLAZON',
        ]);
        DB::table('ciudad')->insert([
          'departamento_id' => '6',
          'codigo' => '61',
          'nombre' => 'YACUIBA',
        ]);
        DB::table('ciudad')->insert([
          'departamento_id' => '6',
          'codigo' => '62',
          'nombre' => 'VILLAMONTES',
        ]);
        DB::table('ciudad')->insert([
          'departamento_id' => '6',
          'codigo' => '63',
          'nombre' => 'BERMEJO',
        ]);
        DB::table('ciudad')->insert([
          'departamento_id' => '7',
          'codigo' => '72',
          'nombre' => 'MONTERO',
        ]);
        DB::table('ciudad')->insert([
          'departamento_id' => '7',
          'codigo' => '73',
          'nombre' => 'YAPACANI',
        ]);
        DB::table('ciudad')->insert([
          'departamento_id' => '7',
          'codigo' => '74',
          'nombre' => 'LA GUARDIA',
        ]);
        DB::table('ciudad')->insert([
          'departamento_id' => '7',
          'codigo' => '75',
          'nombre' => 'ROBORE',
        ]);
        DB::table('ciudad')->insert([
          'departamento_id' => '7',
          'codigo' => '76',
          'nombre' => 'SAN IGNACIO DE VELASCO',
        ]);
        DB::table('ciudad')->insert([
          'departamento_id' => '8',
          'codigo' => '81',
          'nombre' => 'GUAYARAMERIN',
        ]);
        DB::table('ciudad')->insert([
          'departamento_id' => '8',
          'codigo' => '82',
          'nombre' => 'RIBERALTA',
        ]);
        DB::table('ciudad')->insert([
          'departamento_id' => '8',
          'codigo' => '83',
          'nombre' => 'RURRENABAQUE',
        ]);






    }
}
