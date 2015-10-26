<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    protected $table = 'horarios';
    protected $fillable = ['fecha'];

    public function equipos()
    {
        return $this->belongsToMany('App\Equipo');
        return $this->belongsToMany('App\Equipo')->withPivot('equipo_id', 'horario_id', 'estado');
    }

}
