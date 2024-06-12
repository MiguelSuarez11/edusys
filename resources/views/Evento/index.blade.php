@extends('adminlte::page')

@section('title', 'Pagina - Principal')

@section('content_header')

    @can('admin.dashboard')
    <div class="container text-center">

        <h1 class="mb-4">¡Gestion De Eventos!</h1>
        <h5 class="mb-4"> Coordial saludo, <br><b>{{ Auth::user()->name }}</b></h5>
        <div class="card">
    </div>
    @endcan
    <div class="container text-center">

        <h1 class="mb-4">Listado De Eventos!</h1>
        <h5 class="mb-4"> Estos son nuestros eventos, <br><b>{{ Auth::user()->name }}</b></h5>
        <div class="card">
    </div>
    @stop








    @section('content')


        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <div style="display: flex; justify-content: space-between; align-items: center;">

                                @can('admin.dashboard')
                                    <div class="float-right">
                                        <a href="" class="float-right btn btn-info btn-sm" data-placement="left"
                                            data-toggle="modal" data-target="#modalMin">
                                            {{ __('Nuevo evento') }}
                                        </a>
                                        <br><br>

                                        <x-adminlte-modal id="modalMin" title="Nuevo evento" size="sm" theme="info">
                                            <form method="POST" action="{{ route('eventos.store') }}" role="form"
                                                enctype="multipart/form-data">
                                                @csrf
                                                @include('Evento.form')

                                            </form>
                                        </x-adminlte-modal>
                                    </div>
                                @endcan

                            </div>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                @foreach ($evento as $eventos)
                                    <div class="col-sm-2">



                                        <div class="card">
                                            <div class="text-sm card-header bg-info ">
                                                <div>
                                                    Numero Identificador: {{ $eventos->id }}
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div>Nombre: {{ $eventos->Nombre }}</div>
                                                <div>Descripcion: {{ $eventos->Descripcion }}</div>
                                                <div>Fecha: {{ $eventos->Fecha }}</div>
                                                <div>Hora: {{ $eventos->Hora }}</div>


                                            </div>
                                            @can('admin.dashboard')
                                                <div class="text-center card-footer ">
                                                    <form id="deleteForm-{{ $eventos->id }}"
                                                        action="{{ route('eventos.destroy', $eventos->id) }}" method="POST">
                                                        <a class="btn btn-sm btn-success" data-toggle="modal"
                                                            data-target="#modaledit"
                                                            onclick="cargarInformacionCurso({{ $eventos->id }})"><i
                                                                class="fa fa-fw fa-edit"></i> </a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <a type="button" class="btn btn-danger btn-sm deleteButton"
                                                            data-ficha-id="{{ $eventos->id }}"><i
                                                                class="fa fa-fw fa-trash"></i>
                                                        </a>
                                                    </form>
                                                    <x-adminlte-modal id="modaledit" title="Editar evento" size="sm"
                                                        theme='info'>
                                                        <form method="POST"
                                                            action="{{ route('eventos.update', $eventos->id) }}" role="form"
                                                            enctype="multipart/form-data">
                                                            {{ method_field('PATCH') }}
                                                            @csrf
                                                            @include('Evento.form')
                                                        </form>
                                                    </x-adminlte-modal>
                                                </div>
                                            @endcan


                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endsection


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
            function cargarInformacionCurso(cursoId) {
                // Realizar una petición AJAX para obtener la información del curso
                $.ajax({
                    url: "{{ route('cursos.edit', ':id') }}".replace(':id', cursoId),
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
