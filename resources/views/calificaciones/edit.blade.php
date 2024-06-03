@extends('adminlte::page')
@section('title', 'Editar Calificación')

@section('content_header')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@endsection

@section('content')
    <div class="container mt-5">
        <section class="content container-fluid">
            <div class="">
                <div class="col-md-12">
                    @includeif('partials.errors')

                    <div class="card card-default">
                        <div class="card-header">
                            <div class="float-right">
                                <a class="btn btn-primary" href="{{ route('calificaciones.index_calificaciones') }}"> {{ __('Regresar') }}</a>
                            </div>
                            <h1>Editar Calificación</h1>
                            <div class="text-center"><label>Estudiante Seleccionado:</label>
                                {{ $calificacion->personal->nombres }}</div>
                        </div>

                        <div class="card-body">
                            <form method="post" action="{{ route('calificaciones.update', $calificacion->id) }}"
                                role="form" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    <div class="col-3">
                                        <label for="curso">Curso:</label>
                                        <select name="curso" id="curso" class="form-control">
                                            <option value="" disabled selected>Seleccionar curso</option>
                                            @foreach ($user->cursos as $curso)
                                                <option value="{{ $curso->id }}"
                                                    {{ old('curso', $calificacion->curso_id) == $curso->id ? 'selected' : '' }}
                                                    disabled selected>
                                                    {{ $curso->nombre }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-3">
                                        <label for="asignatura">Asignatura:</label>
                                        <select name="asignatura" id="asignatura" class="form-control">
                                            <option value="" disabled>Seleccionar Asignatura</option>
                                            @foreach ($asignaturas as $id => $nombre)
                                                <option value="{{ $id }}"
                                                    {{ old('asignatura', $calificacion->asignatura_id) == $id ? 'selected' : '' }}
                                                    disabled selected>
                                                    {{ $nombre }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-3">
                                        <label for="periodo">Periodo:</label>
                                        <select name="periodo" id="periodo" class="form-control">
                                            <option value="" disabled>Seleccionar Periodo</option>
                                            @foreach ($periodos as $id => $nombre)
                                                <option value="{{ $id }} "
                                                    {{ old('periodo', $calificacion->periodo_id) == $id ? 'selected' : '' }}
                                                    disabled>
                                                    {{ $nombre }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-6">
                                        <label for="nota1" class="form-label">Nota 1</label>
                                        <input type="text" class="form-control" id="nota1" name="nota1"
                                            aria-describedby="helpId" placeholder="" maxlength="5"
                                            oninput="validateNumberInput(this)"
                                            value="{{ old('nota1', isset($calificacion->nota_1) ? number_format($calificacion->nota_1, 2) : '') }}" />
                                    </div>

                                    <div class="col-6">
                                        <label for="nota2" class="form-label">Nota 2</label>
                                        <input type="text" class="form-control" id="nota2" name="nota2"
                                            aria-describedby="helpId" placeholder="" maxlength="5"
                                            oninput="validateNumberInput(this)"
                                            value="{{ old('nota2', isset($calificacion->nota_2) ? number_format($calificacion->nota_2, 2) : '') }}" />
                                    </div>

                                    <div class="col-6">
                                        <label for="nota3" class="form-label">Nota 3</label>
                                        <input type="text" class="form-control" id="nota3" name="nota3"
                                            aria-describedby="helpId" placeholder="" maxlength="5"
                                            oninput="validateNumberInput(this)"
                                            value="{{ old('nota3', isset($calificacion->nota_3) ? number_format($calificacion->nota_3, 2) : '') }}" />
                                    </div>

                                    <div class="col-6">
                                        <label for="nota4" class="form-label">Nota 4</label>
                                        <input type="text" class="form-control" id="nota4" name="nota4"
                                            aria-describedby="helpId" placeholder="" maxlength="5"
                                            oninput="validateNumberInput(this)"
                                            value="{{ old('nota4', isset($calificacion->nota_4) ? number_format($calificacion->nota_4, 2) : '') }}" />
                                    </div>


                                    <div class="col-12">
                                        <label for="definitiva" class="form-label">Definitiva</label>
                                        <input type="number" class="form-control" id="definitiva" name="definitiva"
                                            aria-describedby="helpId" placeholder=""
                                            value="{{ old('definitiva', isset($calificacion->nota_definitiva) ? number_format($calificacion->nota_definitiva, 2) : '') }}"
                                            readonly />
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script>
        function validateNumberInput(input) {
            let value = input.value;

            // Asegurarse de que solo haya un punto decimal y permitir números
            value = value.replace(/[^0-9.]/g, '');

            // Limitar a 2 dígitos enteros y 2 decimales
            if (value.includes('.')) {
                let [integers, decimals] = value.split('.');
                integers = integers.slice(0, 2);
                decimals = decimals.slice(0, 1);
                value = `${integers}.${decimals}`;
            } else {
                value = value.slice(0, 2);
            }

            input.value = value;
        }

        // Aplicar la validación a todos los inputs de nota
        document.addEventListener('DOMContentLoaded', function() {
            var notaInputs = ['nota1', 'nota2', 'nota3', 'nota4'];
            notaInputs.forEach(function(id) {
                document.getElementById(id).addEventListener('input', function() {
                    validateNumberInput(this);
                });
            });
        });
    </script>

    <script>
        // Calcular la definitiva y actualizar el campo correspondiente
        document.addEventListener("DOMContentLoaded", function() {
            const nota1 = document.getElementById('nota1');
            const nota2 = document.getElementById('nota2');
            const nota3 = document.getElementById('nota3');
            const nota4 = document.getElementById('nota4');
            const definitiva = document.getElementById('definitiva');

            function calcularDefinitiva() {
                const n1 = parseFloat(nota1.value) || 0;
                const n2 = parseFloat(nota2.value) || 0;
                const n3 = parseFloat(nota3.value) || 0;
                const n4 = parseFloat(nota4.value) || 0;

                const suma = n1 + n2 + n3 + n4;
                const promedio = suma / 4;

                definitiva.value = promedio.toFixed(2); // Redondear a dos decimales
            }

            nota1.addEventListener('input', calcularDefinitiva);
            nota2.addEventListener('input', calcularDefinitiva);
            nota3.addEventListener('input', calcularDefinitiva);
            nota4.addEventListener('input', calcularDefinitiva);
        });
    </script>
@endsection
