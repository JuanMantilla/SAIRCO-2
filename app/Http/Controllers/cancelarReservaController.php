<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class cancelarReservaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('panelDeUsuario\cancelarReserva');
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
        //
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
    public function update(Request $request)
    {
        $nroHorasAreservar=0;

        $usuario= DB::select('select * from reservas where usuario= ?', [$request->usuario]);

        $centinela=false;
        if ($request->estado=="cancelar") {
            foreach ($usuario as $resultado) {
                if ($resultado->id == $request->id) {

                    $equipos= DB::select('select * from equipos where name= ?', [$resultado->equipo]);
                    $fechaAactualizar = date_create($resultado->fechaInicial);
                    $horario = $fechaAactualizar->format('Y-m-d H:i');
                    $fechaFinal=$resultado->fechaFinal;
                    $fechaInicial=$resultado->fechaInicial;
                    $horaInicial = (int)substr($fechaInicial, -5, 2);
                    $horaFinal = (int)substr($fechaFinal, -5, 2);
                    for ($k=$horaInicial;$k<$horaFinal-1;$k++){
                        $nroHorasAreservar++;
                    }
                    $centinela = true;
                    DB::table('reservas')
                        ->where('usuario', $resultado->usuario)
                        ->where('fechaInicial', $resultado->fechaInicial)
                        ->update(['estado' => 0]);
                    foreach ($equipos as $equipo) {
                        for ($k=0;$k<=$nroHorasAreservar;$k++){
                            DB::table('equipo_horario')
                                ->where('equipoId', $equipo->hardwareId)
                                ->where('horario', $horario)
                                ->update(['estado' => 0]);
                            date_add($fechaAactualizar, date_interval_create_from_date_string('1 hour'));
                            $horario = $fechaAactualizar->format('Y-m-d H:i');
                        }
                    }


                }
            }
        }
        else{
            foreach ($usuario as $resultado) {
                if ($resultado->id == $request->id) {
                    $equipos= DB::select('select * from equipos where name= ?', [$resultado->equipo]);
                    $fechaAactualizar = date_create($resultado->fechaInicial);
                    $horario = $fechaAactualizar->format('Y-m-d H:i');
                    $fechaFinal=$resultado->fechaFinal;
                    $fechaInicial=$resultado->fechaInicial;
                    $horaInicial = (int)substr($fechaInicial, -5, 2);
                    $horaFinal = (int)substr($fechaFinal, -5, 2);
                    for ($k=$horaInicial;$k<$horaFinal-1;$k++){
                        $nroHorasAreservar++;
                    }
                    $centinela = true;
                    DB::table('reservas')
                        ->where('usuario', $resultado->usuario)
                        ->where('fechaInicial', $resultado->fechaInicial)
                        ->update(['estado' => 1]);
                    foreach ($equipos as $equipo) {
                        for ($k=0;$k<=$nroHorasAreservar;$k++){
                            DB::table('equipo_horario')
                                ->where('equipoId', $equipo->hardwareId)
                                ->where('horario', $horario)
                                ->update(['estado' => 1]);
                            date_add($fechaAactualizar, date_interval_create_from_date_string('1 hour'));
                            $horario = $fechaAactualizar->format('Y-m-d H:i');
                        }
                    }


                }
            }
        }
        if($centinela){return redirect()->route('verReservas');}
        else return view('panelDeUsuario\panelDeUsuario');


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
