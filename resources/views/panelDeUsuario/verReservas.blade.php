@extends('panelDeUsuario/panelDelUsuarioLayout')
@section ('title')
    Mis reservas
@endsection

@section('contenidoUsuario')
    <h1>Mis reservas: </h1>
    <hr>
    @if($reservasVigentes)
        <div class="container ">
            <h3>Reservas vigentes:</h3>
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover table-condensed ">
                    <tr class="info">
                        <td align="center"><strong>Fecha inicial</strong></td>
                        <td align="center"><strong>Fecha final</strong></td>
                        <td align="center"><strong>Ubicación</strong></td>
                        <td align="center"><strong>Equipo</strong></td>
                        <td align="center"><strong>Estado</strong></td>
                    </tr>
                    @foreach($reservasVigentes as $reservasVigente)
                        <tr>
                            <td align="center"> {{$reservasVigente->fechaInicial}}</td>
                            <td align="center"> {{$reservasVigente->fechaFinal}}</td>
                            <td align="center"> {{$reservasVigente->ubicacion}}</td>
                            <td align="center"> {{$reservasVigente->equipo}}</td>
                            @if($reservasVigente->estado==1)
                                <td align="center"><button class="btn btn-success" data-toggle="modal" data-target="#actualizarReservaModal" onClick="javascript:actualizarReserva({{ $reservasVigente->id }});">Confirmada</button></td></tr>
                            @else
                                <td align="center"><button class="btn btn-warning" data-toggle="modal" data-target="#actualizarReservaModal" onClick="javascript:actualizarReserva({{ $reservasVigente->id }});">Cancelada</button></td></tr>
                            @endif
                    @endforeach
                </table>
            </div>
        </div>
        @else
        <div class="row">
            <div class="col-md-4">
                <h3 class="alert alert-info">No tienes reservas activas.</h3>
            </div>
        </div>
    @endif
    <hr>
    @if($reservasExpiradas)
        <div class="container ">
            <h3>Reservas expiradas:</h3>
            <div class="table-responsive">
                <table class="table  table-bordered table-hover ">
                    <tr class="info active">
                        <td align="center"><strong>Fecha inicial</strong></td>
                        <td align="center"><strong>Fecha final</strong></td>
                        <td align="center"><strong>Ubicación</strong></td>
                        <td align="center"><strong>Equipo</strong></td>
                        <td align="center"><strong>Estado</strong></td>
                    </tr>
                    @foreach($reservasExpiradas as $reservasExpirada)
                        <tr>
                            <td align="center"> {{$reservasExpirada->fechaInicial}}</td>
                            <td align="center"> {{$reservasExpirada->fechaFinal}}</td>
                            <td align="center"> {{$reservasExpirada->ubicacion}}</td>
                            <td align="center"> {{$reservasExpirada->equipo}}</td>
                            <td align="center" class="alert alert-danger"> Expirada</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
        @else
        <div class="row">
            <div class="col-md-4">
                <h3 class="alert alert-info">No tienes reservas expiradas.</h3>
            </div>
        </div>
    @endif
    <div class="modal fade" id="actualizarReservaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">Modificar reserva</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{route('cancelarReserva')}}">
                        <div class="form-group">
                            <input type="hidden" name="usuario" value="{{ Auth::user()->name }}">
                            <input type="hidden"  name="id" class="form-control" id="identificadorReserva" value="Si ves esto, hay un error"  readonly>
                            <script>
                                function actualizarReserva(fecha) {
                                    document.getElementById("identificadorReserva").value= fecha;
                                }
                            </script>
                            <div class="container">
                                <label for="recipient-name" class="control-label">Nuevo estado de la reserva:</label>
                                <br>
                                <div class="row">

                                        <div class="col-md-3 ">
                                            <select class="form-control" name="estado">
                                            <option value="cancelar">Cancelar</option>
                                            <option value="confirmar">Confirmar</option>
                                            </select>
                                        </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">
                                Enviar
                            </button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>


@endsection