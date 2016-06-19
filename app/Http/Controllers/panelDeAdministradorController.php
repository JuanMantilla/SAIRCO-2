<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;

class panelDeAdministradorController extends Controller
{

    public function index(){
        if(Auth::check() && Auth::user()->role=='admin') {
            return view('panelDeAdministrador\panelDeAdministrador');
        }else return redirect()->route('login');
    }
}
