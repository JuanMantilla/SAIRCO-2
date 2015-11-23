<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ingresarTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testLogin()
    {
        $this->visit('/login')
            ->type('t00024526@utbvirtual.edu.co', 'email')
            ->type('admin', 'password')
            ->press('Ingresar')
            ->seePageIs('/Panel_de_administrador');
        $this->visit('/login')
            ->type('comun@comun.com', 'email')
            ->type('asdasd123', 'password')
            ->press('Ingresar')
            ->seePageIs('/panelDeUsuario');
    }
}
