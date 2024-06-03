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
                            <h1>Mis Calificaciones</h1>
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
                                        <label for="curso">Asignatura:</label>
                                        <select name="curso" id="curso" class="form-control">
                                            <option value="">Selecciona la Asignatura</option>
                                            @foreach ($asignaturas as $asig)
                                                <option value="{{ $asig->id }}">{{ $asig->nombre }}</option>
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
                                                    <th>Periodo 1</th>
                                                    <th>Periodo 2</th>
                                                    <th>Periodo 3</th>
                                                    <th>Periodo 4</th>
                                                    <th>Acciones</th>

                                                </tr>
                                            </thead>
                                            <tbody>


                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <!-- Aquí puedes agregar los campos adicionales del formulario -->

                                {{-- <button type="submit" class="btn btn-primary">Guardar</button> --}}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>














        <script>
            $(document).ready(function() {
                $('#curso').change(function() {
                    var AsigId = $(this).val();

                    if (AsigId) {
                        $.ajax({
                            url: '/estudiantess/' + AsigId,
                            type: 'GET',
                            success: function(response) {
                                var estudiantesTable = $('#estudiantes-table tbody');
                                estudiantesTable.empty();

                                response.forEach(function(estudiante) {

                                    var periodo_1 = estudiante.periodo_1 !== null ?
                                        estudiante.periodo_1 : 'no definida';
                                    var periodo_2 = estudiante.periodo_2 !== null ?
                                        estudiante.periodo_2 : 'no definida';
                                    var periodo_3 = estudiante.periodo_3 !== null ?
                                        estudiante.periodo_3 : 'no definida';
                                    var periodo_4 = estudiante.periodo_4 !== null ?
                                        estudiante.periodo_4 : 'no definida';
                                    var nombrePersonal = estudiante.personal ? estudiante
                                        .personal.nombres : 'no definida';
                                    estudiantesTable.append(
                                        '<tr>' +
                                        '<td>' + estudiante.id + '</td>' +
                                        '<td>' + nombrePersonal + '</td>' +

                                        '<td>' + periodo_1 + '</td>' +
                                        '<td>' + periodo_2 + '</td>' +
                                        '<td>' + periodo_3 + '</td>' +
                                        '<td>' + periodo_4 + '</td>' +
                                        '<td>' +
                                        '<a class="" href="/ruta-a-tu-formulario-de-edicion/' +
                                        estudiante.id + '">' +
                                        '<i class="far fa-eye"></i>' +
                                        '</a>' +
                                        '</td>' +
                                        '</tr>'
                                    );
                                });
                            },
                            error: function() {
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
