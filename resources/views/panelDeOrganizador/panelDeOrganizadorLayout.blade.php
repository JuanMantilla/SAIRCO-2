@extends('layout')
@section('link')
    {{route('panelDeOrganizador')}}
@endsection
@section ('menu')

    <li>
        <a href="{{route('asignarReserva')}}">Asignar reserva</a>
    </li>
    <li>
        <a href="{{route('agregarOrganizadores')}}">Agregar organizadores</a>
    </li>

    <li>
        <a href="http://172.16.9.131/">Descargar el agente</a>
    </li>
@endsection
@section('content')

    @yield('contenidoOrganizador')


@endsection