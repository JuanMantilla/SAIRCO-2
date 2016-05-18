@extends('panelDeAdministrador/panelDeAdministradorLayout')
@section ('title')
    Eiminar equipo
@endsection

@section('contenidoAdministrador')

    <form class="form-horizontal" role="form" method="POST" action="{{route('equipoEliminado')}}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="form-group">
            <label class="col-md-4 control-label">Ingrese el id del equipo que quiere eliminar</label>
            <br/>
            <br/>
            <div class="col-md-6">
                <input type="text" class="form-control" name="id" value="{{ old('id') }}">
            </div>
            ID del equipo a eliminar
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