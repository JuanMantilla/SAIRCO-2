<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'equipos';
    protected $fillable = ['name', 'hardwareId', 'ubicacion', 'horario', 'estado'];
    public function horario(){
        return $this->belongsToMany('App\Horario')->withPivot('equipo_id', 'horario_id', 'estado');
    }
}
