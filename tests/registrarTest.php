<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class registrarTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testRegister()
    {
        $this->visit('/register')
            ->type('test', 'name')
            ->type('test@test.com', 'email')
            ->type('asdasd123', 'password')
            ->type('asdasd123', 'password_confirmation')
            ->press('Registrarse')
            ->seePageIs('/panelDeUsuario');
    }
}
