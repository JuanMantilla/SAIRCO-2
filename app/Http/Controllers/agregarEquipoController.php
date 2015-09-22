<?php

namespace App\Http\Controllers;

use App\Equipo;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class agregarEquipoController extends Controller
{

    public function index()
    {
        return view('Auth\agregarEquipo');
    }

    public function postEquipo(Request $request)
    {
        $equipo = new Equipo;
        $equipo->name=$request->name;
        $equipo->ubicacion=$request->ubicacion;
        $equipo->horario=$request->horario;
        $equipo->hardware=$request->hardware;
        $equipo->software=$request->software;
        $equipo->save();

        return view('Auth\equipoAgregado');
    }
}
