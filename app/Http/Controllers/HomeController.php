<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;

class HomeController extends Controller
{
    public function index(){
        if(Auth::check() && Auth::user()->role=='admin') {
            return redirect()->route('panelDeAdministrador');
        }elseif(Auth::check() && Auth::user()->role=='user'){
            return redirect()->route('panelDeUsuario');
        }else {return view('home');}
    }

    public function acercaDe(){
        if(Auth::check() && Auth::user()->role=='admin') {
            return redirect()->route('panelDeAdministrador');
        }elseif(Auth::check() && Auth::user()->role=='user'){
            return redirect()->route('panelDeUsuario');
        }else {
        return view ('acercaDe/acercaDe');}
    }
    public function JuanMartinez(){
        if(Auth::check() && Auth::user()->role=='admin') {
            return redirect()->route('panelDeAdministrador');
        }elseif(Auth::check() && Auth::user()->role=='user'){
            return redirect()->route('panelDeUsuario');
        }else {
        return view ('acercaDe/JuanMartinez');}
    }
    public function EdwinPuertas(){
        if(Auth::check() && Auth::user()->role=='admin') {
            return redirect()->route('panelDeAdministrador');
        }elseif(Auth::check() && Auth::user()->role=='user'){
            return redirect()->route('panelDeUsuario');
        }else {
        return view ('acercaDe/EdwinPuertas');}
    }
    public function JuanMantilla(){
        if(Auth::check() && Auth::user()->role=='admin') {
            return redirect()->route('panelDeAdministrador');
        }elseif(Auth::check() && Auth::user()->role=='user'){
            return redirect()->route('panelDeUsuario');
        }else {
        return view ('acercaDe/JuanMantilla');}
    }
    public function Mostrar(){
        return view ('acercaDe/Mostrar');
    }
}