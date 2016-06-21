@extends('panelDeOrganizador/panelDeOrganizadorLayout')
@section ('title')
    Panel del organizador
@endsection

@section('contenidoOrganizador')
    <h1>Asignar reserva</h1>
    <?php
    if ($equipoHorarios){
    ?>
    <div class="table-responsive">
        <div class="container ">
            <table class="table table-striped table-bordered table-hover table-condensed ">
                <tr class="info">

                    <td align="center"><strong>Fecha</strong></td>
                    <td align="center"><strong>Ubicación</strong></td>
                    <td align="center"><strong>Nombre</strong></td>
                    <td align="center"><strong>Estado</strong></td>


                </tr>

                <?php
                foreach ($equipoHorarios as $equipoHorario){
                echo "<tr>";
                ?><td align="center"><?php echo $equipoHorario->horario."</td>";
                ?><td align="center"><?php echo $equipoHorario->ubicacion."</td>";
                ?><td align="center"><?php echo $equipoHorario->name."</td>";
                ?><td align="center"><?php
                    if ($equipoHorario->estado==0)
                    { ?>
                    <button class="btn btn-success" data-toggle="modal" data-target="#actualizarReservaModal" onClick="javascript:actualizarReserva({{$equipoHorario->id}});">Disponible
                        <?php }else  {?><button class="btn btn-danger" data-toggle="modal" data-target="#actualizarReservaModal" onClick="javascript:actualizarReserva({{ $equipoHorario->horario }});">Ocupado

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
                    <form class="form-horizontal" role="form" method="POST" action="{{route('asignarReserva')}}">
                        <div class="form-group">
                            <input type="hidden" name="organizador" value="{{ Auth::user()->name }}">
                            <input type="hidden"  name="id" class="form-control" id="identificadorReserva" value="Si ves esto, hay un error"  readonly>
                            <script>
                                function actualizarReserva(id) {
                                    document.getElementById("identificadorReserva").value= id;
                                }
                            </script>
                            <div class="container">
                                <label for="recipient-name" class="control-label">Código del estudiante:</label>
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="text"  name="usuario" class="form-control" id="identificadorReserva" placeholder="Ingrese el código del estudiante" required>
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
