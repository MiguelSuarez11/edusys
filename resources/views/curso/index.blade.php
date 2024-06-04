@extends('adminlte::page')

@section('title', 'Cursos')

@section('content_header')
    <h2 class="text-xl font-semibold leading-tight text-center text-gray-800">
        {{ __('Lista de Cursos') }}
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
                                <a href="" class="float-right btn btn-info btn-sm" data-placement="left"
                                    data-toggle="modal" data-target="#modalMin">
                                    {{ __('Nuevo Curso') }}
                                </a>
                                <br><br>
                                
                                <x-adminlte-modal id="modalMin" title="Nuevo Curso" size="sm" theme="info">
                                    <form method="POST" action="{{ route('cursos.store') }}" role="form"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @include('curso.form')

                                    </form>
                                </x-adminlte-modal>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            @foreach ($cursos as $curso)
                                <div class="col-sm-2">
                                    <div class="card">
                                        <div class="text-sm card-header bg-info ">
                                            <div>
                                                Numero Identificador: {{ $curso->id }}
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div>Nombre: {{ $curso->nombre }}</div>
                                            <div>Nomenclatura: {{ $curso->nomenclatura }}</div>
                                            <div>Estado: @if ($curso->estado == 1)
                                                    <b>Activo</b>
                                                @else
                                                    <b>Inactivo</b>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="text-center card-footer ">
                                            <form id="deleteForm-{{ $curso->id }}"
                                                action="{{ route('cursos.destroy', $curso->id) }}" method="POST">
                                                <a class="btn btn-sm btn-success" data-toggle="modal"
                                                    data-target="#modaledit"
                                                    onclick="cargarInformacionCurso({{ $curso->id }})"><i
                                                        class="fa fa-fw fa-edit"></i> </a>
                                                @csrf
                                                @method('DELETE')
                                                <a type="button" class="btn btn-danger btn-sm deleteButton"
                                                    data-ficha-id="{{ $curso->id }}"><i class="fa fa-fw fa-trash"></i>
                                                </a>
                                            </form>
                                            <x-adminlte-modal id="modaledit" title="Editar Curso" size="sm"
                                                theme='info'>
                                                <form method="POST" action="{{ route('cursos.update', $curso->id) }}"
                                                    role="form" enctype="multipart/form-data">
                                                    {{ method_field('PATCH') }}
                                                    @csrf
                                                    @include('curso.form')
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
