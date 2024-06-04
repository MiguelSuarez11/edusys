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
                                <a class="btn btn-primary" href="{{ route('calificaciones.index') }}">
                                    {{ __('Regresar') }}</a>
                            </div>
                            <h1>Mis Calificaciones</h1>
                            <div class="text-center "><label>Estudiante:</label>
                                {{ $personal->nombres }}</div>

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
                                    <input type="hidden" id="estudiante_id" name="estudiante_id"
                                        value="{{ $personal->id }}">

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
                                                    <th>Promedio</th>


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















        <!-- Asegúrate de cargar jQuery antes de tu script -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#curso').change(function() {
                    var AsigId = $(this).val();
                    var estudianteId = $('#estudiante_id').val();

                    if (AsigId && estudianteId) {
                        $.ajax({
                            url: '/asignaturas/' + AsigId + '/estudiantes/' + estudianteId +
                                '/calificacion',
                            type: 'GET',
                            success: function(calificacion) {
                                var estudiantesTable = $('#estudiantes-table tbody');
                                estudiantesTable.empty();

                                if (calificacion.error) {
                                    estudiantesTable.append(
                                        '<tr><td colspan="7">El estudiante no tiene calificación aún</td></tr>'
                                    );
                                } else {
                                    var periodo_1 = calificacion.periodo_1 !== null ? parseFloat(
                                        calificacion.periodo_1).toFixed(1) : 'no definida';
                                    var periodo_2 = calificacion.periodo_2 !== null ? parseFloat(
                                        calificacion.periodo_2).toFixed(1) : 'no definida';
                                    var periodo_3 = calificacion.periodo_3 !== null ? parseFloat(
                                        calificacion.periodo_3).toFixed(1) : 'no definida';
                                    var periodo_4 = calificacion.periodo_4 !== null ? parseFloat(
                                        calificacion.periodo_4).toFixed(1) : 'no definida';
                                    var nota_final = calificacion.nota_final !== null ?parseFloat(
                                        calificacion.nota_final).toFixed(1) : 'no definida';
                                    var nombrePersonal = calificacion.personal ? calificacion
                                        .personal.nombres : 'no definida';

                                    estudiantesTable.append(
                                        '<tr>' +
                                        '<td>' + calificacion.id + '</td>' +
                                        '<td>' + nombrePersonal + '</td>' +
                                        '<td>' + periodo_1 + '</td>' +
                                        '<td>' + periodo_2 + '</td>' +
                                        '<td>' + periodo_3 + '</td>' +
                                        '<td>' + periodo_4 + '</td>' +
                                        '<td>' +nota_final + '</td>' +
                                        '</td>' +
                                        '</tr>'
                                    );
                                }
                            },
                            error: function(jqXHR, textStatus, errorThrown) {
                                if (jqXHR.status !== 404) {
                                    alert('Error al obtener la calificación del estudiante');
                                }
                            }
                        });
                    } else {
                        $('#estudiantes-table tbody').empty();
                    }
                });
            });
        </script>









    @endsection
