@extends('layout')
@section('link')
    {{route('panelDeAdministrador')}}
@endsection
@section ('menu')



    <li>
        <a href="#">Cambiar tus datos</a>
    </li>
    <li>
        <a href="{{route('viewAgregarEquipo')}}">Agregar equipo de computo</a>
    </li>
    <li>
        <a href="{{route('viewAgregarSalon')}}">Enlazar todos los salones de cómputo</a>
    </li>
    <li>
        <a href="{{route('viewEliminarEquipo')}}">Eliminar equipo de computo </a>
    </li>
    <li>
        <a href="{{route('viewEliminarSalon')}}">Eliminar salon de computo</a>
    </li>
    <li>
        <a href="{{route('actualizarRecurso')}}">Actualizar recursos</a>
    </li>
    <li>
        <a href="{{route('obtenerInformacion')}}">Obtener informacion</a>
    </li>
@endsection
@section('content')

        @yield('contenidoAdministrador')


@endsection