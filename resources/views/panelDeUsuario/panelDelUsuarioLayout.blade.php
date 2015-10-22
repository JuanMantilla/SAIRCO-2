@extends('layout')
@section('link')
    {{route('panelDeUsuario')}}
@endsection
@section ('menu')



    <li>
        <a href="{{route('panelDeUsuario')}}">Panel de usuario</a>
    </li>
    <li>
        <a href="#">Cambia tus datos</a>
    </li>
    <li>
        <a href="{{route('reservarEquipo')}}">Reserva un equipo</a>
    </li>
    <li>
        <a href="{{route('cancelarReserva')}}">Cancela una reserva</a>
    </li>
@endsection
@section('content')
    <div class="centrado">
        @yield('contenidoUsuario')
    </div>

@endsection