<?php
/**
 * Created by PhpStorm.
 * User: Administrador
 * Date: 19/05/2016
 * Time: 9:49 AM
 */

namespace app;

use Illuminate\Database\Eloquent\Model;
class Software
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'contadorSoftware';
    protected $fillable = ['name', 'nroReservas'];
}