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

        $nroSoftware=3;
        $nom="software";
        //Centinela me ayuda a saber si se hizo satisfactoriamente la reserva o no.
        //Ademas, asegura que se asigne la reserva a s�lo un equipo.
        $centinela=false;
        //Fecha inicial de la reserva
        $fechaInicial=$request->fecha;
        //Fecha final de la reserva
        $fechaFinal=$request->fecha2;
        $horaInicial = (int)substr($fechaInicial, -5, 2);
        $horaFinal = (int)substr($fechaFinal, -5, 2);
        $nroHorasAreservar=0;
        for ($k=$horaInicial;$k<$horaFinal-1;$k++){
            $nroHorasAreservar++;
        }
        $equiposTotales = DB::select('select * from equipos');
        //$equiposDisponibles = DB::select('select * from equipo_horario where horario= ?', [$request->fecha]);
        //Ciclo que recorre todos los equipos disponibles en la hora inicial de la reserva

        foreach ($equiposTotales as $equipo)
        {

            $equipo_horario = DB::table('equipo_horario')
                ->where('equipoId', '=', $equipo->hardwareId)
                ->get();
            /*recorro todos el horario del equipo evaluado actualmente; si en el intervalo que el usuario requiere el equipo, este esta ocupado se hace la variable
            $seReservara igual a 1 para que ese equipo no se reserve y se sale de este ciclo*/
            foreach ($equipo_horario as $resultados)
            {
                $seReservara=0;
                if ($resultados->horario==$fechaFinal) {break;}
                else if($resultados->estado!=0)
                {
                    $seReservara=1;
                    break;
                }

            }
            if ($seReservara==0){
                //Asigno a la variable $softwares todos los equipos dentro de la tabla generada por OCS
                //que tengan el mismo hardware id de $equposdisponibles para poder manipularla posteriormente
                $softwares = DB::select('select * from softwares where HARDWARE_ID= ?', [ $resultados->equipoId]);

                $j = 0;
                $softwareSeleccionado = [];
                for ($i = 1; $i <= $nroSoftware; $i++) {
                    $Software[$i] = $nom . $i;
                    if ($request->$Software[$i]) {
                        $softwareSeleccionado[$j] = $Software[$i];
                        $j++;
                    }
                }

                $contadorSoftawreDisponible = 0;
                //Recorro todos los equipos dentro de la tabla de ocs que est�n dentro de la variable $softwares
                foreach ($softwares as $variable)
                {
                    for ($k = 0; $k <= sizeof($softwareSeleccionado) - 1; $k++) {
                        if (($variable->NAME == $request->$softwareSeleccionado[$k])) {
                            $contadorSoftawreDisponible++;
                        }
                        if ($contadorSoftawreDisponible == sizeof($softwareSeleccionado)) {
                            $equipoAreservar = $resultados->equipoId;
                            break;
                        }
                    }
                    //pregunto si tengo completamente el software disponible que el usuario me pidio
                    if ($contadorSoftawreDisponible == sizeof($softwareSeleccionado)) {
                        //Pregunto si $centinela es falso, esto me asegura de que s�lo se asigne 1 equipo por reserva
                        if ($centinela == false) {
                            //Cambio el valor de $centinela
                            $centinela = true;
                            //relaciono la tabla de horarios con la de equipos:
                            $equipos = DB::select('select * from equipos where hardwareId= ?', [$equipoAreservar]);
                            foreach ($equipos as $equipoAreservar) {
                                //Inserto la reserva en la tabla de reservas
                                DB::insert('insert into reservas (usuario, fechaInicial, fechaFinal, ubicacion, equipo, estado) values (?, ?,?, ?, ?, ?)', [$request->usuario, $fechaInicial, $fechaFinal, $equipoAreservar->ubicacion, $equipoAreservar->name, 1]);
                                //Actualizo el
                                echo $nroHorasAreservar."<br/>";
                                $numeroDeReservas = $equipoAreservar->nroReservas;
                                $numeroDeReservasActualizado = $numeroDeReservas + 1;
                                $fechaAactualizar = date_create($fechaInicial);
                                $horario = $fechaAactualizar->format('Y-m-d H:i');
                                for ($k=0;$k<=$nroHorasAreservar;$k++){
                                    DB::table('equipo_horario')
                                        ->where('equipoId', $resultados->equipoId)
                                        ->where('horario', $horario)
                                        ->update(['estado' => 1]);
                                    date_add($fechaAactualizar, date_interval_create_from_date_string('1 hour'));
                                    $horario = $fechaAactualizar->format('Y-m-d H:i');
                                }

                                DB::table('equipos')
                                    ->where('hardwareId', $resultados->equipoId)
                                    ->update(['nroReservas' => $numeroDeReservasActualizado]);
                            }
                        }
                    }
                }
            }

        }
            //guarda todos los equipos que tengan el horario ingresado por el usuario en la variable $equipos disponibles


                //Recorro todos los $equipos disponibles
    //            foreach ($equiposDisponibles as $resultados) {
    //                //estado=1:reservado , estado=0: disponible
    //
    //            }
                if ($centinela) {
                    return view('panelDeUsuario\reservaSatisfactoria');
                } else {
                    return view('panelDeUsuario\reservaInsatisfactoria');
                }

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
