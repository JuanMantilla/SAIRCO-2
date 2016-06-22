@extends('panelDeUsuario/panelDelUsuarioLayout')
@section ('title')
    Panel del usuario
@endsection

@section('contenidoUsuario')
    <h2 id="bienvenido">Bienvenido a tu panel de usuario, acá podrás:</h2>
    <ul>
        <li>Reservar un equipo*</li>
        <li>Gestionar tus reservas</li>
    </ul>
    *Con fechas exactas, por ejemplo: 2016-06-21 08:00, además las horas disponibles para reservas son desde las 8:00am hasta las 8:00pm
@endsection