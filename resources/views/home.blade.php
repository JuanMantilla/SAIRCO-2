@extends('layout')

    @section ('menu')
        @if (Auth::guest())
            <li><a href="{{route('login')}}">Login</a></li>
            <li><a href="{{route('register')}}">Register</a></li>
        @else
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="{{route('logout')}}">Salir</a></li>
                </ul>
            </li>
        @endif
            <li><a href="#">Que es Sairco?</a></li>
    @endsection
    @section('content')
        <h2 id="bienvenido">Bienvenido a Sairco!</h2>
    @endsection