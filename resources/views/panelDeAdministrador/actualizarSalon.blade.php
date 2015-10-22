<!DOCTYPE html>


<form class="form-horizontal" role="form" method="POST" action="{{route('salonActualizado')}}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <div class="form-group">
        <label class="col-md-4 control-label">Ingrese los datos que quiere actualizar</label>
        <div class="col-md-6">
            <input type="text" class="form-control" name="id" value="{{ old('id') }}">
        </div>

        <div class="col-md-6">
            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
        </div>

        <div class="col-md-6">
            <input type="text" class="form-control" name="ubicacion" value="{{ old('ubicacion') }}">
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