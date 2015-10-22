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
        $usuario= DB::select('select * from reservas where usuario= ?', [$request->usuario]);
        $centinela=false;
        foreach ($usuario as $resultado) {
            if($resultado->usuario==$request->usuario){
                $centinela=true;
                DB::table('reservas')
                    ->where('usuario', $request->usuario)
                    ->where('fecha', $request->fecha)
                    ->update(['estado' => 0]);
                DB::table('equipos')
                    ->where('horario', $request->fecha)
                    ->update(['estado' => 0]);
            }
        }
        if($centinela){return view('panelDeUsuario\cancelarReserva');}
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
