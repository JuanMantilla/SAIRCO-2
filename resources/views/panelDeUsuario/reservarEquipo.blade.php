@extends('panelDeUsuario/panelDelUsuarioLayout')
@section ('title')
    Reservar equipo
@endsection

@section('contenidoUsuario')
    <form role="form" method="POST" action="{{route('reservarEquipo')}}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        ¿Para cuando necesitas el equipo?
        <div class="input-append date form_datetime">
            <input size="16" type="text" name="fecha"value="" readonly>
            <span class="add-on"><i class="icon-th"></i></span>
        </div>

        <script type="text/javascript">
            $(".form_datetime").datetimepicker({
                format: "dd MM yyyy - hh:ii",
                autoclose: true,
                todayBtn: true,
                pickerPosition: "bottom-left"
            });
        </script>
        Selecciona el hardware que necesitas:
        <br>
        <input type="checkbox" name="software1" value="Google Chrome"> Procesador intel i7 de 2.4 Ghz
        <br>
        <input type="checkbox" name="software1" value="Google Chrome"> Procesador i5 de 3.3 Ghz
        <br>
        <input type="checkbox" name="software1" value="Google Chrome"> Base de datos de Oracle
        <br>
        <input type="checkbox" name="software1" value="Google Chrome"> 2 GB of ram
        <br>
        <input type="checkbox" name="software1" value="Google Chrome"> Puerto USB 2.0
        <br>
        <input type="checkbox" name="software1" value="Google Chrome"> Puerto serial
        <br>
        <input type="hidden" name="usuario" value="{{ Auth::user()->name }}">
        Selecciona el software que necesitas:
        <br>
        <input type="checkbox" name="software1" value="Google Chrome"> Navegador de internet
        <br>
        <input type="checkbox" name="software2" value="Microsoft Office"> Matlab
        <br>
        <input type="checkbox" name="software1" value="Google Chrome"> Microsoft Office
        <br>
        <input type="checkbox" name="software1" value="Google Chrome"> Compilador de C++
        <br>
        <input type="checkbox" name="software1" value="Google Chrome"> Compilador de python
        <br>
        <input type="checkbox" name="software1" value="Google Chrome"> Compilador de Java
        <br>
        <input type="checkbox" name="software1" value="Google Chrome"> Máquinas virtuales
        <br>
        <input type="checkbox" name="software1" value="Google Chrome"> Base de datos de Oracle
        <br>
        <input type="submit" name="">
    </form>
    <hr>
@endsection
