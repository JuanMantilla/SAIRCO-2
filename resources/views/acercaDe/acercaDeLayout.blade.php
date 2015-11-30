@extends('layout')
@section('link')
    {{route('home')}}
@endsection
@section ('menu')
<li><a href="{{route('acercaDe')}}">Personas involucradas</a></li>
@endsection
  @section('content')
  <div class="centrado">
  @yield('ContenidoAcercaDe')
  </div>

@endsection