@extends('panelDeUsuario/panelDelUsuarioLayout')
@section ('title')
    Reservar equipo
@endsection

@section('contenidoUsuario')
    <form role="form" method="POST" action="{{route('reservarEquipo')}}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <table style="width:100%">
                <h3>Fecha de la reserva: </h3>
                <tr>
                    <td>¿Desde cuando necesitas el equipo?
                    <div class="input-append date form_datetime" col="1">
                        <input class= "form-control"size="16" type="text" name="fecha"value="" readonly placeholder="Fecha inicial">
                            <span class="add-on">
                                <i class="icon-th"><span class="glyphicon glyphicon-calendar"></span></i>
                            </span>
                    </div>
                    </td>
                    <td>¿Hasta cuando necesitas el equipo?
                    <div class="input-append date form_datetime">
                        <input class="form-control"size="16" type="text" name="fecha2"value="" readonly  placeholder="Fecha final">
                        <span class="add-on">

                            <i class="icon-th"><span class="glyphicon glyphicon-calendar"></span></i>
                        </span>
                    </div>
                    </td>
                </tr>
            </table>

        </div>

        <hr>
        <h3>Software de la reserva: </h3>

        <br>
        <input type="checkbox" name="software1" value="Google Chrome"> Navegador de internet
        <br>
        <br>
        <input type="checkbox" name="software2" value="Notepad++"> Notepad++
        <br>
        <br>
        <input type="checkbox" name="software3" value="Microsoft Office Professional Plus 2013"> Office
        <br>
        <input type="hidden" name="usuario" value="{{ Auth::user()->name }}">
        <br>
        <input type="submit" name="">
    </form>
    <hr>
@endsection