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
                            <div class="float-left">
                                <h1>Listado de Calificaciones</h1>

                            </div>
                        </div>

                        <div class="card-body d-flex justify-content-center align-items-center">
                            <div class="table-responsive">
                                <table id="miTabla" class="table table-bordered table-striped">
                                    <thead class="thead">
                                        <tr>
                                            <th>ID</th>

                                            <th>Estudiante</th>
                                            <th>Nota 1</th>
                                            <th>Nota 2</th>
                                            <th>Nota 3</th>
                                            <th>Nota 4</th>
                                            <th>Curso</th>
                                            <th>Asignatura</th>
                                            <th>acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($calificaciones as $calificacion)
                                            <tr>
                                                <td>{{ $calificacion->id }}</td>
                                                <td>{{ $calificacion->personal->nombres }}</td>
                                                <td>{{ number_format($calificacion->nota_1, 1) }}</td>
                                                <td>{{ number_format($calificacion->nota_2, 1) }}</td>
                                                <td>{{ number_format($calificacion->nota_3, 1) }}</td>
                                                <td>{{ number_format($calificacion->nota_4, 1) }}</td>
                                                <td>{{ $calificacion->cursos->nombre }}</td>
                                                <td>{{ $calificacion->asignatura->nombre }}</td>

                                                <td>
                                                    <div class="dropdown">
                                                        <a class="dropdown-toggle btn-sm" type="button"
                                                            data-toggle="dropdown" aria-expanded="true">

                                                        </a>

                                                        <div class="dropdown-menu">
                                                            <a  href="{{ route('estudiantes.shows', auth()->user()->personal_id) }}" type="button" class="dropdown-item text-success"
                                                                ><i
                                                                    class="fas fa-eye"></i> Ver Notas</a>
                                                            <a href="{{ route('calificaciones.edit', $calificacion) }}"
                                                                type="button" class="dropdown-item text-warning">
                                                                <i class="fa fa-fw fa-edit"> Editar</i>
                                                            </a>



                                                            <form id="deleteForm-{{ $calificacion->id }}"
                                                                action="{{ route('calificaciones.destroy', $calificacion->id) }}"
                                                                method="POST">

                                                                @csrf
                                                                @method('DELETE')
                                                                <a type="button"
                                                                class="dropdown-item deleteButton text-danger"
                                                                data-ficha-id="{{ $calificacion->id }}"> <i
                                                                    class="fa fa-fw fa-trash"> Eliminar</i>
                                                                </a>
                                                            </form>
                                                        </div>
                                                    </div>


                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>




                    </div>
                </div>
            </div>
        </section>

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
        {{-- <script>
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

    </script> --}}
    @stop
