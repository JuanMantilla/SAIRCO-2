@extends('panelDeAdministrador/panelDeAdministradorLayout')
@section ('title')
    Salones agregados
@endsection

@section('contenidoAdministrador')
    <h1>Salones en la base de datos:</h1>

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
