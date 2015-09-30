<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(){
        return view('home');
    }

    public function acercaDe(){
        return view ('acercaDe/acercaDe');
    }
    public function JuanMartinez(){
        return view ('acercaDe/JuanMartinez');
    }
    public function EdwinPuertas(){
        return view ('acercaDe/EdwinPuertas');
    }
    public function JuanMantilla(){
        return view ('acercaDe/JuanMantilla');
    }
}
