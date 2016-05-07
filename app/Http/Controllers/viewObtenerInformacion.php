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
                    $unicosEquipos[$iterador] = $equipo;
                    $iterador++;
            }
            foreach ($salones as $salon) {
                if ($salon->id == 1) {
                    $unicosSalones[$iterador] = $salon;
                    $iterador++;
                }
            }
            if( preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"])){
                return response()->json($unicosEquipos);
            }
            return view('panelDeAdministrador\viewObtenerInformacion', ['equipos' => $equipos], ['salones' => $unicosSalones]);

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
    public function salones(){
        $salones = DB::select('select * from salones');
        $iterador=0;
        foreach ($salones as $salon) {
            if ($salon->id == 1) {
                $unicosSalones[$iterador] = $salon;
                $iterador++;
            }
        }

        if( preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"])){
            return response()->json($unicosSalones);
        }

    }
}
