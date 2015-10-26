@extends('panelDeAdministrador/panelDeAdministradorLayout')
@section ('title')
    Equipos agregados
@endsection

@section('contenidoAdministrador')
    <h2>Equipos agregados:</h2>
    <?php
    foreach ($equipo as $resultados) {
            echo "<strong> ID </strong>del equipo: ".$resultados->id."<br/>";
            echo "<strong>Nombre </strong>del equipo: ".$resultados->name."<br/>";
            echo "<strong>Ubicación </strong>del equipo: ".$resultados->ubicacion."<br/>";
            echo "<hr>";
    }
    ?>
@endsection