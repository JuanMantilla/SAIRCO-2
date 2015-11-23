<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class inicioTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testInicio()
    {
        $this->visit('/')
            ->see('Bienvenido');
        $this->visit('/')
            ->click('Ingresar')
            ->seePageIs('/login');
        $this->visit('/')
            ->click('Registrarse')
            ->seePageIs('/register');
        $this->visit('/')
            ->click('Personas involucradas')
            ->seePageIs('/acercaDe');
        $this->visit('/')
            ->click('SAIRCO')
            ->seePageIs('/');
    }

}
