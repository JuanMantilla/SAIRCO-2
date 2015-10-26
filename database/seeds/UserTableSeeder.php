<?php

use Illuminate\Database\Seeder;


class UserTableSeeder extends Seeder
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
            'email'=> 'epuerta@unitecnologica.edu.co',
            'role'=> 'admin',
            'password' => bcrypt('admin')
        ]);
        DB::table('users')->insert([
            'name' => 'Juan Martinez',
            'email'=> 'jcmartinezs@unitecnologica.edu.co',
            'role'=> 'admin',
            'password' => bcrypt('admin')
        ]);
    }
}
