@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
        {{ __('Lista Usuarios') }}
    </h2>
@stop

@section('content')

    <div class="container">
        <div class="card">
            <div class="card-body">
                {{-- Setup data for datatables --}}
                @php
                    $heads = ['ID', 'Nombres', 'Apellidos', ['label' => 'correo', 'width' => 40], 'rol', ['label' => 'Actions', 'no-export' => false, 'width' => 15]];

                    $config = [
                        'order' => [[1, 'asc']],
                        'columns' => [null, null, null, ['orderable' => false]],
                        'data' => [],
                    ];

                    foreach ($users as $user) {
                        $btnShow = '<a style="display: inline-block;" class="btn btn-sm btn-success" href="'. route("usuarios.show", $user) .'"><i class="fas fa-plus-circle"></i></a>';
                        $btnDelete = '<form style="display: inline-block;" id="deleteForm-' . $user->id .'" action="' . route('usuarios.destroy', $user) . '" method="POST">' .csrf_field() .method_field('DELETE') .'<button type="submit" class="btn btn-danger btn-sm deleteButton" data-user-id="' .$user->id .'"><i class="fa fa-fw fa-trash"></i></button></form>';
                        $roleName = optional($user->roles->first())->name;
                        $config['data'][] = [$user->id, $user->personal->nombres, $user->personal->apellidos, $user->email, $roleName, '<nobr>'. $btnShow . $btnDelete . '</nobr>'];
                    }
                @endphp

                {{-- Minimal example / fill data using the component slot --}}
                <x-adminlte-datatable id="table1" :heads="$heads">
                    @foreach ($config['data'] as $row)
                        <tr>
                            @foreach ($row as $cell)
                                <td>{!! $cell !!}</td>
                            @endforeach
                        </tr>
                    @endforeach
                </x-adminlte-datatable>
            </div>
        </div>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        $(document).ready(function() {
            @if (Session::has('success'))
                Swal.fire({
                    icon: 'success',
                    title: '{{ Session::get('title') }}',
                    text: '{{ Session::get('success') }}',
                    showConfirmButton: false,
                    timer: 1500
                });
            @endif
        });
    </script>
@stop
