@extends('adminlte::page')

@section('title', 'Pagina - Principal')

@section('content_header')
    <div class="container text-center">
        <h1 class="mb-4">¡Gestion De Eventos!</h1>
        <h5 class="mb-4"> Coordial saludo, <br><b>{{ Auth::user()->name }}</b></h5>
        <div class="card">
             <div class="card-body">

                <div class="float-left">
                    <a href="" class="float-right btn btn-info btn-sm" data-placement="left"
                    data-toggle="modal" data-target="#modalMin">
                    {{ __('Nuevo Evento') }}
                </a>

                <br><br>
                <x-adminlte-modal id="modalMin" title="Nuevo Curso" size="sm" theme="info">
                    <form method="POST" action="{{ route('cursos.store') }}" role="form"
                        enctype="multipart/form-data">
                        @csrf
                        @include('Evento.form')

                    </form>
                </x-adminlte-modal>

                </div>

                <div class="card-body">
                    <div class="row">
                        @foreach ($evento as $evento)
                            <div class="col-sm-2">
                                <div class="card">
                                    <div class="text-sm card-header bg-info ">
                                        <div>
                                            Numero Identificador: {{ $evento->id }}
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div>Nombre: {{ $evento->nombre }}</div>
                                    
                                       
                                    </div>
                                    <div class="text-center card-footer ">
                                        <form id="deleteForm-{{ $evento->id }}"
                                            action="{{ route('cursos.destroy', $evento->id) }}" method="POST">
                                            <a class="btn btn-sm btn-success" data-toggle="modal"
                                                data-target="#modaledit"
                                                onclick="cargarInformacionCurso({{ $evento->id }})"><i
                                                    class="fa fa-fw fa-edit"></i> </a>
                                            @csrf
                                            @method('DELETE')
                                            <a type="button" class="btn btn-danger btn-sm deleteButton"
                                                data-ficha-id="{{ $evento->id }}"><i class="fa fa-fw fa-trash"></i>
                                            </a>
                                        </form>
                                        <x-adminlte-modal id="modaledit" title="Editar Curso" size="sm"
                                            theme='info'>
                                            <form method="POST" action="{{ route('cursos.update', $evento->id) }}"
                                                role="form" enctype="multipart/form-data">
                                                {{ method_field('PATCH') }}
                                                @csrf
                                                @include('curso.form')
                                            </form>
                                        </x-adminlte-modal>
                                    </div>

                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
    
    </div> 
        @stop

        @section('content')
            @can('admin.dashboard')

                <div class="row">
                   
                    <div class="col-md-3">
                        <x-adminlte-small-box title="Informes" text="informes" icon="fas fa-book text-black" theme="info"
                            url="#" url-text="Ver todos.." />
                    </div>

                    
                </div>
            @endcan
           
        @stop
