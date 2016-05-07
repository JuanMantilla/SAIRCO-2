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
    protected $table = 'equipo';
    protected $fillable = ['name', 'ubicacion', 'horario', 'hardware', 'software', 'nroReservas'];

    public function horario()
    {
        return $this->belongsToMany('App\Horario');
    }
}
