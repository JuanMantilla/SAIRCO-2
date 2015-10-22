<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class salones extends Model
{
    protected $table = 'salones';
    protected $fillable = ['id','name', 'ubicacion', 'horario', 'equipos', 'estado'];
}
