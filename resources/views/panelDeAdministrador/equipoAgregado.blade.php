@extends('panelDeAdministrador/panelDeAdministradorLayout')
@section ('title')
    Equipos agregados
@endsection

@section('contenidoAdministrador')
    <?php
    if($valor==1){
        echo "<h3>Equipos agregados exitosamente</h3>";

    }
    else echo "Ya se agregaron todos los equipos; cuando se agreguen más equipos a la base de datos por medio de OCS, asócielos a <strong>SAIRCO</strong> por medio del link 'agregar eqipos'.";
    ?>
@endsection
