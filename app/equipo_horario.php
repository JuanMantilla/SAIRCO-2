<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class equipo_horario extends Model
{
    protected $table = 'equipo_horario';
    protected $fillable = ['equipoID', 'horarioID', 'estado'];

}
