<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
class panelDeAdministradorController extends Controller
{
    /*
     * Agregar la migracion y modelo de controladorEquipos!!!!!!!
     * */

    public function index(){
        $controlador= DB::select('select * from controladorEquipos where id = :id', ['id' => 1]);
        $hardware = DB::select('select * from hardware');
        $equipos= DB::select('select * from equipos');
        $countHardware = DB::table('hardware')->count();
        $countEquipos = DB::table('equipos')->count();
        $countE=(int)$countEquipos;
        $countH=(int)$countHardware;
        $centinela = false;
        $contador=0;

        foreach($controlador as $elvalor) {
            $valor = (int)$elvalor->Agregar;
        }
        if($valor==0) {
            //Recorro todos los equipos que contiene la variable $hardware
            foreach ($hardware as $resultados) {

                $nombreSalon = "A1 ";
                $sala = "";
                $nombreEquipo = substr($resultados->NAME, -2, 1);
                if ($nombreEquipo == "E") {
                    $nombreEquipoFinal = substr($resultados->NAME, -2, 2);
                    $nombreSalon = $nombreSalon . " " . substr($resultados->NAME, -10, 7);
                    $sala = $sala . substr($resultados->NAME, -10, 4);
                } else {
                    $nombreEquipoFinal = substr($resultados->NAME, -3, 3);
                    $nombreSalon = $nombreSalon . " " . substr($resultados->NAME, -11, 7);
                    $sala = $sala . substr($resultados->NAME, -11, 4);
                }
                //Pregunto si las iniciales del nombre del equipo de la tabla de ocs es igual a SALA para saber cuáles están en un salón
                if ($resultados->NAME = substr($resultados->NAME, -10, 4) == "SALA" || $resultados->NAME = substr($resultados->NAME, -11, 4) == "SALA") {
                    $centinela = true;
                    DB::insert('insert into equipos (name, hardwareId, ubicacion) values (?, ?, ?)', [$nombreEquipoFinal, $resultados->ID, $nombreSalon]);
                }

            }
            if ($centinela) {
                DB::table('controladorEquipos')
                    ->update(['Agregar' => 1]);
            }
        }
        else {
            for ($i=0;$i<$countHardware;$i++){
                $centinela2=true;
                $nombreSalon = "A1 ";
                $sala = "";
                $nombreEquipo = substr($hardware[$i]->NAME, -2, 1);
                if ($nombreEquipo == "E") {
                    $nombreEquipoFinal = substr($hardware[$i]->NAME, -2, 2);
                    $nombreSalon = $nombreSalon . " " . substr($hardware[$i]->NAME, -10, 7);
                    $sala = $sala . substr($hardware[$i]->NAME, -10, 4);
                } else {
                    $nombreEquipoFinal = substr($hardware[$i]->NAME, -3, 3);
                    $nombreSalon = $nombreSalon . " " . substr($hardware[$i]->NAME, -11, 7);
                    $sala = $sala . substr($hardware[$i]->NAME, -11, 4);
                }
                for($j=0;$j<$countEquipos && $centinela2==true;$j++){
                    if ($hardware[$i]->NAME = substr($hardware[$i]->NAME, -10, 4) == "SALA" || $hardware[$i]->NAME = substr($hardware[$i]->NAME, -11, 4) == "SALA") {
                        if ($nombreEquipoFinal == $equipos[$j]->name) {
                            $centinela2 = false;
                        }
                    }
                }
                if($centinela2){
                    if ($hardware[$i]->NAME = substr($hardware[$i]->NAME, -10, 4) == "SALA" || $hardware[$i]->NAME = substr($hardware[$i]->NAME, -11, 4) == "SALA") {
                        DB::insert('insert into equipos (name, hardwareId, ubicacion) values (?, ?, ?)', [$nombreEquipoFinal, $hardware[$i]->ID, $nombreSalon]);
                    }
                }
            }
        }
        return view('panelDeAdministrador\panelDeAdministrador');
    }
}