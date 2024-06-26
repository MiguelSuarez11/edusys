@extends('adminlte::page')

@section('title', 'Pagina - Principal')

@section('content_header')
     <div class="container text-center">
        <h1 class="mb-4">¡Bienvenido al Sistema de Gestion EduSys+!</h1>
        <h5 class="mb-4"> Coordial saludo, <br><b>{{ Auth::user()->name }}</b></h5>
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
                <x-adminlte-small-box title="{{ $personalR }}" text="Personal" icon="fas fa-address-card text-black"
                    theme="info" url="{{ route('personal.index') }}" url-text="Ver todos.." />
            </div>
            <div class="col-md-3">
                <x-adminlte-small-box title="{{ $users }}" text="Usuarios" icon="fas fa-users text-black" theme="info"
                    url="{{ route('usuarios.index') }}" url-text="Ver todos.." />
            </div>
            <div class="col-md-3">
                <x-adminlte-small-box title="{{ $cursos }}" text="Cursos" icon="fas fa-school text-black" theme="info"
                    url="{{ route('cursos.index') }}" url-text="Ver todos.." />
            </div>
            <div class="col-md-3">
                <x-adminlte-small-box title="Informes" text="informes" icon="fas fa-book text-black" theme="info"
                    url="#" url-text="Ver todos.." />
            </div>

            <div class="col-md-3">
                <x-adminlte-small-box title="{{ $eventos }}" text="Eventos" icon="fas fa-address-card text-black"
                    theme="info" url="{{ route('eventos.index') }}" url-text="Ver todos.." />
            </div>

            <div class="col-md-3">
                <x-adminlte-small-box title="Horarios" text="Ver todos.." icon="fas fa-book text-black" theme="info"
                    url="{{ route('calendario', auth()->user()->id) }}" url-text="Ver todos.." />
            </div>
        </div>
    @endcan
    @can('estudent.dashboard')
        <div class="row">


            <div class="col-md-3">
                <x-adminlte-small-box title="" text="Eventos" icon="fas fa-book text-black" theme="info"
                    url="{{ route('eventos.index', auth()->user()->id) }}" url-text="Ver todos.." />
            </div>

            <div class="col-md-3">
                <x-adminlte-small-box title="" text="Mis Calificaciones" icon="fas fa-book text-black" theme="info"
                    url="{{ route('estudiantes.shows', auth()->user()->personal_id) }}" url-text="Ver todos.." />
            </div>

            <div class="col-md-3">
                <x-adminlte-small-box title="" text="Horarios" icon="fas fa-book text-black" theme="info"
                    url="{{ route('calendario', auth()->user()->id) }}" url-text="Ver todos.." />
            </div>
        </div>
    @endcan
    @can('teacher.dashboard')
        <div class="row">


            <div class="col-md-3">
                <x-adminlte-small-box title="{{ $cursos }}" text="Mis Cursos" icon="fas fa-school text-black"
                    theme="info" url="{{ route('cursos.index') }}" url-text="Ver todos.." />
            </div>
            <div class="col-md-3">
                <x-adminlte-small-box title="{{ $calificacione }}" text="Calificaciones" icon="fas fa-book text-black"
                    theme="info" url="{{ route('calificaciones.index') }}" url-text="Ver todos.." />
            </div>
            {{-- <div class="col-md-3">
                            <x-adminlte-small-box title="{{ $asistencia }}" text="Asistencia" text="Asistencia"
                                icon="fas fa-book text-black" theme="info" url="{{ route('asistencia.index') }}"
                                url-text="Ver todos.." />
                        </div> --}}
        </div>
    @endcan
@stop
