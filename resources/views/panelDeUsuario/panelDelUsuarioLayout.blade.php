@extends('layout')
@section('link')
    {{route('panelDeUsuario')}}
@endsection
@section ('menu')



    <li>
        <a href="{{route('panelDeUsuario')}}">Panel de usuario</a>
    </li>
    <li>
        <a href="{{route('reservarEquipo')}}">Reserva un equipo</a>
    </li>
    <li>
        <a href="{{route('verReservas')}}">Gestionar reservas</a>
    </li>

@endsection
@section('content')
    <div class="centrado">
        @yield('contenidoUsuario')
    </div>

@endsection