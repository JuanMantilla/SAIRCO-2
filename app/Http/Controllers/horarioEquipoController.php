<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class horarioEquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hardware= DB::select('select * from hardware');
        $centinela=false;
        foreach ($hardware as $resultados) {
            $nombreSalon= "A1";
            $nombreSalon= $nombreSalon." ".substr($resultados->NAME,-10, 7);
            $nombreEquipo= substr($resultados->NAME,-2, 2);

            if ($resultados->NAME = substr($resultados->NAME,-10, 4)=="SALA" && $centinela==false){
                $$centinela=true;
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
