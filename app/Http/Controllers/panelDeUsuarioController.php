<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use App\Http\Controllers\Controller;
use Redirect;
class panelDeUsuarioController extends Controller
{
    public function index(){
        if(Auth::check() && Auth::user()->role=='user') {
            return view('panelDeUsuario\panelDeUsuario');
        }else{
                return redirect()->route('login');
            }
    }
}
