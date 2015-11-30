@extends('panelDeAdministrador/panelDeAdministradorLayout')
@section ('title')
    Salones agregados
@endsection

@section('contenidoAdministrador')

    <?php
    if($valor==1){

        echo "<h3>¡Salones agregados exitosamente!</h3>";

    }
    else echo "Ya se agregaron todos los salones; cuando se agreguen más salones a la base de datos por medio de OCS, asócielos a <strong>SAIRCO</strong> por medio del link 'enlazar salones'.";
    ?>
@endsection
