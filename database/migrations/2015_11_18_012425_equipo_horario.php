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
            $table->string('equipoId');
            $table->string('horario');
            $table->string('estado');
            $table->string('name');
            $table->string('ubicacion');
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
