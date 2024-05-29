@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
        {{ __('Lista personal') }}
    </h2>
@stop

@section('content')

    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="float-right">
                    <a href="{{route('personal.create')}}" class="btn btn-info btn-sm float-right" data-placement="left">
                        {{ __('Crear Personal') }}
                    </a>

                </div>

            </div>
            <div class="card-body d-flex justify-content-center align-items-center">
                <div class="table-responsive">
                    <table id="miTabla" class="table table-bordered table-striped">
                        <thead class="thead">
                            <tr>
                                <th hidden>ID</th>
                                <th>Tipo Documento</th>
                                <th>DNI</th>
                                <th>Nombres</th>
                                <th>Apellidos</th>
                                <th>Curso</th>
                                <th>acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($personals as $personal)
                                <tr>
                                    <td hidden>{{ $personal->id }}</td>
                                    <td>{{ optional($personal->tipoDocumento)->nombre }}</td>
                                    <td>{{ $personal->numero_documento }}</td>
                                    <td>{{ $personal->nombres }}</td>
                                    <td>{{ $personal->apellidos }}</td>
                                    <td>
                                        @if ($personal->curso)
                                            {{ $personal->curso->nomenclatura ?? 'Valor Predeterminado' }}
                                        @endif
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <a class="dropdown-toggle btn-sm" type="button"
                                                data-toggle="dropdown" aria-expanded="false">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 6.75h12M8.25 12h12m-12 5.25h12M3.75 6.75h.007v.008H3.75V6.75Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0ZM3.75 12h.007v.008H3.75V12Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm-.375 5.25h.007v.008H3.75v-.008Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                                                  </svg>
                                        </a>

                                            <div class="dropdown-menu">
                                                <a type="button" class="dropdown-item text-success" data-toggle="modal"
                                                    data-target="#modalshow{{ $personal->id }}"
                                                    onclick="Informacion({{ $personal->id }})"><i
                                                        class="fas fa-eye"></i> Ver informacion</a>
                                                <a href="{{ route('personal.edit', $personal) }}" type="button" class="dropdown-item text-warning" >
                                                    <i class="fa fa-fw fa-edit"> Editar</i>
                                                </a>
                                                <form id="deleteForm-{{ $personal->id }}"
                                                    action="{{ route('personal.destroy', $personal->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a type="button" class="dropdown-item deleteButton text-danger"
                                                        data-ficha-id="{{ $personal->id }}"><i
                                                            class="fa fa-fw fa-trash"> Eliminar</i>
                                                    </a>
                                                </form>
                                            </div>
                                        </div>
                                        <x-adminlte-modal id="modalshow{{ $personal->id }}" title="Ver Personal"
                                            size="md" theme='info'>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <p><b>Nombres:</b> {{ $personal->nombres }}</p>
                                                    <p><b>Telefono:</b> {{ $personal->telefono }}</p>
                                                    <p><b>Correo:</b> {{ $personal->correo }}</p>
                                                    <p><b>Rol:</b>
                                                        @foreach ($personal->user->roles as $rol)
                                                            {{ $rol->name }}
                                                        @endforeach
                                                    </p>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><b>Apellidos:</b> {{ $personal->apellidos }}</p>
                                                    <p><b>Direccion:</b> {{ $personal->direccion }}</p>
                                                    <p><b>Genero:</b> {{ $personal->generos->nombre }}</p>
                                                    <p><b>estado:</b>
                                                        @if ($personal->estado == 1)
                                                            Activo
                                                        @else
                                                            🔴
                                                        @endif
                                                    </p>
                                                </div>
                                            </div>
                                        </x-adminlte-modal>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
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
        // Esta función se ejecutará cuando se haga clic en el botón de ver personal
        function Informacion(personalId) {
            // Realizar una petición AJAX para obtener la información del personal
            $.ajax({
                url: "{{ route('personal.show', ':id') }}".replace(':id', personalId),
                method: 'GET',
                success: function(response) {
                    // Colocar la información del personal dentro del cuerpo del modal
                    $('#modalshow .modal-body').html(response);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        }

    </script>
@stop
