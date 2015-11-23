<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class panelDeUsuarioTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testPanelDeUsuario()
    {
        $user = factory(App\User::class)->create([
            'name' => 'Testing',
            'email'=> 'testing@testing.co',
            'role'=> 'user',
            'password' =>'user123'
        ]);

        $this->actingAs($user)
            ->withSession([$user->email => $user->password])
            ->visit('/panelDeUsuario')
            ->see($user->name)
            ->see('Reservar un equipo:');
        $this->actingAs($user)
            ->withSession([$user->email => $user->password])
            ->visit('/reservarEquipo')
            ->type('2015-01-01 13:00', 'fecha')
            ->check('procesador')
            ->check('software1')
            ->press('Enviar')
            ->see('Reserva satisfactoria');
        $this->actingAs($user)
            ->withSession([$user->email => $user->password])
            ->visit('/verReservas')
            ->see('Mis reservas:');
    }
}