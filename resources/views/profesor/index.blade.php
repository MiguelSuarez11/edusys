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
                            <a class="btn btn-primary" href="{{ route('personal.index') }}"> {{ __('Regresar') }}</a>
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
                        <form method="post" action="{{ route('profesor.store') }}" role="form"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-3">
                                    <label for="curso">Curso:</label>
                                    <select name="curso" id="curso" class="form-control">
                                        <option value="">Seleccionar curso</option>
                                        @foreach ($cursos as $curso)
                                            <option value="{{ $curso->id }}">{{ $curso->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-12">
                                    <table class="table table-bordered" id="estudiantes-table">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nombre</th>
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
        $(document).ready(function () {
            $('#curso').change(function () {
                var cursoId = $(this).val();

                if (cursoId) {
                    $.ajax({
                        url: '/profesor/estudiantes/' + cursoId,
                        type: 'GET',
                        success: function (response) {
                            var estudiantesTable = $('#estudiantes-table tbody');
                            estudiantesTable.empty();

                            response.forEach(function (estudiante) {
                                estudiantesTable.append(
                                    '<tr>' +
                                    '<td>' + estudiante.id + '</td>' +
                                    '<td>' + estudiante.nombres + '</td>' +
                                    '<td>' + estudiante.correo + '</td>' +
                                    '<td>' +
                                    '<a class="" href="/estudiantess/index' + estudiante.id + '">' +
                                    '<i class="far fa-eye"></i>' +
                                    '</a>' +
                                    '</td>' +
                                    '</tr>'
                                );
                            });
                        },
                        error: function () {
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