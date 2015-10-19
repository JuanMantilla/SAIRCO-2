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
        $hardware= DB::select('select * from hardware');
        $software= DB::select('select * from softwares');

        foreach ($hardware as $resultados) {
            $nombre = $resultados->NAME;
            $nombreSalon= "A1";
            $nombreSalon= $nombreSalon." ".substr($resultados->NAME,-10, 7);
            $nombreEquipo= substr($resultados->NAME,-2, 2);

            if ($resultados->NAME = substr($resultados->NAME,-10, 4)=="SALA"){

                $fecha = date_create('2015-01-01');
                $horario = $fecha->format('Y-m-d H:i');
                $hora = (int)substr ($horario, -5, 2);
                for ($i=0;$i<24;$i++){
                    date_add($fecha, date_interval_create_from_date_string('1 hour'));
                    $hora = (int)substr ($horario, -5, 2);
                    $horario = $fecha->format('Y-m-d H:i');
                    if($hora>6 && $hora <21){

                        DB::insert('insert into equipos (name, hardwareId, ubicacion, horario, estado) values (?, ?, ?,?,?)', [$nombreEquipo, $resultados->ID, $nombreSalon, $horario, 0]);
                    }

                }

            }
        }

        $equipos= DB::select('select * from equipos');
        return View('panelDeAdministrador\agregarEquipo',['equipo' => $equipos]);
    }

    public function postEquipo(Request $request)
    {

    }
}
