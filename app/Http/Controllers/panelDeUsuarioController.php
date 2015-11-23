<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class panelDeUsuarioController extends Controller
{
    public function index(){
        /*DB::table('equipos')
            ->update(['estado' => 0]);*/

        return view('panelDeUsuario\panelDeUsuario');
    }
}
