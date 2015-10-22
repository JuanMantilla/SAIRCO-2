<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class viewObtenerInformacion extends Controller
{
    public function index()
    {
        $equipos= DB::select('select * from equipos');
        $salones= DB::select('select * from salones');

        return view('panelDeAdministrador\viewObtenerInformacion', ['equipos' => $equipos], ['salones' => $salones]);
    }
}
