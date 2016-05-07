<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Validator;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class reservarEquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('panelDeUsuario\reservarEquipo');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Centinela me ayuda a saber si se hizo satisfactoriamente la reserva o no.
        //Ademas, asegura que se asigne la reserva a s�lo un equipo.
        $centinela=false;
        //guarda todos los equipos que tengan el horario ingresado por el usuario en la variable $equipos disponibles
        $equiposDisponibles = DB::select('select * from equipo_horario where horario= ?', [$request->fecha]);
        //recorro todos los equipos dentro de la variable $equipos disponibles
        foreach ($equiposDisponibles as $resultado) {
            //Le asigno a la variable $software el hardware id del euqipo que tiene en ese momento
            $software=$resultado->equipoId;
            //Asigno a la variable $softwares todos los equipos dentro de la tabla generada por OCS
            //que tengan el mismo hardware id de $equposdisponibles para poder manipularla posteriormente
            $softwares = DB::select('select * from softwares where HARDWARE_ID= ?', [$software]);
        }

        //Recorro todos los $equipos disponibles
        foreach($equiposDisponibles as $resultados){
            //estado=1:reservado , estado=0: disponible
            if($resultados->estado == 0){
                //Recorro todos los equipos dentro de la tabla de ocs que est�n dentro de la variable $softwares
                foreach($softwares as $variable){
                    //Aseguro que ingrese a esta condici�n s�lo cuando el software del equipo es igual al software que el usuario especific�
                    if(($variable->NAME == $request->software1)){
                        //Pregunto si $centinela es falso, esto me asegura de que s�lo se asigne 1 equipo por reserva
                        if($centinela==false){
                            //Cambio el valor de $centinela
                            $centinela=true;
                            //relaciono la tabla de horarios con la de equipos:
                            $equipos = DB::select('select * from equipos where hardwareId= ?', [$variable->HARDWARE_ID]);
                            foreach ($equipos as $equipoAreservar) {
                                //Inserto la reserva en la tabla de reservas
                                DB::insert('insert into reservas (usuario, fecha, ubicacion, equipo, estado) values (?, ?, ?, ?, ?)', [$request->usuario, $request->fecha, $equipoAreservar->ubicacion, $equipoAreservar->name, 1]);
                                //Actualizo el
                                $numeroDeReservas = $equipoAreservar->nroReservas;
                                $numeroDeReservasActualizado = $numeroDeReservas + 1;
                                DB::table('equipo_horario')
                                    ->where('equipoId', $resultados->equipoId)
                                    ->where('horario', $request->fecha)
                                    ->update(['estado' => 1]);
                                DB::table('equipos')
                                    ->where('hardwareId', $resultados->equipoId)
                                    ->update(['nroReservas' => $numeroDeReservasActualizado]);
                            }
                        }
                    }
                }
            }
        }
        if($centinela){return view('panelDeUsuario\reservaSatisfactoria');}
        else {return view('panelDeUsuario\reservaInsatisfactoria');}

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
