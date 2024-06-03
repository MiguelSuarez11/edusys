@extends('adminlte::page')
@section('title', 'Cursos')

@section('content_header')










    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    </head>

    <body>
        <div class="container mt-5">

        </div>






        <section class="content container-fluid">
            <div class="">
                <div class="col-md-12">

                    @includeif('partials.errors')

                    <div class="card card-default">
                        <div class="card-header">
                            <span class="card-title">{{ __('') }}</span>
                            <div class="float-right">
                                <a class="btn btn-primary" href="{{ route('dashboard') }}"> {{ __('Regresar') }}</a>
                            </div>
                            <div class="float-left">
                                <a class="btn btn-info" href="{{ route('calificaciones.create') }}" data-placement="left">
                                    {{ __('Registar Calificacion') }}
                                </a>

                            </div>
                        </div>

                        <div class="card-header">
                            <span class="card-title">{{ __('') }}</span>

                        </div>

                        <div class="card-body">
                            <form method="post" action="{{ route('calificaciones.store') }}" role="form"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col-3">
                                        <label for="curso">Curso:</label>
                                        <select name="curso" id="curso" class="form-control">
                                            <option value="">Seleccionar curso</option>
                                            @foreach ($user->cursos as $curso)
                                                <option value="{{ $curso->id }}">{{ $curso->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="mt-3 row">
                                    <div class="col-12">
                                        <table class="table table-bordered" id="estudiantes-table">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Nombre</th>
                                                    <th>Apellidos</th>
                                                    <th>Correo</th>
                                                    <th>Acciones</th>

                                                </tr>
                                            </thead>
                                            <tbody>


                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <!-- Aquí puedes agregar los campos adicionales del formulario -->

                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>














        <script>
            $(document).ready(function() {
                $('#curso').change(function() {
                    var cursoId = $(this).val();

                    if (cursoId) {
                        $.ajax({
                            url: '/profesor/estudiantes/' + cursoId,
                            type: 'GET',
                            success: function(response) {
                                var estudiantesTable = $('#estudiantes-table tbody');
                                estudiantesTable.empty();

                                response.forEach(function(personal) {
                                    estudiantesTable.append(
                                        '<tr>' +
                                        '<td>' + personal.id + '</td>' +
                                        '<td>' + personal.nombres + '</td>' +
                                        '<td>' + personal.apellidos + '</td>' +
                                        '<td>' + personal.correo + '</td>' +
                                        '<td>' +
                                        '<a href="/alumnos/' + personal.id + '">' +
                                        // Enlazar a una ruta genérica
                                        '<i class="far fa-eye"></i>' +
                                        '</a>' +
                                        '</td>' +
                                        '</tr>'
                                    );
                                });
                            },
                            error: function(xhr, status, error) {
                                console.log("Error: " + error);
                                console.log("Status: " + status);
                                console.dir(xhr);
                                alert('Error al obtener los estudiantes');
                            }
                        });
                    } else {
                        $('#estudiantes-table tbody').empty();
                    }
                });
            });
        </script>





















    @endsection
