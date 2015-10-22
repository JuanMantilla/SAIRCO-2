@extends('acercaDe/acercaDeLayout')
    @section ('title')
        Acerca de SAIRCO
    @endsection
    @section('ContenidoAcercaDe')
        <h2 id="bienvenido">Personas involucradas en <strong>SAIRCO</strong>:</h2>
        <hr><A HREF="{{route('JuanMartinez')}}"><img src="imgs/juan_martinez.PNG" class="imagen" alt="Juan Martinez"></A>Juan Carlos Martinez Santos<br/>
        <hr><A HREF="{{route('EdwinPuertas')}}"><img src="imgs/Edwin Puertas.PNG" class="imagen" alt="Edwin Puertas"></A>Edwin Alexander Puertas del Castillo<br/>
        <hr><A HREF="{{route('JuanMantilla')}}"><img src="imgs/Juan Mantilla.PNG" class="imagen" alt="Juan Mantilla"></A>Juan Sebastian Mantilla<br/>
        <hr>
    @endsection