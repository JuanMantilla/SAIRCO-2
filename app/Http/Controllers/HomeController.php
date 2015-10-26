<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(){
        $controlador= DB::select('select * from controladorEquipos where id = :id', ['id' => 1]);
        $horarios= DB::select('select * from horarios');
        $equipos= DB::select('select * from equipos');
        $centinela=false;
        $fecha = date_create('2015-10-26');
        $horario = $fecha->format('Y-m-d H:i');
        $hora = (int)substr ($horario, -5, 2);
        $domingo=0;
        foreach($controlador as $elvalor) {
            $valorHorario = (int)$elvalor->horario;
            $valorEquipo = (int)$elvalor->equipo_horario;
        }
        if($valorHorario ==0) {
            for ($i = 0; $i < 192; $i++) {
                date_add($fecha, date_interval_create_from_date_string('1 hour'));
                $hora = (int)substr($horario, -5, 2);
                $dia = (int)substr($horario, -8, 2);
                $horario = $fecha->format('Y-m-d H:i');
                $domingo++;
                if ($hora > 6 && $hora < 21 && ($domingo <145 || $domingo > 168)) {
                        DB::insert('insert into horarios (fecha) values (?)', [$horario]);
                }
                if ($domingo > 168) {
                    $domingo = 0;
                }
            }
            DB::table('controladorEquipos')
                ->update(['horario' => 1]);
        }
        if($valorEquipo==0){
            foreach ($equipos as $equipo) {
                foreach ($horarios as $horario){
                    DB::insert('insert into equipo_horario (equipo_id, horario_id, estado) values (?,?,?)', [$equipo->id,$horario->id, 0]);
                }
            }
            DB::table('controladorEquipos')
                ->update(['equipo_horario' => 1]);
        }
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
    public function Mostrar(){
        return view ('acercaDe/Mostrar');
    }
}
