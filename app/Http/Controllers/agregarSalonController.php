<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use App\Http\Controllers\Controller;

class agregarSalonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check() && Auth::user()->role=='admin') {


            $equipos = DB::select('select * from hardware');
            $controlador = DB::select('select * from controladorEquipos where id = :id', ['id' => 1]);
            foreach ($controlador as $elvalor) {
                $valor = (int)$elvalor->horario;
            }
            if ($valor == 0) {
                foreach ($equipos as $resultados) {
                    $nombre = $resultados->NAME;
                    $nombreSalon = "A1";
                    $nombreSalon = $nombreSalon . " " . substr($resultados->NAME, -10, 7);
                    $nombreEquipo = substr($resultados->NAME, -2, 2);

                    if ($resultados->NAME = substr($resultados->NAME, -10, 4) == "SALA") {

                        $fecha = date_create('2015-01-01');
                        $result = $fecha->format('Y-m-d H:i');
                        $hora = (int)substr($result, -5, 2);
                        for ($i = 0; $i < 24; $i++) {
                            date_add($fecha, date_interval_create_from_date_string('1 hour'));
                            $hora = (int)substr($result, -5, 2);
                            $result = $fecha->format('Y-m-d H:i');
                            if ($hora > 6 && $hora < 21) {
                                DB::insert('insert into salones (equipos, name, ubicacion, horario, estado) values (?, ?, ?,?,?)', [$nombreEquipo, $nombreSalon, $nombreSalon, $result, 0]);
                                DB::table('controladorEquipos')
                                    ->update(['horario' => 1]);
                            }

                        }

                    }
                }
                $agregado = 1;
                return View('panelDeAdministrador\mostrar', ['valor' => $agregado]);
            } else {
                $agregado = 0;
                return View('panelDeAdministrador\mostrar', ['valor' => $agregado]);
            }

        }else{
                return redirect()->route('login');
            }
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

    }
}
