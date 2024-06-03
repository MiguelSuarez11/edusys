@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h2 class="text-xl font-semibold leading-tight text-center text-gray-800">
        {{ __('Asignación de Cursos') }}
    </h2>
@stop

@section('content')
    <div class="row justify-content-center">
        <div class="card" style="width: 100%;">
            <div class="text-center card-header"><label>Profesor Seleccionado:</label> {{ $user->PersonalUser->nombres }}</div>
            <div class="card-body">
                <h5 class="mb-2 text-center"><label>Lista de Cursos Asignados</label></h5>
                {!! Form::model($user, ['route' => ['cursos.asignacionUpdate', $user->id], 'method' => 'put']) !!}
                <table id="miTabla" class="table table-bordered table-striped">
                    <thead class="thead">
                        <tr>
                            <th>ID</th>
                            <th>Nombre del Curso</th>
                            <th>Asignar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cursos as $curso)
                        <tr>
                            <td>{{ $curso->id }}</td>
                            <td>{{ $curso->nombre }}</td>
                            <td style="width: 10px;">
                                {!! Form::checkbox('cursos[]', $curso->id, $user->cursos->contains($curso->id) ? true : false, [
                                    'class' => 'mr-1',
                                ]) !!}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <div class="float-right">
                    {!! Form::submit('Asignar Curso', ['class' => 'btn btn-success mt-3']) !!}
                    <a class="mt-3 btn btn-danger" href="{{ route('cursos.asignacion') }}"> {{ __('Regresar') }}</a>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        $(document).ready(function() {
            $('#miTabla').DataTable();
        });
    </script>
@stop
