<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
        'role' => $faker->randomElement(['user', 'admin'])
    ];
});

$factory->define(App\ControladorEquipos::class, function (Faker\Generator $faker) {
    return [
        'Agregar' => '0',
        'horario'=> '0',
        'equipoHorario'=> '0',
    ];
});

