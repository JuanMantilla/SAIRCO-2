<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class viewObtenerInformacion extends Controller
{
    public function index()
    {
        $equipos = DB::select('select * from equipos');
        $salones = DB::select('select * from salones');
        $softwares = DB::table('contadorSoftware')
            ->orderBy('nroReservas', 'desc')
            ->get();
        $iterador = 0;

        if ($equipos && $salones && $softwares) {
            foreach ($equipos as $equipo) {
                    $unicosEquipos[$iterador] = $equipo;
                    $iterador++;
            }
            foreach ($salones as $salon) {
                if ($salon->id == 1) {
                    $unicosSalones[$iterador] = $salon;
                    $iterador++;
                }
            }
            if( preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"])){
                return response()->json($unicosEquipos);
            }
            return view('panelDeAdministrador\viewObtenerInformacion')->with(['equipos'=>$unicosEquipos,'salones'=>$unicosSalones, 'softwares'=>$softwares]);

        } else if ($salones && $softwares) {
            {
                $unicosEquipos = 0;
                $iterador = 0;
                foreach ($salones as $salon) {
                    if ($salon->id == 1) {
                        $unicosSalones[$iterador] = $salon;
                        $iterador++;
                    }
                }
                return view('panelDeAdministrador\viewObtenerInformacion')->with(['equipos'=>$unicosEquipos,'salones'=>$unicosSalones, 'softwares'=>$softwares]);
            }
        } else if ($equipos && $softwares){

                $unicosSalones = 0;
                $equipos = DB::select('select * from equipos');
                $iterador = 0;
                foreach ($equipos as $equipo) {
                    if ($equipo->id == 1 || $equipo->id == 15) {
                        $unicosEquipos[$iterador] = $equipo;
                        $iterador++;
                    }
                }
                return view('panelDeAdministrador\viewObtenerInformacion')->with(['equipos'=>$unicosEquipos,'salones'=>$unicosSalones, 'softwares'=>$softwares]);
        }
        else  {
            $unicosSalones = 0;
            $unicosEquipos = 0;
            return view('panelDeAdministrador\viewObtenerInformacion')->with(['equipos'=>$unicosEquipos,'salones'=>$unicosSalones, 'softwares'=>$softwares]);
        }
    }

    public function postEquipo(Request $request){
        if ($request->name){
            DB::table('equipos')
                ->where('id', $request->id)
                ->update(['name' => $request->name]);
        }elseif($request->ubicacion){
            DB::table('equipos')
                ->where('id', $request->id)
                ->update(['ubicacion' => $request->ubicacion]);
        }

        return redirect()->route('obtenerInformacion');
    }
    public function postSalon(Request $request){
        if ($request->name){
            DB::table('salones')
                ->where('id', $request->id)
                ->update(['name' => $request->name]);
        }elseif($request->ubicacion){
            DB::table('salones')
                ->where('id', $request->id)
                ->update(['ubicacion' => $request->ubicacion]);
        }

        return redirect()->route('obtenerInformacion');
    }
}
