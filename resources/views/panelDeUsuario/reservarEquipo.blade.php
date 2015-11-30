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
        <input type="hidden" name="usuario" value="{{ Auth::user()->name }}">
        Selecciona el software que necesitas:
        <br>
        <input type="checkbox" name="software1" value="Google Chrome"> Google Chrome
        <br>
        <input type="checkbox" name="software2" value="XAMPP"> XAMPP
        <br>

        <input type="submit" name="">
    </form>
    <hr>
@endsection
