@extends('adminlte::page')

@section('title', 'Asignaturas')

@section('content_header')
<h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
    {{ __('Lista de Asignaturas') }}
</h2>
@stop

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <div class="float-right">
                            <a href="" class="btn btn-info btn-sm float-right" data-placement="left"
                                data-toggle="modal" data-target="#modalMin">
                                {{ __('Nueva Asignatura') }}
                            </a>
                            <x-adminlte-modal id="modalMin" title="Nueva Asignatura" size="sm" theme="info">
                                <form method="POST" action="{{ route('asignaturas.store') }}" role="form"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @include('asignaturas.form')
                                </form>
                            </x-adminlte-modal>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        @foreach ($asignaturas as $asignatura)
                            <div class="col-sm-2">
                                <div class="card">
                                    <div class="card-header bg-info text-sm ">
                                        <div>
                                            Numero Identificador: {{ $asignatura->id }}
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div>Nombre: {{ $asignatura->nombre }}</div>
                                        <div>Nomenclatura: {{ $asignatura->nomenclatura }}</div>
                                        <div>Estado: @if ($asignatura->estado == 1)
                                                <b>Activo</b>
                                            @else
                                                <b>Inactivo</b>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="card-footer text-center ">
                                        <form id="deleteForm-{{ $asignatura->id }}"
                                            action="{{ route('asignaturas.destroy', $asignatura->id) }}" method="POST">
                                            <a class="btn btn-sm btn-success" data-toggle="modal"
                                            data-target="#modaledit"
                                            onclick="cargarInformacionAsignatura({{ $asignatura->id }})"><i
                                                class="fa fa-fw fa-edit"></i> </a>
                                            @csrf
                                            @method('DELETE')
                                            <a type="button" class="btn btn-danger btn-sm deleteButton"
                                                data-ficha-id="{{ $asignatura->id }}"><i class="fa fa-fw fa-trash"></i>
                                            </a>
                                        </form>
                                        <x-adminlte-modal id="modaledit" title="Editar Asignatura" size="sm" theme='info'>
                                            <form method="POST" action="{{ route('asignaturas.update', $asignatura->id) }}"
                                                role="form" enctype="multipart/form-data">
                                                {{ method_field('PATCH') }}
                                                @csrf
                                                @include('asignaturas.form')
                                            </form>
                                        </x-adminlte-modal>
                                    </div>
                                    
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop


@section('js')
<script>
    $(document).ready(function() {
        $('#miTabla').DataTable();
        @if (Session::has('success'))
            Swal.fire({
                icon: "success",
                title: '{{ Session::get('title') }}',
                text: '{{ Session::get('success') }}',
                showConfirmButton: false,
                timer: 1500
            });
        @endif
        
        $(document).on('click', '.deleteButton', function() {
                const fichaId = $(this).data('ficha-id');
                const formId = `#deleteForm-${fichaId}`;

                Swal.fire({
                    title: '¿Estás seguro?',
                    text: '¡No podrás revertir esto!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí, Acepto',
                    cancelButtonText: 'No, cancelar',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Si el usuario confirma, enviar el formulario de eliminación
                        $(formId).submit();
                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                        Swal.fire({
                            title: 'Cancelado',
                            text: 'Tu acción fue cancelada con éxito',
                            icon: 'error'
                        });
                    }
                });
            });
    });
</script>
<script>
    // Esta función se ejecutará cuando se haga clic en el botón de editar
    function cargarInformacionAsignatura(id) {
        // Realizar una petición AJAX para obtener la información del curso
        $.ajax({
            url: "{{ route('asignaturas.edit', ':id') }}".replace(':id', id),
            method: 'GET',
            success: function(response) {
                // Colocar la información del curso dentro del cuerpo del modal
                $('#modalMin .modal-body').html(response);
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    }
</script>
@stop