@extends('panelDeUsuario/panelDelUsuarioLayout')
@section ('title')
    Mis reservas
@endsection

@section('contenidoUsuario')
    <h1>Mis reservas: </h1>
    <?php
    if ($reservas != 0){
        foreach ($reservas as $reserva) {
            echo "<strong> Fecha: </strong>".$reserva->fecha."<br/>";

            if ($reserva->estado==0)
            { echo "<strong> Estado: </strong> cancelada<br/>";
            }else echo "<strong> Estado: </strong> Confirmada<br/>";
            echo "<strong> Ubicacion: </strong>".$reserva->ubicacion."<br/>";
            echo "<strong> Equipo: </strong>".$reserva->equipo."<br/>";
            echo "<hr>";
        }
    }else {echo "No tienes reservas en este momento";}
    ?>
@endsection