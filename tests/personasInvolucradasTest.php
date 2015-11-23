<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class personasInvolucradasTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testPersonasInvolucradas()
    {
        //Test de texto
        $this->visit('/acercaDe')
            ->see('Personas involucradas en SAIRCO:');
        $this->visit('/acercaDe/JuanMantilla')
            ->see('Juan Sebastian Mantilla Quintero');
        $this->visit('/acercaDe/JuanMartinez')
            ->see('Juan Carlos Martinez Santos');
        $this->visit('/acercaDe/EdwinPuertas')
            ->see('Edwin Alexander Puertas del Castillo');
        //Test de links
        $this->visit('/acercaDe')
            ->click('Juan Sebastian Mantilla Quintero')
            ->seePageIs('/JuanMantilla');
        $this->visit('/acercaDe')
            ->click('Juan Carlos Martinez Santos')
            ->seePageIs('/JuanMartinez');
        $this->visit('/acercaDe')
            ->click('Edwin Alexander Puertas del Castillo')
            ->seePageIs('/EdwinPuertas');
    }
}
