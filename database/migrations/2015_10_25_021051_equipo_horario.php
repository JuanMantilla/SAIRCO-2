<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EquipoHorario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipo_horario', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('equipo_id');
            $table->foreign('equipo_id')->references('id')->on('equipos');
            $table->integer('horario_id');
            $table->foreign('horario_id')->references('id')->on('horarios');
            $table->integer('estado');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('equipo_horario');
    }
}
