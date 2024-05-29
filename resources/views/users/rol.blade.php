@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
        {{ __('Asignacion de Roles a Usuarios') }}
    </h2>
@stop

@section('content')
    <div class="row justify-content-center">
        <div class="card" style="width: 40rem;">
            <div class="card-header text-center">Nombre del usuario: <b>{{ $users->personal->nombres }}</b> </div>
            <div class="card-body">
                <div class="card">
                    <div class="card-header text-center "> Informacion Personal</div>
                    <div class="card-body">
                        <div class="col-md-12">
                            <div class="form-group">
                                <strong>Correo:</strong>
                                {{ $users->personal->correo}}
                            </div>
                            <div class="form-group">
                                <strong>direccion:</strong>
                                {{ $users->personal->direccion}}
                            </div>
                            <div class="form-group">
                                <strong>Telefono:</strong>
                                {{ $users->personal->telefono}}
                            </div>
                        </div>
                    </div>
                </div>
               <div class="card">
                <div class="card-header text-center">Roles Asignados</div>
                <div class="card-body  ">
                    {!! Form::model($users, ['route' => ['usuarios.update', $users],'method'=>'put']) !!}
                    @foreach ($roles as $role )
                        <div class=" flex-row col-md-6 mb-1  ">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    {!! Form::checkbox('roles[]', $role->id, $users->hasAnyRole($role->id) ? : false , ['class'=>'mr-1']) !!}
                                    {{$role->name}}
                                </li>
                              </ul>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="float-right">
                {!! Form::submit('Asignar Roles', ['class'=>'btn btn-success mt-3']) !!}
                <a class="btn btn-success mt-3" href="{{ route('usuarios.index') }}"> {{ __('Regresar') }}</a>
            </div>
            {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
