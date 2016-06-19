<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\Equipo;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class agregarEquipoController extends Controller
{
    public function index()
    {
        if(Auth::check() && Auth::user()->role=='admin') {


            $controlador = DB::select('select * from controladorEquipos where id = :id', ['id' => 1]);
            $hardware = DB::select('select * from hardware');
            $centinela = false;
            foreach ($controlador as $elvalor) {
                $valor = (int)$elvalor->Agregar;
            }

            if ($valor == 0) {
                foreach ($hardware as $resultados) {
                    $fecha = date_create('2016-01-01');
                    $nombreSalon = "A1";
                    if (substr($resultados->NAME, -10, 4) == "SALA") {
                        $nombreSalon = $nombreSalon . " " . substr($resultados->NAME, -10, 7);
                        $nombreEquipo = substr($resultados->NAME, -2, 2);
                    } else if (substr($resultados->NAME, -10, 4) == "ALA4") {

                        $nombreSalon = $nombreSalon . " " . substr($resultados->NAME, -11, 7);
                        $nombreEquipo = substr($resultados->NAME, -3, 3);
                    }
                    if (substr($resultados->NAME, -10, 4) == "SALA" || substr($resultados->NAME, -10, 4) == "ALA4" && $centinela == false) {
                        //$centinela = true;
                        $horario = $fecha->format('Y-m-d H:i');
                        DB::insert('insert into equipos (name, hardwareId, ubicacion) values (?,?,?)', [$nombreEquipo, $resultados->ID, $nombreSalon]);
                        for ($i = 0; $i < 168; $i++) {
                            date_add($fecha, date_interval_create_from_date_string('1 hour'));
                            $hora = (int)substr($horario, -5, 2);
                            $horario = $fecha->format('Y-m-d H:i');
                            if ($hora > 6 && $hora < 21) {
                                DB::insert('insert into equipo_horario (equipoId, horario, estado) values (?,?,?)', [$resultados->ID, $horario, 0]);
                                DB::table('controladorEquipos')
                                    ->update(['Agregar' => 1]);
                            }

                        }

                    }
                }
                $seAgregaron = 1;
                return View('panelDeAdministrador\agregarEquipo', ['valor' => $seAgregaron]);
            } else {
                $seAgregaron = 0;
                return View('panelDeAdministrador\agregarEquipo', ['valor' => $seAgregaron]);
            }
        } else{
            return redirect()->route('login');
        }
    }
    public function postEquipo(Request $request)
    {

    }
}
