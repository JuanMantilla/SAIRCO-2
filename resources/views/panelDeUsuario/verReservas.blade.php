@extends('panelDeUsuario/panelDelUsuarioLayout')
@section ('title')
    Mis reservas
@endsection

@section('contenidoUsuario')
    <ul class="dropdown-menu">

        <li>
            hola
        </li>
        <li>
            asd
        </li>
    </ul>
    <h1>Mis reservas: </h1>

    <?php
    if ($reservas !=0){
    ?>
    <div class="table-responsive">
        <div class="container ">
            <table class="table table-striped table-bordered table-hover table-condensed ">
                <tr class="info">

                    <td align="center"><strong>Fecha inicial</strong></td>
                    <td align="center"><strong>Fecha final</strong></td>

                    <td align="center"><strong>Ubicación</strong></td>
                    <td align="center"><strong>Equipo</strong></td>

                    <td align="center"><strong>Estado</strong></td>


                </tr>

                <?php
                foreach ($reservas as $reserva){
                echo "<tr>";
                ?><td align="center"><?php echo $reserva->fechaInicial."</td>";
                ?><td align="center"><?php echo $reserva->fechaFinal."</td>";
                ?><td align="center"><?php echo $reserva->ubicacion."</td>";
                ?><td align="center"><?php echo $reserva->equipo."</td>";
                ?><td align="center"><?php
                if ($reserva->estado==0)
                { ?>
                    <button class="btn btn-warning" data-toggle="modal" data-target="#actualizarReservaModal" onClick="javascript:actualizarReserva({{ $reserva->id }});">Cancelada
                <?php }else  {?><button class="btn btn-primary" data-toggle="modal" data-target="#actualizarReservaModal" onClick="javascript:actualizarReserva({{ $reserva->id }});">Confirmada

                </td></button>
                <?php
                echo "</tr>";
                }
                    }
                ?>
            </table>
            <hr>
        </div>
    </div>
    <?php
    }else {?>
    <div class="container"><h3>No tienes reservas aún</h3></div>
    <?php }?>
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
                            <input type="text"  name="id" class="form-control" id="identificadorReserva" value="Si ves esto, hay un error"  readonly>
                            <script>
                                function actualizarReserva(fecha) {
                                    document.getElementById("identificadorReserva").value= fecha;
                                }
                            </script>
                            <div class="container">
                                <label for="recipient-name" class="control-label">Nuevo estado de la reserva:</label>
                                <br>
                                <select class="form-control" name="estado">
                                    <option value="cancelar">Cancelar</option>
                                    <option value="confirmar">Confirmar</option>
                                </select>

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