@extends('layout')
@section('link')
    {{route('home')}}
@endsection
    @section ('title')
        Inicio
    @endsection
    @section ('menu')

            <li><a href="{{route('acercaDe')}}" name="Personas involucradas">Personas involucradas</a></li>
    @endsection
    @section('content')
        <h2 id="bienvenido">¡Bienvenido a SAIRCO!</h2><br/>

        <p>
            <div class="texto">
                El Sistema de Asignación Inteligente de Recursos de CÓmputo (SAIRCO) es un sistema creado por
                integrantes de la Universidad Tecnológica de Bolívar que le permitirá a la misma gestionar todas las reservas de
                equipos y salones de cómputo, teniendo en cuenta las necesidades de los usuarios: día y hora,
                <strong>hardware y software</strong> que vaya a necesitar de una manera ágil, óptima y segura. Permite
                gestionar una actualización de hardware o software y así mismo debe permitir generar un inventario
                actualizado de todo el hardware y software de los equipos de cómputo ligados a SAIRCO.
            </div>

        </p>

    @endsection