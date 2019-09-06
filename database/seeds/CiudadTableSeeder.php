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
          'id' => '1',
          'departamento_id' => '1',
          'nombre' => 'SUCRE',
        ]);
        DB::table('ciudad')->insert([
          'id' => '2',
          'departamento_id' => '2',
          'nombre' => 'LA PAZ',
        ]);
        DB::table('ciudad')->insert([
          'id' => '3',
          'departamento_id' => '3',
          'nombre' => 'COCHABAMBA',
        ]);
        DB::table('ciudad')->insert([
          'id' => '4',
          'departamento_id' => '4',
          'nombre' => 'ORURO',
        ]);
        DB::table('ciudad')->insert([
          'id' => '5',
          'departamento_id' => '5',
          'nombre' => 'POTOSI',
        ]);
        DB::table('ciudad')->insert([
          'id' => '6',
          'departamento_id' => '6',
          'nombre' => 'TARIJA',
        ]);
        DB::table('ciudad')->insert([
          'id' => '7',
          'departamento_id' => '7',
          'nombre' => 'SANTA CRUZ',
        ]);
        DB::table('ciudad')->insert([
          'id' => '8',
          'departamento_id' => '8',
          'nombre' => 'TRINIDAD',
        ]);
        DB::table('ciudad')->insert([
          'id' => '9',
          'departamento_id' => '9',
          'nombre' => 'COBIJA',
        ]);
        DB::table('ciudad')->insert([
          'id' => '21',
          'departamento_id' => '2',
          'nombre' => 'EL ALTO',
        ]);
        DB::table('ciudad')->insert([
          'id' => '23',
          'departamento_id' => '2',
          'nombre' => 'VIACHA',
        ]);
        DB::table('ciudad')->insert([
          'id' => '24',
          'departamento_id' => '2',
          'nombre' => 'CARANAVI',
        ]);
        DB::table('ciudad')->insert([
          'id' => '25',
          'departamento_id' => '2',
          'nombre' => 'PATACAMAYA',
        ]);
        DB::table('ciudad')->insert([
          'id' => '31',
          'departamento_id' => '3',
          'nombre' => 'QUILLACOLLO',
        ]);
        DB::table('ciudad')->insert([
          'id' => '32',
          'departamento_id' => '3',
          'nombre' => 'SIPE SIPE',
        ]);
        DB::table('ciudad')->insert([
          'id' => '33',
          'departamento_id' => '3',
          'nombre' => 'SACABA',
        ]);
        DB::table('ciudad')->insert([
          'id' => '34',
          'departamento_id' => '3',
          'nombre' => 'PUNATA',
        ]);
        DB::table('ciudad')->insert([
          'id' => '41',
          'departamento_id' => '4',
          'nombre' => 'CHALLAPATA',
        ]);

        DB::table('ciudad')->insert([
          'id' => '51',
          'departamento_id' => '5',
          'nombre' => 'VILLAZON',
        ]);
        DB::table('ciudad')->insert([
          'id' => '61',
          'departamento_id' => '6',
          'nombre' => 'YACUIBA',
        ]);
        DB::table('ciudad')->insert([
          'id' => '62',
          'departamento_id' => '6',
          'nombre' => 'VILLAMONTES',
        ]);
        DB::table('ciudad')->insert([
          'id' => '63',
          'departamento_id' => '6',
          'nombre' => 'BERMEJO',
        ]);
        DB::table('ciudad')->insert([
          'id' => '72',
          'departamento_id' => '7',
          'nombre' => 'MONTERO',
        ]);
        DB::table('ciudad')->insert([
          'id' => '73',
          'departamento_id' => '7',
          'nombre' => 'YAPACANI',
        ]);
        DB::table('ciudad')->insert([
          'id' => '74',
          'departamento_id' => '7',
          'nombre' => 'LA GUARDIA',
        ]);
        DB::table('ciudad')->insert([
          'id' => '75',
          'departamento_id' => '7',
          'nombre' => 'ROBORE',
        ]);
        DB::table('ciudad')->insert([
          'id' => '76',
          'departamento_id' => '7',
          'nombre' => 'SAN IGNACIO DE VELASCO',
        ]);
        DB::table('ciudad')->insert([
          'id' => '81',
          'departamento_id' => '8',
          'nombre' => 'GUAYARAMERIN',
        ]);
        DB::table('ciudad')->insert([
          'id' => '82',
          'departamento_id' => '8',
          'nombre' => 'RIBERALTA',
        ]);
        DB::table('ciudad')->insert([
          'id' => '83',
          'departamento_id' => '8',
          'nombre' => 'RURRENABAQUE',
        ]);






    }
}
