@extends('panelDeAdministrador/panelDeAdministradorLayout')
@section ('title')
    Información
@endsection

@section('contenidoAdministrador')
    <h1>Obtener informacion</h1>
    <h3>Equipos en la base de datos:</h3>
        <?php
        foreach ($equipos as $resultados) {

                echo "<strong> ID </strong>del equipo: ".$resultados->id."<br/>";
                echo "<strong>Nombre </strong>del equipo: ".$resultados->name."<br/>";
                echo "<strong>Ubicación </strong>del equipo: ".$resultados->ubicacion."<br/>";
                echo "<strong>Horario </strong>del equipo: ".$resultados->horario."<br/>";
                echo "<strong>Estado </strong>del equipo: ".$resultados->estado."<br/>";
                echo "<hr>";
        }
        ?>
    <h3>Salones en la base de datos:</h3>
    <?php
    foreach ($salones as $resultados) {

        echo "<strong> ID </strong>del salón: ".$resultados->id."<br/>";
        echo "<strong>Nombre </strong>del salón: ".$resultados->name."<br/>";
        echo "<strong>Ubicación </strong>del salón: ".$resultados->ubicacion."<br/>";
        echo "<strong>Horario </strong>del salón: ".$resultados->horario."<br/>";
        echo "<strong>Estado </strong>del salón: ".$resultados->estado."<br/>";
        echo "<hr>";
    }
    ?>
    @endsection
