@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
        {{ __('Asignacion de Permisos') }}
    </h2>
@stop

@section('content')
    <div class="row justify-content-center">
        <div class="card" style="width: 100%;">
            <div class="card-header text-center  "><label>Rol Seleccionado:</label> {{ $role->name }}</div>
            <div class="card-body">
                <h5 class="text-center mb-2 "><label >Lista de Permisos Asignados</label> </h5>
                {!! Form::model($role, ['route' => ['roles.update', $role], 'method' => 'put']) !!}
                <table id="miTabla" class="table table-bordered table-striped">
                    <thead class="thead">
                        <tr>
                            <th >ID</th>
                            <th>Nombre permiso</th>
                            <th>Asignar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($permisos as $permiso)
                            <tr>
                                <td>
                                    {{ $permiso->id }}
                                </td>
                                <td>
                                    {{ $permiso->description }}
                                </td>

                                <td style="width: 10px;">
                                    {!! Form::checkbox('permisos[]', $permiso->id, $role->hasPermissionTo($permiso->id) ?: false, [
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
                    {!! Form::submit('Asignar Permisos', ['class' => 'btn btn-success mt-3']) !!}
                    <a class="btn btn-success mt-3" href="{{ route('roles.index') }}"> {{ __('Regresar') }}</a>
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
            $('#miTabla').DataTable();})
</script>
@stop
