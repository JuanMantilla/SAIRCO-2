<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class horarioSalon extends Model
{
    protected $table = 'horarioSalones';
    protected $fillable = ['salonID', 'horario', 'estado'];
}
