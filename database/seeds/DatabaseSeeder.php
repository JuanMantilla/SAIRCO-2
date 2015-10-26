<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Juan Mantilla',
            'email'=> 't00024526@utbvirtual.edu.co',
            'role'=> 'admin',
            'password' => bcrypt('admin')
        ]);
        DB::table('users')->insert([
            'name' => 'Edwin Puertas',
            'email'=> 'eapuerta@unitecnologica.edu.co',
            'role'=> 'admin',
            'password' => bcrypt('admin')
        ]);
        DB::table('users')->insert([
            'name' => 'Juan Martinez',
            'email'=> 'jcmartinezs@unitecnologica.edu.co',
            'role'=> 'admin',
            'password' => bcrypt('admin')
        ]);
        DB::table('controladorEquipos')->insert([
            'Agregar' => 0,
            'horario' => 0,
            'equipo_horario' =>0
        ]);
        /*Model::unguard();

        //$this->call(UserTableSeeder::class);
        //$this->call(HorarioTableSeeder::class);

        Model::reguard();*/
    }
}

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        factory(App\User::class)->create([
            'name' => 'Juan Mantilla',
            'email'=> 't00024526@utbvirtual.edu.co',
            'role'=> 'admin',
            'password' => bcrypt('admin')

        ]);
    }
}