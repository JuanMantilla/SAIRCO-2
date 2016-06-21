<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class controladorEquipos extends Model
{
    protected $table = 'controladorEquipos';
        protected $fillable = ['Agregar', 'horario', 'equipoHorario'];
}
