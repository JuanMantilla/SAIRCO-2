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

        factory(App\User::class)->create([
            'name' => 'Juan Mantilla',
            'email'=> 't00024526@utbvirtual.edu.co',
            'role'=> 'admin',
            'password' => bcrypt('admin')

        ]);
    }
}
