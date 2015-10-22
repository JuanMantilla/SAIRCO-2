<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipos extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'equipos';
    protected $fillable = ['name', 'hardwareId', 'ubicacion', 'horario', 'estado'];

}
