@extends('layout')
@section('link')
    {{route('home')}}
@endsection
    @section ('title')
        Login
    @endsection
    @section ('menu')
        <li><a href="{{route('acercaDe')}}">Personas involucradas</a></li>
    @endsection
    @section('content')
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">Ingresar</div>
                        <div class="panel-body">
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    Por favor corrige los siguientes errores:<br><br>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form class="form-horizontal" role="form" method="POST" action="{{route("login")}}">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                <div class="form-group">
                                    <label class="col-md-4 control-label">{{ trans('validation.attributes.email') }}</label>
                                    <div class="col-md-6">
                                        <input name="email" type="email" value="{{old('email')}}" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label">{{ trans('validation.attributes.password') }}</label>
                                    <div class="col-md-6">
                                        <input name="password" type="password" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="remember"> Recuérdame
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary" style="margin-right: 15px;" name="Ingresar">
                                            Ingresar
                                        </button>

                                        <a href="/password/email">¿Olvidó su contraseña?</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection