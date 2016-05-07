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
        Model::unguard();

        $this->call(UserTableSeeder::class);
        //$this->call(HorarioTableSeeder::class);

        Model::reguard();
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
        factory(App\User::class)->create([
            'name' => 'Juan Martinez',
            'email'=> 't00000245@utbvirtual.edu.co',
            'role'=> 'admin',
            'password' => bcrypt('admin')

        ]);
        factory(App\User::class)->create([
            'name' => 'Edwin Puerta',
            'email'=> 'eapuerta@gmail.com',
            'role'=> 'admin',
            'password' => bcrypt('admin')

        ]);

//        factory(App\ControladorEquipos::class)->create([
//            'Agregar' => '0',
//            'horario'=> '0',
//            'equipoHorario'=> '0',
//        ]);
    }
}