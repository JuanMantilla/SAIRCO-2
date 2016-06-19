@extends('panelDeUsuario/panelDelUsuarioLayout')
@section ('title')
    Cancelar reserva
@endsection

@section('contenidoUsuario')

    <form role="form" method="POST" action="{{route('cancelarReserva')}}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <h2>Selecciona la fecha de la reserva que quieres cancelar</h2>
        <div class="input-append date form_datetime">
            <input size="16" type="text" name="fecha"value="" readonly>
            <span class="add-on"><i class="icon-th"><span class="glyphicon glyphicon-calendar"></span></i></span>
        </div>

        <script type="text/javascript">
            $(".form_datetime").datetimepicker({
                format: "dd MM yyyy - hh",
                autoclose: true,
                todayBtn: true,
                pickerPosition: "bottom-left"
            });
        </script>
        <input type="hidden" name="usuario" value="{{ Auth::user()->name }}">
        <h3>¿Estas seguro de que quieres cancelar tu reserva?</h3>
        <input type="submit">
    </form>
@endsection