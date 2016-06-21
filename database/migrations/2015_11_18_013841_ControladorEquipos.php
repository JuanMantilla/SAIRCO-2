<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ControladorEquipos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('controladorEquipos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('Agregar');
            $table->integer('horario');
            $table->integer('equipoHorario');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('controladorEquipos');
    }
}
