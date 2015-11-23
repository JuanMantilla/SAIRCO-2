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
        $equipos = DB::select('select * from equipos');
        $salones = DB::select('select * from salones');
        $iterador = 0;
        if ($equipos && $salones) {
            foreach ($equipos as $equipo) {
                if ($equipo->id == 1 || $equipo->id == 15) {
                    $unicosEquipos[$iterador] = $equipo;
                    $iterador++;
                }
            }
            foreach ($salones as $salon) {
                if ($salon->id == 1) {
                    $unicosSalones[$iterador] = $salon;
                    $iterador++;
                }
            }
            return view('panelDeAdministrador\viewObtenerInformacion', ['equipos' => $unicosEquipos], ['salones' => $unicosSalones]);
        } else if ($salones) {
            {
                $unicosEquipos = 0;
                $iterador = 0;
                foreach ($salones as $salon) {
                    if ($salon->id == 1) {
                        $unicosSalones[$iterador] = $salon;
                        $iterador++;
                    }
                }
                return view('panelDeAdministrador\viewObtenerInformacion', ['equipos' => $unicosEquipos], ['salones' => $unicosSalones]);
            }
        } else if ($equipos){

                $unicosSalones = 0;
                $equipos = DB::select('select * from equipos');
                $iterador = 0;
                foreach ($equipos as $equipo) {
                    if ($equipo->id == 1 || $equipo->id == 15) {
                        $unicosEquipos[$iterador] = $equipo;
                        $iterador++;
                    }
                }
                return view('panelDeAdministrador\viewObtenerInformacion', ['equipos' => $unicosEquipos], ['salones' => $unicosSalones]);
        }
        else {
            $unicosSalones = 0;
            $unicosEquipos = 0;
            return view('panelDeAdministrador\viewObtenerInformacion', ['equipos' => $unicosEquipos], ['salones' => $unicosSalones]);
        }
    }
}
