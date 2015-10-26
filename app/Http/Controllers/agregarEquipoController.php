<?php

namespace App\Http\Controllers;

use DB;
use App\Equipo;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class agregarEquipoController extends Controller
{

    public function index()
    {

    }

    public function postEquipo(Request $request)
    {
        $equipos= DB::select('select * from equipos');
        return View('panelDeAdministrador\agregarEquipo',['equipo' => $equipos]);
    }
}
