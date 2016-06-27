<?php

namespace App\Http\Controllers\Auth;



use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\User;
use Illuminate\Support\Facades\Auth;
use DateTime;
class verReservasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check() && Auth::user()->role=='user') {


            $user = Auth::user()->name;
            $date=new DateTime();
            $result = $date->format('Y-m-d-H-i');
            $fechaActualConCeros = substr($result, -16, 14);
            $fechaActualConCeros= $fechaActualConCeros."00";
            $time = DateTime::createFromFormat('Y-m-d-H-i', $fechaActualConCeros);
            date_add($time, date_interval_create_from_date_string('2 hour'));
            $reservasExpiradas = DB::table('reservas')
                ->where ('usuario','=',$user)
                ->where('fechaFinal', '<=', $time)
                ->get();
            $reservasVigentes= DB::table('reservas')
                ->where ('usuario','=',$user)
                ->where('fechaFinal', '>=', $time)
                ->get();
            if ($reservasVigentes || $reservasExpiradas) {
                return view('panelDeUsuario\verReservas', ['reservasVigentes' => $reservasVigentes, 'reservasExpiradas'=>$reservasExpiradas]);

            } else {
                $reservas = 0;

                return view('panelDeUsuario\verReservas', ['reservas' => $reservas]);
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
    public function getReservas(Resquest $request){
        $reservas = DB::select('select * from reservas where usuario = :nombre', ['nombre' =>$request->usuario] );
        return $reservas;
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
