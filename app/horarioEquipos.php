<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class horarioEquipo extends Model
{
    protected $table = 'horarioEquipos';
    protected $fillable = ['equipoID', 'horario', 'estado'];
}
