@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
        {{ __('Roles Actuales') }}
    </h2>
@stop



@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="miTabla" class="table table-bordered table-striped">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        <th>Nombre</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($roles as $role)
                                        <tr>
                                            <td>{{ $role->id }}</td>
                                            <td>{{ $role->name }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('roles.edit', $role) }}">
                                                        <i class="fas fa-sign-in-alt"></i>
                                                    </a>
                                                    <form id="deleteForm-{{ $role->id }}"
                                                        action="{{ route('roles.destroy', $role) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <a type="button" class="btn btn-danger btn-sm deleteButton"
                                                            data-ficha-id="{{ $role->id }}"><i
                                                                class="fa fa-fw fa-trash"></i> </a>
                                                    </form>
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
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('#miTabla').DataTable();
        });
    </script>
    <script>
        $(document).ready(function() {
            @if (Session::has('success'))
                Swal.fire({
                    icon: "success",
                    title: '{{ Session::get('tittle') }}',
                    text: '{{ Session::get('success') }}',
                    showConfirmButton: false,
                    timer: 1500
                });
            @endif
        });
    </script>
    <script>
        $(document).ready(function() {
            // Delegación de eventos para manejar clics en cualquier botón de eliminación
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
                    confirmButtonText: 'Sí, bórralo',
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

@stop
