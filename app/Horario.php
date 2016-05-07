<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    protected $table = 'horario';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['anio', 'mes', 'dia', 'hora', 'minuto'];

    public function users()
    {
        return $this->belongsToMany('App\Equipo');
    }
}

