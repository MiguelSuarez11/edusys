@extends('adminlte::page')

@section('title', 'Pagina - Principal')

@section('content_header')
<div class="container text-center">
    <h1 class="mb-4">¡Bienvenido al Sistema de Gestion EduSys+!</h1>
    <h5 class="mb-4"> Coordial saludo,  <br><b>{{ Auth::user()->name }}</b></h5>
<div class="card">
    <div class="card-body">
    <p class="lead">
        -- Frase del dia --<br>
        <b>"{{$data['phrase']}}"</b>
      <p class="text-sm text-muted">Autor: {{$data['author']}}</p>
    </p>
    </div>
@stop

@section('content')
@can('admin.dashboard')
<div class="row">
    <div class="col-md-3">
        <x-adminlte-small-box title="{{$personalR}}" text="Personal" icon="fas fa-address-card text-black"
            theme="info" url="{{route('personal.index')}}" url-text="Ver todos.."/>
    </div>
    <div class="col-md-3">
        <x-adminlte-small-box title="{{$users}}" text="Usuarios" icon="fas fa-users text-black"
            theme="info"  url="{{route('usuarios.index')}}" url-text="Ver todos.."/>
    </div>
    <div class="col-md-3">
        <x-adminlte-small-box title="{{$cursos}}" text="Cursos" icon="fas fa-school text-black"
            theme="info" url="{{route('cursos.index')}}" url-text="Ver todos.."/>
    </div>
    <div class="col-md-3">
        <x-adminlte-small-box title="Informes" text="informes" icon="fas fa-book text-black"
            theme="info" url="#" url-text="Ver todos.."/>
    </div>
</div>
@endcan
@can('estudent.dashboard')
<h1>Hola Mundo de estudiante</h1>
@endcan
@can('teacher.dashboard')
<div class="row">


    <div class="col-md-3">
        <x-adminlte-small-box title="{{$cursos}}" text="Cursos" icon="fas fa-school text-black"
            theme="info" url="{{route('cursos.index')}}" url-text="Ver todos.."/>
    </div>
    <div class="col-md-3">
        <x-adminlte-small-box title="{{$calificacione}}" text="Calificaciones" icon="fas fa-book text-black"
            theme="info" url="{{route('profesor.index')}}" url-text="Ver todos.."/>
    </div>
</div>
@endcan
@stop


