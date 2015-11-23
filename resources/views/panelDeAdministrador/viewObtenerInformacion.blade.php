@extends('panelDeAdministrador/panelDeAdministradorLayout')
@section ('title')
    Información
@endsection

@section('contenidoAdministrador')
    <h1>Obtener información</h1>
    <h3><strong>Equipos en la base de datos:</strong></h3>
        <?php
        if ($equipos != 0){

            foreach ($equipos as $equipo) {

                    echo "<strong> ID </strong>del equipo: ".$equipo->id."<br/>";
                    echo "<strong>Nombre </strong>del equipo: ".$equipo->name."<br/>";
                    echo "<strong>Ubicación </strong>del equipo: ".$equipo->ubicacion."<br/>";
                    echo "<hr>";
            }
        }else echo "No hay equipos en la base de datos"
        ?>
    <h3><strong>Salones en la base de datos:</strong></h3>
    <?php
    if($salones != 0){
        foreach ($salones as $salon) {

            echo "<strong> ID </strong>del salón: ".$salon->id."<br/>";
            echo "<strong>Nombre </strong>del salón: ".$salon->name."<br/>";
            echo "<strong>Ubicación </strong>del salón: ".$salon->ubicacion."<br/>";
            echo "<hr>";
        }
    }else echo "No hay salones en la base de datos"
    ?>
    @endsection
