<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use DateTime;
use DB;

class panelDeOrganizador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     */
    public function index()
    {
        if(Auth::check() && Auth::user()->role=='organizador') {
            return view('panelDeOrganizador/panelDeOrganizador');
        }else return redirect()->route('login');
    }
    public function agregarOrganizadores(){
        if(Auth::check() && Auth::user()->role=='organizador') {
            return view('panelDeOrganizador/agregarOrganizador');
        }else return redirect()->route('login');
    }
    public function asignarReserva(){

        if(Auth::check() && Auth::user()->role=='organizador') {
            //código para obtener la fecha actual y cambiarle los minutos por ceros para poder ser usado en la base de datos
                $date=new DateTime();
                $result = $date->format('Y-m-d-H-i');
                $fechaActualConCeros = substr($result, -16, 14);
                $fechaActualConCeros= $fechaActualConCeros."00";
                $time = DateTime::createFromFormat('Y-m-d-H-i', $fechaActualConCeros);
                date_add($time, date_interval_create_from_date_string('1 hour'));
                $dia = DateTime::createFromFormat('Y-m-d-H-i', $fechaActualConCeros);
                date_add($dia, date_interval_create_from_date_string('12 hour'));
            $equiposHorarios = DB::table('equipo_horario')
                ->where('estado', '<>', 1)
                ->where('horario', '>=', $time)
                ->where('horario', '<=', $dia)
                ->get();

            return view('panelDeOrganizador\asignarReserva')->with(['equipoHorarios' => $equiposHorarios]);
        }else return redirect()->route('login');
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
        if(Auth::check() && (Auth::user()->role=='organizador' || Auth::user()->role=='admin') ){
            $user = new User([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);
            $user->role = 'organizador';
            $user->save();
            return view('panelDeOrganizador\OrganizadorRegistrado');
        } else{
            return redirect()->route('login');
        }
    }
    public function postAsignarReserva(Request $request){
        if(Auth::check() && Auth::user()->role=='organizador') {
            $reservaArealizars = DB::table('equipo_horario')
                ->where('id', '=', $request->id)
                ->get();
            DB::table('equipo_horario')
                ->where('id', $request->id)
                ->update(['estado' => 1]);
            foreach ($reservaArealizars as $reservaArealizar) {
                DB::insert('insert into reservas (usuario, fechaInicial, fechaFinal, ubicacion, equipo, estado) values (?, ?,?, ?, ?, ?)', [$request->usuario, $reservaArealizar->horario, $reservaArealizar->horario, $reservaArealizar->ubicacion, $reservaArealizar->name, 1]);
            }
            return redirect()->route('asignarReserva');
        }else return redirect()->route('login');
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
