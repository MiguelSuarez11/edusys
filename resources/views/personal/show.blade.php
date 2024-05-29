@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
        {{ __('Datos del personal') }}
    </h2>
@stop

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Datos Completos de: ') }} <b>{{$personal->nombres}} {{$personal->apellidos}}</b> </span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('personal.index') }}"> {{ __('Regresar') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <strong>Tipo Documento:</strong>
                                    {{ optional($personal->tipoDocumento)->nombre }}
                                </div>
                                <div class="form-group">
                                    <strong>Nombres:</strong>
                                    {{ $personal->nombres }}
                                </div>
                                <div class="form-group">
                                    <strong>Direccion:</strong>
                                    {{ $personal->direccion }}
                                </div>
                                <div class="form-group">
                                    <strong>Fech Nacimiento:</strong>
                                    {{ $personal->fech_nacimiento }}
                                </div>

                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <strong>Numero Documento:</strong>
                                    {{ $personal->numero_documento }}
                                </div>
                                <div class="form-group">
                                    <strong>Apellidos:</strong>
                                    {{ $personal->apellidos }}
                                </div>
                                <div class="form-group">
                                    <strong>Telefonos:</strong>
                                    {{ $personal->telefono }}
                                </div>
                                <div class="form-group">
                                    <strong>Genero:</strong>
                                    {{ optional($personal->generos)->nombre }}
                                </div>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <strong>Correo:</strong>
                                    {{ $personal->correo }}
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <strong>Estado:</strong>
                                    @if ($personal->estado == 1)
                                        Activo
                                    @else
                                        Inactivo
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
