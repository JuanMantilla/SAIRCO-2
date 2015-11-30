<?php

namespace App\Http\Controllers;

use DB;
use App\Equipo;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class agregarEquipoController extends Controller
{
    public function index()
    {
        $controlador = DB::select('select * from controladorEquipos where id = :id', ['id' => 1]);
        $hardware = DB::select('select * from hardware');
        $centinela = false;
        foreach ($controlador as $elvalor) {
            $valor = (int)$elvalor->Agregar;
        }
        if ($valor == 0) {
            foreach ($hardware as $resultados) {
                $nombreSalon = "A1";
                $nombreSalon = $nombreSalon . " " . substr($resultados->NAME, -10, 7);
                $nombreEquipo = substr($resultados->NAME, -2, 2);

                if ($resultados->NAME = substr($resultados->NAME, -10, 4) == "SALA" && $centinela == false) {
                    $$centinela = true;
                    $fecha = date_create('2016-01-01');
                    $horario = $fecha->format('Y-m-d H:i');
                    $hora = (int)substr($horario, -5, 2);
                    for ($i = 0; $i < 168; $i++) {
                        date_add($fecha, date_interval_create_from_date_string('1 hour'));
                        $hora = (int)substr($horario, -5, 2);
                        $horario = $fecha->format('Y-m-d H:i');
                        if ($hora > 6 && $hora < 21) {
                            DB::insert('insert into equipos (name, hardwareId, ubicacion, horario, estado) values (?, ?, ?,?,?)', [$nombreEquipo, $resultados->ID, $nombreSalon, $horario, 0]);
                            DB::table('controladorEquipos')
                                ->update(['Agregar' => 1]);
                        }

                    }

                }
            }
            $seAgregaron=1;
            return View('panelDeAdministrador\agregarEquipo', ['valor'=>$seAgregaron]);
        }else {
            $seAgregaron=0;
            return View('panelDeAdministrador\agregarEquipo', ['valor'=>$seAgregaron]);
        }
    }
    public function postEquipo(Request $request)
    {

    }
}
