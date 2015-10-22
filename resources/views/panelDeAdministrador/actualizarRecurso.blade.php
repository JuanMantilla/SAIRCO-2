<!DOCTYPE html>

    <head>
    <meta char set="UTF-8"/>
    </head>
    <form class="form-horizontal" role="form" method="POST" action="{{route('actualizarRecurso')}}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="form-group">
            <label class="col-md-4 control-label">¿Qué recuso quiere actualizar?</label>
            <div class="col-md-6">
                <input type="text" class="form-control" name="recurso" value="{{ old('recurso') }}">
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                    Enviar
                </button>
            </div>
        </div>
    </form>
</html>