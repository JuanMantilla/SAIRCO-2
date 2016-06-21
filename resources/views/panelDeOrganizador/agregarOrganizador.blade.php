@extends('panelDeOrganizador/panelDeOrganizadorLayout')
@section ('title')
    Agregar organizador
@endsection
@section('contenidoOrganizador')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Registrar un nuevo organizador</div>
                    <div class="panel-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> Hubo errores con los datos ingresados.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form class="form-horizontal" role="form" method="POST" action="{{route('agregarOrganizador')}}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="organizador" value="true">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Nombre</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">E-Mail</label>
                                <div class="col-md-6">
                                    <input type="email" class="form-control" name="email" value="{{ old('email') }}"required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Contraseña</label>
                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="password"required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Confirme su contraseña</label>
                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="password_confirmation"required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="close" class="btn btn-primary"  data-toggle="modal" data-target="#confirmacion">
                                        Registrar organizador
                                    </button>
                                </div>
                            </div>
                            <div class="modal fade" tabindex="-1" role="dialog" id="confirmacion">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="none" class="close" data-dismiss="modal"  aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title">Agregar organizador</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p>¿Está seguro de que quiere registrar a este usuario como organizador?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                                            <button type="submit" class="btn btn-primary" name="Registrarse">Sí, guardar cambios</button>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection