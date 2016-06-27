@extends('layout')
@section('link')
    {{route('panelDeAdministrador')}}
@endsection
@section ('menu')



    <li>
        <a href="{{route('viewAgregarEquipo')}}">Enlazar los equipos de cómputo</a>
    </li>
    <li>
        <a href="{{route('viewAgregarSalon')}}">Enlazar los salones de cómputo</a>
    </li>
    <li>
        <a href="{{route('viewEliminarEquipo')}}">Eliminar equipos de cómputo </a>
    </li>
    <li>
        <a href="{{route('viewEliminarSalon')}}">Eliminar salones de cómputo</a>
    </li>
    <li>
        <a href="{{route('obtenerInformacion')}}">Gestionar información</a>
    </li>
    <li>
        <a href="{{route('agregarAdministradores')}}">Agregar administradores</a>
    </li>
@endsection
@section('content')

    @yield('contenidoAdministrador')


@endsection