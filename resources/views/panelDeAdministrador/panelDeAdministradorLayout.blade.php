@extends('layout')
@section('link')
    {{route('panelDeAdministrador')}}
@endsection
@section ('menu')



    <li>
        <a href="#">Cambiar tus datos</a>
    </li>
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
        <a href="{{route('actualizarRecurso')}}">Actualizar recursos</a>
    </li>
    <li>
        <a href="{{route('obtenerInformacion')}}">Obtener información</a>
    </li>

    <li>
        <a href="{{route('agregarAdministradores')}}">Agregar administradores</a>
    </li>

    <li>
        <a href="http://172.16.9.131/">Descargar el agente</a>
    </li>
@endsection
@section('content')

    @yield('contenidoAdministrador')


@endsection