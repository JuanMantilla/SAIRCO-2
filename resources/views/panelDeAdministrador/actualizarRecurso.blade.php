@extends('panelDeAdministrador/panelDeAdministradorLayout')
@section ('title')
    Actualizar recurso
@endsection

@section('contenidoAdministrador')
    <form class="form-horizontal" role="form" method="POST" action="{{route('actualizarRecurso')}}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="form-group">
            <label class="col-md-4 control-label">¿Qué recuso quiere actualizar?</label>

        </div>
        <div class="centrado">
            <input type="radio" name="recurso" value="equipo" checked>Equipo
            <br>
            <input type="radio" name="recurso" value="salon">Salón
        </div>


        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                    Enviar
                </button>
            </div>
        </div>
    </form>

    @endsection
