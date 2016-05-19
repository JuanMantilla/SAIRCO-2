<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservas extends Model
{
    protected $table = 'reservas';
    protected $fillable = ['usuario', 'fechaInicial','fechaFinal', 'ubicacion', 'equipo', 'estado'];
}
