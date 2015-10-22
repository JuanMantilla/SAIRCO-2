@extends('layout')
@section('link')
    {{route('home')}}
@endsection
@section ('menu')
@if (Auth::guest())
<li><a href="{{route('login')}}">Ingresar</a></li>
<li><a href="{{route('register')}}">Registrarse</a></li>
@else
<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
    <ul class="dropdown-menu" role="menu">
        <li><a href="{{route('logout')}}">Salir</a></li>
    </ul>
</li>
@endif
<li><a href="{{route('acercaDe')}}">Personas involucradas</a></li>
@endsection
  @section('content')
  <div class="centrado">
  @yield('ContenidoAcercaDe')
  </div>

@endsection