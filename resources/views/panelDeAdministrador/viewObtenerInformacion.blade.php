@extends('panelDeAdministrador/panelDeAdministradorLayout')
@section ('title')
    Información
@endsection

@section('contenidoAdministrador')
    <h1>Obtener información</h1>
    <div class="container">
        <h3><strong>Estadísiticas de software</strong></h3>
    </div>
    <?php
            if ($softwares){
                ?>
            <div class="table-responsive">
        <div class="container ">
            <table class="table table-striped table-bordered table-hover table-condensed">
                <tr>
                    <th>
                        Nombre
                    </th>
                    <th>
                        Numero de reservas
                    </th>

                </tr>

                <?php
                foreach ($softwares as $software){
                if ($software->nroReservas < 10){
                ?>
                <tr class="danger">
                <?php
                echo "<td>".$software->name."</td>";
                echo "<td>".$software->nroReservas."</td>";
                echo "</tr>";
                }else{
                    echo "<tr>";
                    echo "<td>".$software->name."</td>";
                    echo "<td>".$software->nroReservas."</td>";
                    echo "</tr>";}
                }

                ?>
            </table>
            <hr>
        </div>
    </div>
    <?php
            }else echo "No hay software en la base de datos";
        ?>



    <div class="container">
        <div class="row">
            <div class="col-md-5 ">
                <h3><strong>Equipos en la base de datos:</strong></h3>
            </div>
            <div class="col-md-4 ">
                <br>
                    <button type="button" class="btn btn-info " data-toggle="modal" data-target="#infoEquiposModal" aria-label="Left Align" >
                        <span class="glyphicon glyphicon-info-sign glyphicon-align-left" aria-hidden="true"></span>
                    </button>
            </div>
        </div>
    </div>
    <?php
            if ($equipos){
               ?>
            <div class="table-responsive">
        <div class="container ">
            <table class="table table-striped table-bordered table-hover table-condensed ">
                <tr class="info">

                    <td align="center"><strong>Nombre</strong></td>

                    <td align="center"><strong>Ubicación</strong></td>

                    <td align="center"><strong>Número de reservas</strong></td>


                </tr>

                <?php
                foreach ($equipos as $equipo){
                echo "<tr>";
                ?><td align="center"><button class="btn btn-primary" data-toggle="modal" data-target="#actualizarNombreEquipoModal" onClick="javascript:funcion({{ $equipo->id }});"><?php echo $equipo->name."</td></button> ";
                        ?><td align="center"><button class="btn btn-primary" data-toggle="modal" data-target="#actualizarUbicacionEquipoModal" onClick="javascript:ubicacion({{ $equipo->id }});"><?php echo $equipo->ubicacion."</td></button> ";
                        ?><td align="center"><?php echo $equipo->nroReservas."</td>";
                echo "</tr>";
                }
                ?>
            </table>
            <hr>
        </div>
    </div>
    <?php
            }else {?>
    <div class="container">No hay equipos en la base de datos</div>
    <?php }?>



    <div class="container">
        <div class="row">
            <div class="col-md-5 ">
                <h3><strong>Salones en la base de datos:</strong></h3>
            </div>
            <div class="col-md-4 ">
                <br>
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#infoSalonesModal" aria-label="Left Align" >
                    <span class="glyphicon glyphicon-info-sign glyphicon-align-left" aria-hidden="true"></span>
                </button>
            </div>
        </div>
    </div>
    <?php
        if ($salones){
            ?>
        <div class="table-responsive">
        <div class="container ">
            <table class="table table-striped table-bordered table-hover table-condensed ">
                <tr class="info">

                    <td align="center"><strong>Nombre</strong></td>

                    <td align="center"><strong>Ubicación</strong></td>

                </tr>

                <?php
                foreach ($salones as $salon){
                echo "<tr>";
                ?><td align="center"><button class="btn btn-primary" data-toggle="modal" data-target="#actualizarNombreSalonModal" onClick="javascript:actualizarNombreEquipo({{ $salon->id }});"><?php echo $salon->name."</td></button> ";
                ?><td align="center"><?php echo $salon->ubicacion."</td>";
                echo "</tr>";
                }
                ?>
            </table>
            <hr>
        </div>
    </div>
    <?php
        }else {?>
    <div class="container">No hay salones en la base de datos</div>
    <?php }?>


    <div class="modal fade" id="actualizarNombreEquipoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">Actualizar el nombre del equipo</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{route('obtenerInformacion')}}">
                        <div class="form-group">
                            <input type="hidden"  name="id" class="form-control" id="id" value="Si ves esto, hay un error"  readonly>
                            <script>
                                function funcion(id) {
                                    document.getElementById("id").value= id;
                                }
                            </script>
                            <div class="container">
                                <label for="recipient-name" class="control-label">Nuevo nombre del equipo:</label>
                                <br>
                                <input type="text" class="form-control" name="name" placeholder="Ingresa acá el nuevo nombre para el equipo" value="{{ old('name') }}">
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
    <div class="modal fade" id="actualizarUbicacionEquipoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">Actualizar la ubicación del equipo</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{route('obtenerInformacion')}}">
                        <div class="form-group">
                            <input type="hidden"  name="id" class="form-control" id="identificador" value="Si ves esto, hay un error"  readonly>
                            <script>
                                function ubicacion(id) {
                                    document.getElementById("identificador").value= id;
                                }
                            </script>
                            <div class="container">
                                <label for="recipient-name" class="control-label">Nueva ubicación del equipo:</label>
                                <br>
                                <input type="text" class="form-control" name="ubicacion" placeholder="Ingresa la nueva ubicación para el equipo" value="{{ old('ubicacion') }}">
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
    <div class="modal fade" id="actualizarNombreSalonModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">Actualizar el nombre del salón</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{route('obtenerInformacionSalon')}}">
                        <div class="form-group">
                            <input type="hidden"  name="id" class="form-control" id="identificadorSalonNombre" value="Si ves esto, hay un error"  readonly>
                            <script>
                                function actualizarNombreEquipo(id) {
                                    document.getElementById("identificadorSalonNombre").value= id;
                                }
                            </script>
                            <div class="container">
                                <label for="recipient-name" class="control-label">Nuevo nombre del salón:</label>
                                <br>
                                <input type="text" class="form-control" name="name" placeholder="Ingresa nombre para el salón" value="{{ old('name') }}">
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
    <div class="modal fade" id="infoEquiposModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel"><span class="glyphicon glyphicon-info-sign glyphicon-align-left" aria-hidden="true"></span>  Información</h4>
                </div>
                <div class="modal-body">
                    <p align="justify">
                        En esta sección de equipos podrás ver toda la información que tenemos de los equipos, además, encontrarás que hay campos que tienen botones,
                        cuando hagas click en estos botones, podrás modificar el campo que elegiste del equipo al que hayas dado click. <br>Por ejemplo, si seleccionaste
                        el campo nombre del equipo 1, te pedirá el nuevo nombre para el equipo 1; si seleccionas el campo ubicación del equipo 2, te pedirá la nueva
                        ubicación del equipo 2.
                    </p>
                </div>

            </div>
        </div>
    </div>
    <div class="modal fade" id="infoSalonesModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel"><span class="glyphicon glyphicon-info-sign glyphicon-align-left" aria-hidden="true"></span>  Información</h4>
                </div>
                <div class="modal-body">
                    <p align="justify">
                        En esta sección de salones podrás ver toda la información que tenemos de los salones, además, encontrarás que hay campos que tienen botones,
                        cuando hagas click en estos botones, podrás modificar el campo que elegiste del salón al que hayas dado click. <br>Por ejemplo, si seleccionaste
                        el campo nombre del salón 1, te pedirá el nuevo nombre para el salón 1; si seleccionas el campo ubicación del salón 2, te pedirá la nueva
                        ubicación del salón 2.
                    </p>
                </div>

            </div>
        </div>
    </div>
    @endsection
